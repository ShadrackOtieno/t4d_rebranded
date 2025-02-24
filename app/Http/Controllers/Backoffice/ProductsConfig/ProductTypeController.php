<?php

namespace App\Http\Controllers\Backoffice\ProductsConfig;

use App\Http\Controllers\Controller;
use App\ProductsConfig\ProductType;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $configurations = ProductType::all();
        $type = 'Product Types';

        return view('backoffice.pages.products-config.index', compact('configurations', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $type = 'Product Types';

        return view('backoffice.pages.products-config.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store()
    {
        ProductType::create($this->ValidatedRequests());

        return redirect(route('backoffice.product-types.index'))->with('success', 'Product Types Creation: Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductType $product_type
     * @return Application|Factory|View
     */
    public function edit(ProductType $product_type)
    {
        $type = 'Product Types';

        return view('backoffice.pages.products-config.edit', compact('product_type', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductType $product_type
     * @return Application|Redirector|RedirectResponse
     */
    public function update(ProductType $product_type)
    {
        $product_type->update($this->ValidatedRequests());

        return redirect(route('backoffice.product-types.index'))->with('success', 'Product Types Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductType $product_type
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(ProductType $product_type): RedirectResponse
    {
        $product_type->delete();
        return redirect()->back()->with('success', 'Product Type deleted successfully.');
    }

    /**
     * Validate the request attributes
     *
     * @return array
     */
    protected function ValidatedRequests(): array
    {
        return request()->validate([
            'name' => 'required|min:3',
            'description' => 'sometimes|nullable'
        ]);
    }
}
