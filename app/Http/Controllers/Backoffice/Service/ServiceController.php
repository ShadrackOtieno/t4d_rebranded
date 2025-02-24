<?php

namespace App\Http\Controllers\Backoffice\Service;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceEnquiry;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $services = Service::paginate(50);

        return view('backoffice/service/index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice/service/create');
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
            'name' => 'required|unique:services|min:3',
            // 'industry_id' => 'required',
            'capability_id' => 'required',
            'description' => 'required|min:15',
            'banner_description' => 'required|min:15'
        ]);


        $slug = Str::slug($request->name, '-');

        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'banner_description' => $request->banner_description,
            'capability_id' => $request->capability_id,
            'slug' => $slug
            ]);

        // !$request->filled('industry_id') ?: $service->industries()->attach($request->industry_id);

        return back()->with('success', 'Service has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function edit(Service $service)
    {
        return view('backoffice/service/edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|min:3',
            // 'industry_id' => 'required',
            'capability_id' => 'required',
            'description' => 'required|min:3',
            'banner_description' => 'required|min:3'
        ]);

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'capability_id' => $request->capability_id,
            'banner_description' => $request->banner_description,
        ]);

        $service->industries()->sync($request->industry_id);

        return back()->with('success', 'Service has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return back()->with('success', 'Service Deletion: Success');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function enquiries()
    {
        $enquiries = ServiceEnquiry::paginate(50);

        return view('backoffice/service/enquiries', compact('enquiries'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param ServiceEnquiry $enquiry
     * @return Application|Factory|View
     */
    public function enquiry(ServiceEnquiry $enquiry)
    {
        return view('backoffice/service/view-enquiry', compact('enquiry'));
    }
}
