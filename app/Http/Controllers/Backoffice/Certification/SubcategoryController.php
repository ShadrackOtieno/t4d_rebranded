<?php

namespace App\Http\Controllers\Backoffice\Certification;

use App\Http\Controllers\Controller;
use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Subcategory\StoreRequest;
use App\Http\Controllers\Backoffice\Certification\Export\SubcategoryExcelExport;
use Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category)
    {
        $subcategories = $category->subcategories()->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"

                )->orWhere(

                    'name', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/certification/category/subcategory/index', compact('subcategories', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Subcategory\StoreRequest  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Category $category)
    {
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('certification/category/subcategory') : null;

        $slug = Str::slug($request->name, '-');

        $category->subcategories()->create( array_merge( $request->only(['name', 'description']), [

            'cover' => $cover,
            'slug' => $slug,
        ]) );

        return back()->with('success', 'Subcategory has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Subcategory $subcategory)
    {
        return view('backoffice/certification/category/subcategory/edit', compact('subcategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Subcategory $subcategory)
    {
        if ( $request->hasFile('cover') ) {

            $cover = $request->file('cover')->store('certification/category/subcategory');

            empty($subcategory->cover) ?: Storage::delete($subcategory->cover);
        }
        else
            $cover = $subcategory->cover;

        $slug = Str::slug($request->name, '-');

        $category->subcategories()->where(

            'id', $subcategory->id

        )->update( array_merge( $request->only(['name', 'description']), [

            'cover' => $cover,
            'slug' => $slug,
        ]) );

        return back()->with('success', 'Subcategory has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Subcategory $subcategory)
    {
        $subcategory->delete();

        return back()->with('success', 'Subcategory has been deleted');
    }

    /**
     * Export to excel.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function export(Category $category)
    {
        return ( new SubcategoryExcelExport($category) )->download("$category->name certification subcategories.xlsx");
    }
}
