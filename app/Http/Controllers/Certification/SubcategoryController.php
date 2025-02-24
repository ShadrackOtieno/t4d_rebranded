<?php

namespace App\Http\Controllers\Certification;

use App\Category;
use App\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SEO;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Category  $category
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Subcategory $subcategory)
    {
        SEO::setTitle( "$subcategory->name - $category->name - Certifications - " . config('app.name') );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "$subcategory->name - $category->name - Certifications - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$subcategory->name - $category->name - Certifications - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$subcategory->name - $category->name - Certifications - " . config('app.name') );

        $certifications = $subcategory->certifications()->selectRaw(

            "certifications.name, certifications.slug, certifications.id, certifications.cover, certifications.created_at, 'single' AS type"
        );

        $certification_bundles = $subcategory->certificationBundles()->selectRaw(

            "certification_bundles.name, certification_bundles.slug, certification_bundles.id, certification_bundles.cover, certification_bundles.created_at, 'bundle' AS type"
        );

        $certifications = $certification_bundles->unionAll($certifications)->latest()->paginate(10);

        return view('front/certification/category/subcategory/show', compact('subcategory', 'certifications', 'category', 'certification_bundles'));
    }
}
