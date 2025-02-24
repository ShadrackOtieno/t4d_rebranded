<?php

namespace App\Http\Controllers\Backoffice\TrainerIssue;

use App\Http\Controllers\Controller;
use App\TrainerIssue;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\TrainerIssue\Export\TrainerIssueExcelExport;

class TrainerIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trainer_issues = TrainerIssue::join(

            'customers', 'trainer_issues.customer_id', '=', 'customers.id'

        )->when( $request->search, function ($query, $search) {

            $query->where(

                'trainer_issues.id', 'like', "$search%"

            )->orWhere(

                'customers.first_name', 'like', "%$search%"

            )->orWhere(

                'customers.last_name', 'like', "%$search%"

            )->orWhereHasMorph('booking', 'App\CourseBooking', function ($query) use ($search) {

                $query->whereHas('course', function ($query) use ($search) {

                    $query->where('name', 'like', "%$search%");
                });

            })->orWhereHasMorph('booking', 'App\CourseBundleBooking', function ($query) use ($search) {

                $query->whereHas('courseBundle', function ($query) use ($search) {

                    $query->where('name', 'like', "%$search%");
                });

            })->orWhereHas('trainers', function ($query) use ($search) {

                $query->where(

                    'first_name', 'like', "%$search%"

                )->orWhere(

                    'last_name', 'like', "%$search%"
                );
            });

        })->selectRaw(

            "trainer_issues.*, 
            CONCAT(customers.first_name, ' ', customers.last_name) AS customer"

        )->latest('trainer_issues.created_at')->paginate(10)->appends( $request->query() );

        return view('backoffice/trainer_issue/index', compact('trainer_issues'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainerIssue  $trainer_issue
     * @return \Illuminate\Http\Response
     */
    public function show(TrainerIssue $trainer_issue)
    {
        return view('backoffice/trainer_issue/show', compact('trainer_issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\TrainerIssue  $trainer_issue
     * @return \Illuminate\Http\Response
     */
    public function resolve(TrainerIssue $trainer_issue)
    {
        $trainer_issue->update(['status' => 'resolved']);

        return back()->with('success', 'Trainer issue has been resolved');
    }

    /**
     * Export to excel.
     * 
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new TrainerIssueExcelExport )->download('trainer issues.xlsx');
    }
}
