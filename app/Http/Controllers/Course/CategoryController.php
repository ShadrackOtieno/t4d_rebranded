<?php

namespace App\Http\Controllers\Course;

use App\Category;
use App\PhysicalClass;
use App\VirtualClass;
use App\Course;
use App\Venue;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use SEO;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        SEO::setTitle( "Courses ");
        SEO::setDescription('Explore our wide range of executive short courses and professional certifications and take the noble step of upskilling yourself or your entire team.');

        SEO::opengraph()->setTitle( "Courses - " . config('app.name') );
        SEO::opengraph()->setDescription('Explore our wide range of executive short courses and professional certifications and take the noble step of upskilling yourself or your entire team.');
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "Courses - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "Courses - " . config('app.name') );
        SEO::jsonLd()->setDescription( 'Explore our wide range of executive short courses and professional certifications and take the noble step of upskilling yourself or your entire team.' );
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');


        $categories = Category::course()->with('subcategories')->latest()->paginate(10);

        return view('front/course/category/index', compact('categories'));

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Category $category
     * @return Application|Factory|View
     */
    public function show(Request $request, Category $category)
    {
        SEO::setTitle("$category->name - Courses - " . config('app.name'));
        SEO::setDescription(strip_tags($category->description) ?? config('app.description'));

        SEO::opengraph()->setTitle("$category->name - Courses - " . config('app.name'));
        SEO::opengraph()->setDescription(strip_tags($category->description) ?? config('app.description'));
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle("$category->name - Courses - " . config('app.name'));
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle("$category->name - Courses - " . config('app.name'));

        switch ( $request->query('sort') ) {

            case 'title':
                $result = $this->coursesByTitle($category);
                break;

            case 'location':
                $result = $this->coursesByVenue($category);
                break;

            default:
                $result = $this->coursesByMonth($category);
                break;
        }

        return $result;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    private function coursesByVenue(Category $category)
    {
        $venues = Venue::whereHas('cities.physicalClasses.course.subcategory.category', function ($query) use ($category) {
            $query->where('categories.id', $category->id);
        })->whereHas('cities.physicalClasses', function ($query) {
            $query->whereDate('from', '>=', now())->whereYear('from', date('Y'));
        })->with('cities.physicalClasses')->get();

        return view('front/course/category/course/venue', compact('category', 'venues'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    private function coursesByTitle(Category $category)
    {
        $courses = Course::whereHas('subcategory.category', function ($query) use ($category) {
            $query->where('categories.id', $category->id);
        })->get();

        return view('front/course/category/course/title', compact('category', 'courses'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    private function coursesByMonth(Category $category)
    {
        $physicalClasses = PhysicalClass::whereHas('course.subcategory.category', function ($query) use ($category) {
            $query->where('categories.id', $category->id);
        })->whereDate('from', '>=', now())->whereYear('from', date('Y'))->orderBy('from')->get();

        $virtualClasses = VirtualClass::whereHas('course.subcategory.category', function ($query) use ($category) {
            $query->where('categories.id', $category->id);
        })->whereDate('from', '>=', now())->whereYear('from', date('Y'))->orderBy('from')->get();

        $schedules = $physicalClasses->concat($virtualClasses);

        return view('front/course/category/course/monthly', compact('category', 'schedules'));
    }
}
