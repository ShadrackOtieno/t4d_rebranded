<?php

namespace App\Http\Controllers\Backoffice\Download;

use App\Download;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Download\Export\DownloadExcelExport;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $downloads = Download::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'name', 'like', "%$search%"

            )->orWhere(

                'phone', 'like', "%$search%"

            )->orWhere(

                'email', 'like', "%$search%"
      
            )->orWhere(

                'designation', 'like', "%$search%"
      
            )->orWhere(

                'document', 'like', "%$search%"
      
            )->orWhere(

                'organization', 'like', "%$search%"
            );

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/download/index', compact('downloads'));
    }

    /**
     * Export to excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new DownloadExcelExport )->download('downloads.xlsx');
    }
}
