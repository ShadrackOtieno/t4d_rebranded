<?php

namespace App\Http\Controllers\Backoffice\Industry;

use App\Http\Controllers\Controller;
use App\Industry;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $industries = Industry::paginate(50);

        return view('backoffice/industry/all-industries', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice/industry/create-industry');
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
            'name' => 'bail|unique:industries|required|min:3',
            'description' => 'nullable|min:5',
            'subsector_id' => 'nullable'
        ]);

        $slug = Str::slug($request->name, '-');


        Industry::create(array_merge( $request->only([
            'name', 'description', 'subsector_id'
        ]),['slug' => $slug]));

        return back()->with('success', 'Industry Addition: Success');

    }

    /**
     * Display the specified resource.
     *
     * @param Industry $industry
     * @return Application|Factory|View
     */
    public function show(Industry $industry)
    {
        return view('backoffice/industry/show', compact('industry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Industry $industry
     * @return Application|Factory|View
     */
    public function edit(Industry $industry)
    {
        return view('backoffice/industry/edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Industry $industry
     * @return RedirectResponse
     */
    public function update(Request $request, Industry $industry): RedirectResponse
    {
        $request->validate([
            'name' => [
                'required',
                'min:3',
                Rule::unique('industries')->ignore($industry),
            ],
            'description' => 'min:5',
            'subsector_id' => 'nullable',
        ]);

        $industry->update( array_merge( $request->only([
            'name', 'description', 'subsector_id'
        ])));

        return redirect()->back()->with('success', 'Industry Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Industry $industry
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Industry $industry): RedirectResponse
    {
        $industry->delete();

        return back()->with('success', 'Industry Deletion: Success');
    }
}
