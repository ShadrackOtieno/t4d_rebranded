<?php

namespace App\Http\Controllers\Course;

use App\City;
use App\Course;
use App\Customer;
use App\FAQ;
use App\Http\Controllers\Controller;
use App\Industry;
use App\Service;
use App\ServiceCapability;
use App\ServiceEnquiry;
use App\ServiceIndustry;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use SEO;

class CourseIndustryController extends Controller
{
    /**
     * Industries.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        SEO::setTitle( "Industry Courses" );
        SEO::setDescription( substr(strip_tags('Industry Courses'), 0, 160) );

        SEO::opengraph()->setTitle( "Industry Courses " );
        SEO::opengraph()->setDescription(substr(strip_tags('Industry Courses'), 0, 160));
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "Industry Courses" );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "Industry Courses" );

        $industries = ServiceIndustry::paginate(50);

        return view('front.course.industry.index', compact('industries'));
    }
    /**
     * Industry Courses.
     *
     * @param ServiceIndustry $industry
     * @return Application|Factory|View
     */
    public function show(ServiceIndustry $industry)
    {

        // SEO::setTitle( "$industry->name " );
        SEO::setDescription( substr(strip_tags($industry->description), 0, 165) );

        SEO::opengraph()->setTitle( "$industry->name " );
        SEO::opengraph()->setDescription(substr(strip_tags($industry->description), 0, 165));
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$industry->name " );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$industry->name " );

        $courses = $industry->courses()->paginate(50);

        return view('front.course.industry.show', compact('courses', 'industry'));
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return Application|Factory|View
     */
    public function view(Course $course)
    {
        SEO::setTitle( "$course->name " );
        SEO::setDescription( substr(strip_tags($course->description), 0, 165) );

        SEO::opengraph()->setTitle( "$course->name " );
        SEO::opengraph()->setDescription(substr(strip_tags($course->description), 0, 165));
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$course->name " );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$course->name " );

        $locations = City::has('physicalClasses')->orderBy('priority')->get();

        $faqs = FAQ::where('featured', '1')->get();

        $customer = Auth::check()
            ? Customer::whereUserId( Auth::id() )->first()
            : null;
        $ar=array();
        foreach($course->physicalClasses->load('currencies') as $value){
            array_push($ar,$value->city_id);
        }

        //return $course->physicalClasses->load('currencies');
        return view('front.course.industry.show-course', compact('course', 'customer', 'locations', 'faqs'));
    }

    /**
     * Services.
     *
     * @return Application|Factory|View
     * @param ServiceCapability $service_capability
     */
    public function services(ServiceCapability $service_capability)
    {

        SEO::setTitle( $service_capability->name );
        SEO::setDescription( substr(strip_tags($service_capability->description), 0, 165) );

        SEO::opengraph()->setTitle( $service_capability->name );
        SEO::opengraph()->setDescription(substr(strip_tags($service_capability->description), 0, 165));
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( $service_capability->name );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( $service_capability->name );

        return view('front.course.industry.services', compact('service_capability'));
    }

    /**
     * Services.
     *
     * @param Service $sevice
     * @return Application|Factory|View
     */
    public function service(Service $service)
    {
        SEO::setTitle( $service->name );
        SEO::setDescription( substr(strip_tags($service->description), 0, 165) );

        SEO::opengraph()->setTitle( $service->name );
        SEO::opengraph()->setDescription(substr(strip_tags($service->description), 0, 165));
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( $service->name );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( $service->name );


        return view('front.course.industry.service', compact('service'));
    }

    /**
     * Enquiries.
     *
     * @param Service $service
     * @param Request $request
     * @return RedirectResponse
     */
    public function enquiry(Service $service, Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'message' => 'required|min:10'
        ]);
        $service_id = $service->id;

        ServiceEnquiry::create(array_merge($validated, compact('service_id')));

        return back()->with('success', 'Enquiry Submission: Success...');
    }
}
