<?php

namespace App\Http\Controllers\Backoffice\LandingPage;

use App\LandingPage\LandingPage;
use App\LandingPage\Features;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Exception;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
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

        return view('backoffice/landing-pages/create-feature', compact('landing_page', 'landing_pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateData($request);
        
        Features::create([
            'title' => $request->title,
            'description' => $request->description,
            'landing_page_id' => $request->landing_page_id,
        ]);

        return redirect(route('backoffice.landing-pages.edit', $request->landing_page_id))->with('success', 'Landing page feature has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Features  $feature
     * @return View
     */
    public function edit(Features $feature)
    {
        return view('backoffice/landing-pages/update-feature', compact('feature'));      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Features  $feature
     * @return RedirectResponse
     */
    public function update(Request $request, Features $feature)
    {  
        $request->merge(['landing_page_id' => $feature->landing_page_id]);
        $this->validateData($request);

        $feature->update([
            'title' => $request->title,
            'description' => $request->description,
            'landing_page_id' => $feature->landing_page_id,
        ]);

        return redirect(route('backoffice.landing-pages.edit', $feature->landing_page_id))->with('success', 'Landing page feature has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Features  $feature
     * @return RedirectResponse
     */
    public function destroy(Features $feature)
    {
        $feature->delete();

        return back()->with('success', 'Landing page feature has been deleted');
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateData(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|min:15',
            'title' => 'min:5|required',
            'landing_page_id'=>'required'
        ]);
    }
}
