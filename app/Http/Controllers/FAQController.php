<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpOffice\PhpWord\Element\Title;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    
    // public function show($id = null)
    // {
    //     $faqs = null;
        
    //     if($id != null) $faqs = FAQ::where('tag', '=', $id)->get();
    //     else $faqs = FAQ::all();

    //     $faqts =  FAQ::distinct()->orderBy('tag')->get(['tag']);

    //     return view('front/faqs/show', compact('faqs', 'faqts'));
    // }
    public function show($id = null)
    {
        $faqs = null;
        
        if($id != null) $faqs = FAQ::where('tag', '=', $id)->get();
        else $faqs = FAQ::all();

        $faqts =  FAQ::distinct()->orderBy('tag')->get(['tag']);

        return view('front/faqs/show', compact('faqs', 'faqts'));
    }
    // public function submitQuestion(Request $request)
    // {
    //     // Handle the question submission logic
    //     return redirect()->route('faqs')->with('status', 'Question submitted!');
    // }

    // public function show(FAQ $faq)
    // {
    //     $tags = FAQ::where('tag', $faq->id)->get();

    //     return view('front/faqs/show', compact('tags'));

    // }
}
