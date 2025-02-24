<?php

namespace App\Http\Controllers\Backoffice\Service;
use App\Http\Controllers\Controller;

use App\ServiceIndustry;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceIndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $industries = ServiceIndustry::latest()->paginate(50);

        return view('backoffice/industry/all-industries', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice/industry/create-service-industry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|unique:service_industries|required|min:3',
            'description' => 'nullable|min:5',
            'cover_image' => 'required',
            'group_training_description' => 'nullable|min:5',
            'team_building_description' => 'nullable|min:5',
            'services_description' => 'nullable|min:5',
            'software_description' => 'nullable|min:5',
            'tours_description' => 'nullable|min:5',
        ]);

        $cover_image = null;

        $slug = Str::slug($request->name, '-');

        if ($request->hasFile('cover_image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $cover_image = $request->cover_image->storeAs('industry_banners', $filename);
        }

        ServiceIndustry::create(array_merge( $request->only([
            'name', 'description', 'group_training_description', 'team_building_description',
            'services_description', 'software_description', 'tours_description'
        ]),['slug' => $slug, 'cover_image' => $cover_image]));

        return back()->with('success', 'Service Industry Addition: Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ServiceIndustry $serviceIndustry
     * @return Application|Factory|View
     */
    public function edit(ServiceIndustry $serviceIndustry)
    {
        return view('backoffice/industry/service_industry-edit', compact('serviceIndustry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ServiceIndustry $serviceIndustry
     * @return Response
     */
    public function update(Request $request, ServiceIndustry $serviceIndustry): RedirectResponse
    {
        $request->validate([
            'name' => [
                'required',
                'min:3',
                Rule::unique('service_industries')->ignore($serviceIndustry),
            ],
            'description' => 'min:5',
            'group_training_description' => 'nullable|min:5',
            'team_building_description' => 'nullable|min:5',
            'services_description' => 'nullable|min:5',
            'software_description' => 'nullable|min:5',
            'tours_description' => 'nullable|min:5',
        ]);

        $serviceIndustry->update(array_merge($request->only([
            'name', 'description', 'group_training_description', 'team_building_description',
            'services_description', 'software_description', 'tours_description'
        ])));

        return redirect()->route('backoffice.service_industries.index')->with('success', 'Industry Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ServiceIndustry $serviceIndustry
     * @return RedirectResponse
     */
    public function destroy(ServiceIndustry $serviceIndustry)
    {
        $serviceIndustry->delete();

        return back()->with('success', 'Industry Deletion: Success');
    }
}
