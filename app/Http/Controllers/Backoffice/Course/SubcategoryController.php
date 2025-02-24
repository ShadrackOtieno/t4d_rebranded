<?php

namespace App\Http\Controllers\Backoffice\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Http\Controllers\Backoffice\Course\Export\SubcategoryExcelExport;
use App\Http\Requests\Backoffice\Subcategory\UpdateRequest;
use App\Http\Requests\Backoffice\Subcategory\StoreRequest;
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
        $subcategories = $category->subcategories()->when($request->search, function ($query, $search) {

            $query->where( function ($query) {
                $query->where(
                    'id', 'like', "$search%"
                )->orWhere(
                    'name', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/category/subcategory/index', compact('subcategories', 'category'));
    }

    /**
     * Show the category courses.
     *
     * @param  \App\Category  $category
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Subcategory $subcategory)
    {
        $courses = $subcategory->courses;

        return view('backoffice/course/category/subcategory/show', compact('courses', 'subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('backoffice/course/category/subcategory/create', compact('category'));
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
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('course/category/subcategory') : null;

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
        return view('backoffice/course/category/subcategory/edit', compact('category', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Subcategory\UpdateRequest  $request
     * @param  \App\Category  $category
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Category $category, Subcategory $subcategory)
    {
        if ( $request->hasFile('cover') ) {
            $cover = $request->file('cover')->store('course/category/subcategory');
            empty($subcategory->cover) ?: Storage::delete($subcategory->cover);
        }
        else
            $cover = $subcategory->cover;

        $slug = Str::slug($request->name, '-');

        $category->subcategories()->where('id', $subcategory->id)
            ->update( array_merge( $request
            ->only(['name', 'description', 'category_id']), [
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
        return ( new SubcategoryExcelExport($category) )->download('course subcategories.xlsx');
    }
}
