<?php

namespace App\Http\Controllers\Course;

use App\City;
use App\Http\Controllers\Controller;
use App\PhysicalClass;
use App\VirtualClass;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TrainingVenueController extends Controller
{
    /**
     * Venue Schedules.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $category = '';
        if ($request->has('city') && $request->city != 'all-cities' && $request->city == 'virtual') {
            $city = 'Virtual';

            $schedules = VirtualClass::whereDate('from', '>', now())->distinct('course_id');

        } else if ($request->has('city') && $request->city != 'all-cities' && $request->city != 'virtual') {
            $city = City::where('name', $request->city)->first();

            $schedules = $city->physicalClasses()
                ->whereDate('from', '>', now())
                ->distinct('course_id');
        } else {
            $city = 'all-cities';
            $schedules = PhysicalClass::whereDate('from', '>', now())->distinct('course_id');

        }

        if ($request->has('category')) {
            $category = $request->category;
            $schedules->whereHas('course', function ($query) use ($category) {
                $query->where('subcategory_id', $category);
            });
        }

        $schedules = $schedules->paginate(200);
        // return $schedules;

        return view('front.course.venue.index', compact('schedules', 'city', 'category'));
    }

    // show venues


    public function show($city)
{
    $cityModel = City::where('name', $city)->first();

    if (!$cityModel) {
        abort(404);
    }

    return view('front.venue.show', compact('cityModel'));
}

}