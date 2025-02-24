<?php

namespace App\Http\Controllers\Backoffice;

use App\Company;
use App\Course;
use App\Http\Controllers\Controller;
use App\PhysicalClass;
use App\VirtualClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        // # face to face
        // $physical_schedules = PhysicalClass::whereDate('from', '>=', now())->get();

        // # virtual
        // $virtual_schedules = VirtualClass::whereDate('from', '>=', now())->get();

        // # concatenate the schedules
        // $schedules = $physical_schedules->concat($virtual_schedules);

        #get unconfirmed companies
        $companies = DB::table('companies')
            ->where('status', '=', '')
            ->orWhereNull('status')
            ->get();

        return view('backoffice.home', compact('courses', 'companies'));
    }
}
