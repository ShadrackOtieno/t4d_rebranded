<?php

namespace App\Http\Controllers;

use App\CategoryEnquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Subcategory;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\LandingPage\LandingPage;

class CategoryEnquiryController extends Controller
{
    /**
     * Store a download form details.
     *
     * @param Request $request
     * @param Subcategory $subcategory
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function enquiry(Subcategory $subcategory, Request $request){
        $validated = $request->validate([
            'full_name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'phone' => 'required|min:3'
        ]);
        $subcategory_id = $subcategory->id;

        CategoryEnquiry::create(array_merge($validated, compact('subcategory_id')));
        $landing_page = LandingPage::where('subcategory_id', $subcategory->id)->first();

        $filePath = storage_path('app/public/'.$landing_page->catalog_file);
        return Response::download($filePath, $subcategory->name.' course catalog.pdf',
        [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment',
        ]);
   
    }
}
