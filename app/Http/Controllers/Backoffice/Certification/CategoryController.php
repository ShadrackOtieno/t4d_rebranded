<?php

namespace App\Http\Controllers\Backoffice\Certification;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Category\StoreCategoryRequest;
use App\Http\Requests\Backoffice\Category\UpdateRequest;
use App\Http\Controllers\Backoffice\Certification\Export\CategoryExcelExport;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::certification()->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'categories.id', 'like', "$search%"

                )->orWhere(

                    'name', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/certification/category/index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Category\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('certification/category') : null;

        $slug = Str::slug($request->name, '-');

        Category::create( array_merge( $request->only(['name', 'description']), [

            'cover' => $cover,
            'type' => 'certification',
            'slug' => $slug,
        ]) );

        return back()->with('success', 'Category has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backoffice/certification/category/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Category\UpdateRequest  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Category $category)
    {
        if ( $request->hasFile('cover') ) {

            $cover = $request->file('cover')->store('certification/category');

            empty($category->cover) ?: Storage::delete($category->cover);
        }
        else
            $cover = $category->cover;

        $slug = Str::slug($request->name, '-');

        $category->update( array_merge( $request->only(['name', 'description']), [

            'cover' => $cover,
            'slug' => $slug,
        ]) );

        return back()->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Category has been deleted');
    }

    /**
     * Export to excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return (new CategoryExcelExport)->download('certification categories.xlsx');
    }
}
