<?php

namespace App\Http\Controllers\Certification;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SEO;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEO::setTitle( "Certifications - " . config('app.name') );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "Certifications - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "Certifications - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "Certifications - " . config('app.name') );

        $categories = Category::certification()->with('subcategories')->latest()->paginate(10);

        return view('front/certification/category/index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        SEO::setTitle( "$category->name - Certifications - " . config('app.name') );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "$category->name - Certifications - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$category->name - Certifications - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$category->name - Certifications - " . config('app.name') );

        $subcategories = $category->subcategories()->latest()->paginate(10);

        return view('front/certification/category/show', compact('category', 'subcategories'));
    }
}
