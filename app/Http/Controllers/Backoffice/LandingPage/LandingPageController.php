<?php

namespace App\Http\Controllers\Backoffice\LandingPage;

use App\LandingPage\LandingPage;
use App\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Exception;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|View
     */
    public function index()
    {
        $pages = LandingPage::paginate(50);
        
        return view('backoffice/landing-pages/index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $subcategories = Subcategory::all();

        return view('backoffice/landing-pages/create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $catalog = $this->getPage($request);

        LandingPage::create([
            'banner_description' => $request->banner_description,
            'description_title' => $request->description_title,
            'description' => $request->description,
            'subcategory_id' => $request->subcategory_id,
            'catalog_file' => $catalog,
        ] );

        return back()->with('success', 'Landing page has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LandingPage $landing_page
     * @return View
     */
    public function edit(LandingPage $landing_page)
    {
        return view('backoffice/landing-pages/edit', compact('landing_page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param LandingPage $landing_page
     * @return RedirectResponse
     */
    public function update(Request $request, LandingPage $landing_page)
    {
        $catalog = $this->getPage($request);

        $landing_page->update([
            'banner_description' => $request->banner_description,
            'description_title' => $request->description_title,
            'description' => $request->description,
            'subcategory_id' => $request->subcategory_id,
            'catalog_file' => $catalog,
        ] );

        return back()->with('success', 'Landing page has been addded');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LandingPage $landing_page
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(LandingPage $landing_page)
    {
        $landing_page->delete();

        return back()->with('success', 'Landing page has been deleted');
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getPage(Request $request)
    {
        $this->validate($request, [
            'banner_description' => 'required|min:15',
            'description_title' => 'min:5|required',
            'description' => 'min:15|required',
            'subcategory_id'=>'required',
            'catalog_file'=>'required'
        ]);

        $catalog_file = null;
        if ($request->hasFile('catalog_file')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('catalog_file')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $catalog_file = $request->catalog_file->storeAs('catalogs', $filename);
        }
        return $catalog_file;
    }
}
