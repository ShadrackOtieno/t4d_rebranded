<?php

namespace App\Http\Controllers\Backoffice;

use App\CoreValue;
use App\History;
use App\Section;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AboutPageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create_section(): View
    {
        $sections = DB::table('sections')
            ->orderBy('order')
            ->get();

        return view('backoffice/settings/about_page_sections', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create_history(): View
    {
        $histories = DB::table('histories')
            ->orderBy('year', 'DESC')
            ->get();

        return view('backoffice/settings/company_history', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create_value(): View
    {
        $values = DB::table('core_values')
            ->get();

        return view('backoffice/settings/core_values', compact('values'));
    }

    /**
     * Store a newly created section resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store_section(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'bail|required|unique:sections|min:3',
            'description' => 'required|min:5',
        ]);

        Section::create(array_merge( $request->only([
            'title', 'description', 'order'
        ])
        ) );

        return back()->with('success', 'Section has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Section $section
     * @return View
     */
    public function edit_section(Section $section)
    {
        return view('backoffice/settings/edit_section', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Section $section
     * @return RedirectResponse
     */
    public function update_section(Request $request, Section $section)
    {
        $request->validate([
            'title' => 'bail|required|min:3',
            'description' => 'required|min:5',
        ]);

        $section->update( array_merge( $request->only([
            'title', 'description', 'order'
        ])
        ));

        return redirect()->route('backoffice.about.sections')->with('success', 'Section has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Section $section
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy_section(Section $section)
    {
        $section->delete();

        return back()->with('success', 'Section has been deleted');
    }

    // ---------------------------History--------------------------------------
    /**
     * Store a newly created section resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store_history(Request $request): RedirectResponse
    {
        $request->validate([
            'year' => 'bail|required|unique:histories|min:4',
            'description' => 'required|min:5',
        ]);

        History::create(array_merge( $request->only([
            'year', 'description'
        ])));

        return back()->with('success', 'History has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param History $history
     * @return View
     */
    public function edit_history(History $history)
    {
        return view('backoffice/settings/edit_history', compact('history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param History $history
     * @return RedirectResponse
     */
    public function update_history(Request $request, History $history)
    {
        $request->validate([
            'year' => 'bail|required|min:4',
            'description' => 'required|min:5',
        ]);

        $history->update( array_merge( $request->only([
            'year', 'description'
        ])
        ));

        return redirect()->route('backoffice.about.history.index')->with('success', 'History has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param History $history
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy_history(History $history)
    {
        $history->delete();

        return back()->with('success', 'History has been deleted');
    }

    // ---------------------------Core Values--------------------------------------
    /**
     * Store a newly created section resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store_value(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'bail|required|unique:core_values|min:4',
            'description' => 'required|min:5',
        ]);

        CoreValue::create(array_merge( $request->only([
            'title', 'description'
        ])));

        return back()->with('success', 'Core value successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit_value($id)
    {
        $core_value = CoreValue::find($id);

        return view('backoffice/settings/edit_core_value', compact('core_value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return RedirectResponse
     */
    public function update_value(Request $request, $id)
    {
        $core_value = CoreValue::find($id);

        $request->validate([
            'title' => 'bail|required|min:4',
            'description' => 'required|min:5',
        ]);

        $core_value->update( array_merge( $request->only([
            'title', 'description'
        ])
        ));

        return redirect()->route('backoffice.about.values.index')->with('success', 'Core Value updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy_value($id)
    {
        $core_value = CoreValue::find($id);

        $core_value->delete();

        return back()->with('success', 'Core value deleted successfully!');
    }
}
