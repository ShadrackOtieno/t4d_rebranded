<?php

namespace App\Http\Controllers\Certification;

use App\Certification;
use App\Document;
use App\Download;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use SEO;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifications = Certification::latest()->paginate(10);

        return view('front/certification/index', compact('certifications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function show(Certification $certification)
    {
        SEO::setTitle( "$certification->name - Certifications - " . config('app.name') );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "$certification->name - Certifications - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$certification->name - Certifications - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$certification->name - Certifications - " . config('app.name') );

        return view('front/certification/show', compact('certification'));
    }

    /**
     * Download document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function document(Request $request)
    {
        $document = Document::find($request->document_id);

        Download::create( array_merge($request->all(), ['document' => $document->name]) );

        return Storage::download($document->path, $document->name);
    }
}
