<?php

namespace App\Http\Controllers\Backoffice\LandingPage;

use App\LandingPage\Testimonial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\LandingPage\LandingPage;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TestimonialController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return View
     */
    public function create(Request $request)
    {
        $landing_page = LandingPage::where('id', $request->landing_page)->first();
        $landing_pages = LandingPage::all();

        return view('backoffice/landing-pages/create-testimonial', compact('landing_page', 'landing_pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        $profile_image = $this->validatedData($request);

        Testimonial::create([
            'name_organization' => $request->name_organization,
            'message' => $request->message,
            'landing_page_id' => $request->landing_page_id,
            'banner_image' => $profile_image
        ]);

        return redirect(route('backoffice.landing-pages.edit', $request->landing_page_id))->with('success', 'Landing page testimonial has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Testimonial  $testimonial
     * @return View
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backoffice/landing-pages/update-testimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Testimonial  $testimonial
     * @return RedirectResponse
     */
    public function update(Request $request, Testimonial $testimonial)
    {

        $request->merge(['landing_page_id' => $testimonial->landing_page_id]);
        $profile_image = $this->validatedData($request);

        $testimonial->update([
            'name_organization' => $request->name_organization,
            'message' => $request->message,
            'landing_page_id' => $request->landing_page_id,
            'banner_image' => $profile_image
        ]);

        return redirect(route('backoffice.landing-pages.edit', $request->landing_page_id))->with('success', 'Landing page testimonial has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Testimonial  $testimonial
     * @return RedirectResponse
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return back()->with('success', 'Landing page testimonial has been deleted');
    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    public function validatedData(Request $request)
    {
        $this->validate($request, [
            'name_organization' => 'min:3|required',
            'message' => 'min:10|required',
            'landing_page_id'=>'required',
            'banner_image'=>'required'
        ]);
        $banner_image = null;
        if ($request->hasFile('banner_image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $banner_image = $request->banner_image->storeAs('testimonials', $filename);
        }
        return $banner_image;
    }
}
