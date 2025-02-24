<?php

namespace App\Http\Controllers\Backoffice\Course;

use App\Course;
use App\CustomizeDate;
use App\Http\Controllers\Controller;
use App\PhysicalClass;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Course\StoreRequest;
use App\Http\Requests\Backoffice\Course\UpdateRequest;
use App\Http\Controllers\Backoffice\Course\Export\CourseExcelExport;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param string $event_type
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $courses = Course::join(
            'categories', 'courses.category_id', '=', 'categories.id'
        )->when( $request->search, function ($query, $search) {
            $query->where( function ($query) use ($search) {
                $query->where(
                    'courses.id', 'like', "$search%"
                )->orWhere(
                    'courses.name', 'like', "%$search%"
                )->orWhere(
                    'categories.name', 'like', "%$search%"
                );
            });

        })->selectRaw(
            "courses.*, categories.name AS category"
        )->latest('courses.created_at')->paginate(50)->appends( $request->query() );

        return view('backoffice/course/index', compact('courses'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Collection
     */
    public function schedules(Request $request): Collection
    {
        $course = Course::whereId($request->course)->first();
        return PhysicalClass::where('course_id', $course->id)
                            ->whereDate('booking_end', '>', now())
                            ->with('city')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice/course/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:courses',
            'category_id' => 'required',
            'brochure' => 'nullable|file',
            'cover' => 'nullable|image',
            'event_types' => 'required',
            'banner_description' => 'nullable|min:15',
            'who_should_attend' => 'nullable|min:5',
        ]);

        $cover = $request->hasFile('cover') ? $request->file('cover')->store('course/cover') : null;
        $slug = Str::slug($request->name, '-');

        $course = Course::create( array_merge( $request->only([
            'name', 'category_id', 'subcategory_id', 'description', 'outline',
            'module', 'code', 'topic_id', 'level', 'adminstration_details', 'prerequisite',
            'banner_description', 'who_should_attend'
        ]), compact('cover', 'slug'), [
            'event_types' => implode(' | ', $request->event_types),
            'featured' => $request->has('featured'),
        ]) );

        !$request->filled('software') ?: $course->software()->attach($request->software);
        !$request->filled('tours') ?: $course->tours()->attach($request->tours);
        !$request->filled('trainers') ?: $course->trainers()->attach($request->trainers);
        !$request->filled('bcg_level') ?: $course->bcg_levels()->attach($request->bcg_level);
        !$request->filled('pdc_stage') ?: $course->pdc_stages()->attach($request->pdc_stage);
        !$request->filled('skill_level') ?: $course->skill_levels()->attach($request->skill_level);
        !$request->filled('skill_type') ?: $course->skill_types()->attach($request->skill_type);
        !$request->filled('target_staff') ?: $course->target_staffs()->attach($request->target_staff);
        !$request->filled('product_type') ?: $course->product_types()->attach($request->product_type);
        !$request->filled('industries') ?: $course->industries()->attach($request->industries);

        return back()->with('success', 'Course has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return Application|Factory|View
     */
    public function edit(Course $course)
    {
        $course->loadCount('documents', 'physicalClasses', 'virtualClasses');

        return view('backoffice/course/edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Course $course
     * @return RedirectResponse
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('courses')->ignore( $course->id ),
            ],
            'category_id' => 'required',
            'brochure' => 'nullable|file',
            'cover' => 'nullable|image',
            'event_types' => 'required',
        ]);

        if ( $request->hasFile('cover') ) {
            $cover = $request->file('cover')->store('course/cover');
            empty($course->cover) || Storage::delete($course->cover);
        }
        else
            $cover = $course->cover;

        $slug = Str::slug($request->name, '-');

        $course->update( array_merge( $request->only([
            'name', 'category_id', 'subcategory_id', 'description', 'outline', 'banner_description',
            'module', 'code', 'topic_id', 'level', 'adminstration_details', 'prerequisite',
            'who_should_attend'
        ]), compact('cover', 'slug'), [
            'event_types' => implode(' | ', $request->event_types),
            'featured' => $request->has('featured'),
        ]) );

        $course->software()->sync($request->software);
        $course->tours()->sync($request->tours);
        $course->trainers()->sync($request->trainers);
        $course->bcg_levels()->sync($request->bcg_level);
        $course->pdc_stages()->sync($request->pdc_stage);
        $course->skill_levels()->sync($request->skill_level);
        $course->skill_types()->sync($request->skill_type);
        $course->target_staffs()->sync($request->target_staff);
        $course->product_types()->sync($request->product_type);
        $course->industries()->sync($request->industries);

        return back()->with('success', 'Course has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return back()->with('success', 'Course has been deleted');
    }

    /**
     * Export to excel.
     *
     */
    public function export()
    {
        return (new CourseExcelExport)->download("courses.xlsx");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function course_custom_bookings(){
        $booked_dates = CustomizeDate::latest()->paginate(50);

        return view('backoffice/course/booking/custom-bookings', compact('booked_dates'));
    }
}
