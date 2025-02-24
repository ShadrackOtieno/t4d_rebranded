<?php

namespace App\Http\Controllers;

use App\ProjectPage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectsDisplayController extends Controller
{
    //
    public function index($field = null,$data = null){
        //The variable to be changes to sectors
        /*
        * @sector ProjectPage::class
        */
        $sectors = ProjectPage::distinct()->get(['sector']);
        $countries = ProjectPage::distinct()->get(['location']);
        $industries = ProjectPage::distinct()->get(['industry']);
        $natures = ProjectPage::distinct()->get(['nature']);
        $types = Projectpage::distinct()->get(['type']);

        if($data === null || $field === null) $projects = ProjectPage::paginate(10);
        else $projects = ProjectPage::where($field, '=', $data)->paginate(10);

        return view('front.Projects.index', compact('projects', 'sectors', 'countries', 'industries', 'natures','types'));
    }

    public function show($id){
        $id = intval($id);
        $project = ProjectPage::findOrFail($id);

        //Gets the period the project took to complete
        $period = Carbon::parse($project->started_on)->diffInMonths(Carbon::parse($project->ended_on));
        if($period === 0) $period = Carbon::parse($project->started_on)->diffInDays(Carbon::parse($project->ended_on)) ." days";
        else $period .= " months";

        return view('front.Projects.show', compact('project','period'));//dd(empty($project->organisations));
    }
}
