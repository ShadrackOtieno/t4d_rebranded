<?php

namespace App\Http\Controllers\Backoffice\FAQs;

use App\FAQ;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|View
     */
    public function index()
    {
        $faqs = FAQ::paginate(20);

        return view('backoffice/faqs/index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('backoffice/faqs/create');
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
            'title' => 'bail|required|unique:f_a_q_s|min:5',
            'tag' => 'required',
            'description' => 'required|min:5',
        ]);

        $slug = Str::slug($request->title, '-');

        FAQ::create(array_merge( $request->only([
            'title', 'tag', 'description'
        ]), compact('slug'), [
            'featured' => $request->has('featured') ? true : false,
        ]) );

        return back()->with('success', 'FAQ has been addded');
    }

    /**
     * Display the specified resource.
     *
     * @param FAQ $fAQ
     * @return Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FAQ $faq
     * @return View
     */
    public function edit(FAQ $faq)
    {
        return view('backoffice/faqs/edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param FAQ $faq
     * @return RedirectResponse
     */
    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'title' => 'bail|required|min:5',
            'tag' => 'required',
            'description' => 'required|min:5',
        ]);

        $faq->update( array_merge( $request->only([
            'title', 'tag', 'description'
        ]),
            ['featured' => $request->has('featured') ? true : false]
        ));

        return back()->with('success', 'FAQ has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FAQ $faq
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return back()->with('success', 'FAQ has been deleted');
    }
}
