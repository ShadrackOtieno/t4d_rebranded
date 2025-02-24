<?php

namespace App\Http\Controllers\Backoffice\ProjectPage;

use App\Http\Controllers\Backoffice\ProjectPage\OrganisationController;
use App\Http\Controllers\Backoffice\ProjectPage\ProjectPhotoController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Exception;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectPagetRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\ProjectPage;
use Illuminate\Support\Facades\File;

class ProjectPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|View
     *
     */
    public function index()
    {
        //Trail

        $projects = ProjectPage::paginate(15);

        return view('backoffice/project-pages/index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        //Take you to the create project page
        
        return view('backoffice/project-pages/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(ProjectPagetRequest $request)
    {
        //This line fetchs the name to be give to the image being uploaded
        $catalog = $this->saveCoverImage($request);
        $c_logo = $this->saveClientLogo($request) ?? "Nothing";
        
        
        $project = ProjectPage::create([
            'title' => $request->title,
            'client' => $request->client,
            'client_logo' => $c_logo,
            'excerpt' => trim(strip_tags($request->excerpt)),
            'budget' => $request->budget,
            'location' => $request->location,
            'region' => $request->region,
            'started_on' => $request->Sdate,
            'ended_on' => $request->Edate,
            'sector' => $request->sector,
            'industry' => $request->industry,
            'nature' => $request->nature,
            'p_impacted' => $request->impact,
            'description' => trim(strip_tags($request->description)),
            'date_created' => now(),
            'image' => $catalog,
        ] );
        
        $collaborates = new OrganisationController($project);
        $photos = new ProjectPhotoController($project);
        /* */
        
        $photos->store($request);
        $collaborates->store($request);
        
        $success = "Project has been addded";

        return view('backoffice/project-pages/edit', compact('project','success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProjectPage $project
     * @return View
     */
    public function edit($id)
    {
        $project = ProjectPage::findOrFail($id);

        return view('backoffice/project-pages/edit', compact('project'));
    }

    public function update(ProjectUpdateRequest $request, $id)
    {
        $project = ProjectPage::find($id);

        //Update the cover photo of the project
        if($request->hasFile('photo')){

            $catalog = $this->saveCoverImage($request, $project);

            $project->update([
                'image' => $catalog,
            ]);
        }

        //Update the client's logo
        if($request->hasFile('c_logo')){

            $c_logo = $this->saveClientLogo($request, $project) ?? "Nothing";
            $project->update([
                'client_logo' => $c_logo,
            ]);
        }
        
        $project->update([
            'title' => $request->title,
            'client' => $request->client,
            'excerpt' => trim(strip_tags($request->excerpt)),
            'budget' => $request->budget,
            'location' => $request->location,
            'region' => $request->region,
            'started_on' => $request->Sdate ?? now(),
            'ended_on' => $request->Edate,
            'sector' => $request->sector,
            'industry' => $request->industry,
            'nature' => $request->nature,
            'p_impacted' => $request->impact,
            'description' => trim(strip_tags($request->description)),
            'date_created' => now(),
        ]);
           /* */

        return back()->with('success', 'Project has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProjectPage $project
     * @return RedirectResponse
     * @throws Exception
     * */
    public function destroy($id)
    {
         $project = ProjectPage::findOrFail($id);

        if(File::exists(public_path('images/project/'.$project->image))){
            File::delete(public_path('images/project/'.$project->image));
        }
        
        $collaborates = new OrganisationController($project);
        $photos = new ProjectPhotoController($project);

        $collaborates->destroyProject($project);
        $photos->destroyProject($project);

        $project->delete();

        return back()->with('success', 'Project has been deleted');
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function saveCoverImage($request, $project = null)
    {
        $filename = null;
        
        if($project != null && File::exists(public_path('images/project/'.$project->image))){
            File::delete(public_path('images/project/'.$project->image));
        }

        $randomize = rand(111111, 999999);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filename = $randomize . "_" . time() . "." . $extension;
        $request->file('photo')->move(public_path('images/project'), $filename);

        return $filename;
    }
    
    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function saveClientLogo($request, $project = null)
    {
        $filename = null;
        
        if($project != null && File::exists(public_path('images/client/'.$project->c_logo))){
            File::delete(public_path('images/client/'.$project->c_logo));
        }

        $randomize = rand(111111, 999999);
        $extension = $request->file('c_logo')->getClientOriginalExtension();
        $filename = $randomize . "_" . time() . "." . $extension;
        $request->file('c_logo')->move(public_path('images/client'), $filename);

        return $filename;
    }
}
