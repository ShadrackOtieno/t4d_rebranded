<?php

namespace App\Http\Controllers\Backoffice\Service;

use App\Http\Controllers\Controller;
use App\ServiceCapability;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceCapabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $capabilities = ServiceCapability::paginate(50);

        return view('backoffice/service/capability/index', compact('capabilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice/service/capability/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => 'required|unique:services|min:3',
    //         'description' => 'required',
    //         'cover_image' => 'nullable',
    //     ]);

    //     $cover_image = null;

    //     if ($request->hasFile('cover_image')) {
    //         $randomize = rand(111111, 999999);
    //         $extension = $request->file('cover_image')->getClientOriginalExtension();
    //         $filename = $randomize . '.' . $extension;
    //         $cover_image = $request->$cover_image->storeAs('capability', $filename);
    //     }

    //     $slug = Str::slug($request->name, '-');

    //     ServiceCapability::create([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'cover_image' => $request->cover_image,
    //         'slug' => $slug
    //     ]);

    //     return back()->with('success', 'Service has been addded');
    // }
    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:services|min:3',
            'description' => 'required',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validation rules for cover_image
        ]);
    
        $cover_image = null;
    
        if ($request->hasFile('cover_image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $cover_image = $request->file('cover_image')->storeAs('capability', $filename, 'public');
        }
    
        $slug = Str::slug($request->name, '-');
    
        ServiceCapability::create([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $cover_image, // Use the stored path of the cover image
            'slug' => $slug
        ]);
    
        return back()->with('success', 'Service has been added');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param ServiceCapability $capability
     * @return Application|Factory|View
     */
    public function edit(ServiceCapability $capability)
    {
        return view('backoffice/service/capability/edit', compact('capability'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ServiceCapability $capability
     * @return RedirectResponse
     */
    public function update(Request $request, ServiceCapability $capability): RedirectResponse
    {
        $cover_image = null;

        if ($request->hasFile('cover_image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $cover_image = $request->file('cover_image')->storeAs('capability', $filename, 'public');
        }
    
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'cover_image' => 'nullable'
        ]);

        $capability->update([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $cover_image,
        ]);

        return back()->with('success', 'Service Capability has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ServiceCapability $capability
     * @return RedirectResponse
     */
    public function destroy(ServiceCapability $capability): RedirectResponse
    {
        $capability->delete();

        return back()->with('success', 'Service Capability Deletion: Success');
    }
}
