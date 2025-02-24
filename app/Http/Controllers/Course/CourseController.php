<?php

namespace App\Http\Controllers\Course;

use App\City;
use App\Course;
use App\Download;
use App\Document;
use App\Customer;
use App\FAQ;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use SEO;

class CourseController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return Application|Factory|View
     */
    public function show(Course $course)
    {
        SEO::setTitle("$course->name ");
        SEO::setDescription(substr(strip_tags($course->description), 0, 165));

        SEO::opengraph()->setTitle("$course->name ");
        SEO::opengraph()->setDescription(substr(strip_tags($course->description), 0, 165));
        SEO::opengraph()->setUrl(url()->current());

        SEO::twitter()->setTitle("$course->name ");
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$course->name " );

        $locations = City::has('physicalClasses')->orderBy('priority')->get();

        $faqs = FAQ::where('featured', '1')->get();

        $customer = Auth::check()
            ? Customer::whereUserId(Auth::id())->first()
            : null;
        $ar = array();
        foreach ($course->physicalClasses->load('currencies') as $value) {
            array_push($ar, $value->city_id);
        }

        //return $course->physicalClasses->load('currencies');
        return view('front/course/show', compact('course', 'customer', 'locations', 'faqs'));
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @param $type
     * @return Application|Factory|View
     */


public function schedules($courseSlug, $type)
{
    // Fetch course with soft-deleted included
    $course = Course::withTrashed()->where('slug', $courseSlug)->firstOrFail();

    // Proceed with your existing code
    SEO::setDescription(substr(strip_tags($course->description), 0, 160));
    SEO::opengraph()->setTitle($course->name);
    SEO::opengraph()->setDescription(substr(strip_tags($course->description), 0, 160));
    SEO::opengraph()->setUrl(url()->current());
    SEO::addProperty('type', 'Course');

    SEO::twitter()->setTitle($course->name);
    SEO::twitter()->setSite('@indepthresearch');

    SEO::jsonLd()->setTitle($course->name);
    SEO::jsonLd()->addImage(asset('front/assets/img/logo/IRES-logo.png'));

    $locations = City::has('physicalClasses')->orderBy('priority')->get();

    $customer = Auth::user() ? Auth::user()->customer : null;

    $ar = $course->physicalClasses->load('currencies')->pluck('city_id')->toArray();

    return view('front.course.course-schedules', compact('course', 'customer', 'locations', 'type'));
}

    // public function schedules(Course $course, $type)
    // {
    //     // SEO::setTitle("$course->name Schedules");
    //     SEO::setDescription(substr(strip_tags($course->description), 0, 160));

    //     SEO::opengraph()->setTitle("$course->name");
    //     SEO::opengraph()->setDescription(substr(strip_tags($course->description), 0, 160));
    //     // Added by hillary
    //     SEO::opengraph()->setUrl(url()->current());
    //     SEO::addProperty('type', 'Course');

    //     SEO::twitter()->setTitle("$course->name");
    //     SEO::twitter()->setSite('@indepthresearch');

    //     SEO::jsonLd()->setTitle("$course->name");
    //     SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

    //     $locations = City::has('physicalClasses')->orderBy('priority')->get();

    //     $customer = Auth::check()
    //         ? Customer::whereUserId(Auth::id())->first()
    //         : null;
    //     $ar = array();
    //     foreach ($course->physicalClasses->load('currencies') as $value) {
    //         array_push($ar, $value->city_id);
    //     }

    //     return view('front/course/course-schedules', compact('course', 'customer', 'locations', 'type'));
    // }

    /**
     * Download document.
     *
     * @param Request $request
     * @return Response
     */
    public function document(Request $request): Response
    {
        $document = Document::find($request->document_id);
        Download::create(array_merge($request->all(), ['document' => $document->name]));

        return Storage::download($document->path, $document->name);
    }

    /**
     * Customer enquiry.
     *
     * @param Request $request
     * @param Course $course
     * @return RedirectResponse
     */
    public function enquiry(Request $request, Course $course): RedirectResponse
    {
        $course->enquiries()->create($request->all());

        return back()->with('success', 'Your enquiry has been sent');
    }

    /**
     * Customer referral.
     *
     * @param Request $request
     * @param Course $course
     * @return RedirectResponse
     */
    public function referral(Request $request, Course $course): RedirectResponse
    {
        $course->referrals()->create($request->all());

        return back()->with('success', 'Your message has been sent to your colleague');
    }
}
