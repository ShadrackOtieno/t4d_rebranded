<?php

namespace App\Http\Controllers\Backoffice\Programs;
use App\Http\Requests\Backoffice\Programs\StorePriceRequest;

use App\Http\Controllers\Controller;
use App\Program\Price;
use App\Program\Program;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Program $program)
    {

        return view('backoffice.programs.prices.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePriceRequest $request
     * @param Program $program
     * @return RedirectResponse
     */
    public function store(StorePriceRequest $request, Program $program)
    {
        Price::create($request->validated() + ['program_id' => $program->id]);

        return back()->with('success', 'Pricing has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param Price $price
     * @return Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Price $price
     * @return Application|Factory|View
     */
    public function edit(Price $price)
    {
        return view('backoffice.programs.prices.edit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePriceRequest $request
     * @param Price $price
     * @return RedirectResponse
     */
    public function update(StorePriceRequest $request, Price $price): RedirectResponse
    {
        $price->update($request->validated());

        return back()->with('success', 'Pricing has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Price $price
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Price $price): RedirectResponse
    {
        $price->delete();

        return back()->with('success', 'Price has been deleted');
    }
}
