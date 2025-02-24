<?php

namespace App\Http\Controllers\Backoffice\Certification;

use App\Certification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Certification\StoreRequest;
use App\Http\Requests\Backoffice\Certification\UpdateRequest;
use App\Http\Controllers\Backoffice\Certification\Export\CertificationExcelExport;
use Str;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $certifications = Certification::join(

            'categories', 'certifications.category_id', '=', 'categories.id'

        )->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'certifications.id', 'like', "$search%"
    
                )->orWhere(
    
                    'certifications.name', 'like', "%$search%"

                )->orWhere(
    
                    'categories.name', 'like', "%$search%"
                );
            });

        })->selectRaw(

            "certifications.*, categories.name AS category"

        )->latest('certifications.created_at')->paginate(10)->appends( $request->query() );

        return view('backoffice/certification/index', compact('certifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice/certification/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('certification/cover') : null;

        $slug = Str::slug($request->name, '-');

        $certification = Certification::create( array_merge( $request->only([

            'name', 'category_id', 'subcategory_id', 'description', 'outline', 'module', 'code', 'topic_id', 'certifying_body_id', 'exam', 'prerequisite',

        ]), compact('cover', 'slug'), [

            'event_types' => implode(' | ', $request->event_types),
            'featured' => $request->has('featured') ? true : false,
        ]) );

        !$request->filled('software') ?: $certification->software()->attach($request->software);

        !$request->filled('tours') ?: $certification->tours()->attach($request->tours);

        $request->isNotFilled('trainers') ?: $certification->trainers()->attach($request->trainers);

        return back()->with('success', 'Certification has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification)
    {
        $certification->loadCount('documents', 'virtualClasses', 'physicalClasses');
        
        return view('backoffice/certification/edit', compact('certification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\UpdateRequest  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Certification $certification)
    {
        if ( $request->hasFile('cover') ) {

            $cover = $request->file('cover')->store('certification/cover');

            empty($certification->cover) ?: Storage::delete($certification->cover);
        }
        else
            $cover = $certification->cover;

        $slug = Str::slug($request->name, '-');

        $certification->update( array_merge( $request->only([

            'name', 'category_id', 'subcategory_id', 'description', 'outline', 'module', 'code', 'topic_id', 'certifying_body_id', 'exam', 'prerequisite',

        ]), compact('cover', 'slug'), [

            'event_types' => implode(' | ', $request->event_types),
            'featured' => $request->has('featured') ? true : false,
        ]) );

        $certification->software()->sync($request->software);

        $certification->tours()->sync($request->tours);

        $certification->trainers()->sync($request->trainers);

        return back()->with('success', 'Certification has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certification $certification)
    {
        $certification->delete();

        return back()->with('success', 'Certification has been deleted');
    }

    /**
     * Export to excel.
     * 
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return (new CertificationExcelExport)->download("certifications.xlsx");
    }
}
