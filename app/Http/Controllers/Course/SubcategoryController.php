<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Subcategory;
use App\Category;
use App\Course;
use App\Topic;
use Illuminate\Http\Request;
use SEO;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        SEO::setTitle( "$category->name" );
        SEO::setDescription( strip_tags($category->description) ?? config('app.description') );

        SEO::opengraph()->setTitle( "$category->name " );
        SEO::opengraph()->setDescription( strip_tags($category->description) ?? config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$category->name" . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$category->name " . config('app.name') );

        $subcategories = $category->subcategories()->with('courses')->oldest()->Paginate(10);

        return view('front/course/category/subcategory/index', compact('category', 'subcategories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Subcategory $subcategory)
    {
        SEO::setTitle( "$subcategory->name" );
        SEO::setDescription( strip_tags($subcategory->description) ?? config('app.description') );

        SEO::opengraph()->setTitle( "$subcategory->name" );
        SEO::opengraph()->setDescription( strip_tags($subcategory->description) ?? config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$subcategory->name"  );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$subcategory->name" );

        $topics = Topic::where('subcategory_id', $subcategory->id)->get();
        $courses = $subcategory->courses()->selectRaw(

            "courses.id, courses.slug, courses.name, courses.cover, courses.created_at, 'course' AS type"
        )->oldest()->Paginate(20);
        
        return view('front/course/category/subcategory/show', compact('category', 'subcategory', 'topics', 'courses'));

        // return $courses->count()

        //             ? view('front/course/category/subcategory/show', compact('category', 'subcategory', 'topics', 'courses'))

        //             : view('front/course/category/subcategory/courses', compact('category', 'subcategory', 'courses', 'topics'))
        //             ;
    }
}
