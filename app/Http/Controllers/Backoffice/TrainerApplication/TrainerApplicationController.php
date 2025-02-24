<?php

namespace App\Http\Controllers\Backoffice\TrainerApplication;

use App\Http\Controllers\Controller;
use App\TrainerApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\TrainerApplication\Export\TrainerApplicationExcelExport;
use Storage;

class TrainerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trainer_applications = TrainerApplication::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'name', 'like', "%$search%"

            )->orWhere(

                'phone', 'like', "%$search%"

            )->orWhere(

                'email', 'like', "%$search%"
                
            );

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/trainer_application/index', compact('trainer_applications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainerApplication  $trainerApplication
     * @return \Illuminate\Http\Response
     */
    public function show(TrainerApplication $trainer_application)
    {
        return view('backoffice/trainer_application/show', compact('trainer_application'));
    }

    /**
     * Export to excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new TrainerApplicationExcelExport )->download('trainer applications.xlsx');
    }

    /**
     * Download resume file.
     *
     * @param  \App\TrainerApplication  $trainerApplication
     * @return \Illuminate\Http\Response
     */
    public function resume(TrainerApplication $trainer_application)
    {
        return Storage::download($trainer_application->document, "$trainer_application->name Resume File");
    }
}
