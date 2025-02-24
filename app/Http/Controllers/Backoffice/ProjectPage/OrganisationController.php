<?php

namespace App\Http\Controllers\Backoffice\ProjectPage;

use App\Http\Requests\OrganisationRequest;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\ProjectPage;
use Illuminate\Http\Request;
use App\Organisation;
class OrganisationController extends Controller
{
    protected $project_id = null;

    public function __construct (ProjectPage $project){
        $this->project_id = $project->id;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        if($request->orgname != '' && $request->hasFile('logo')){
            //This line fetchs the name to be give to the image being uploaded
            $catalog = $this->getPage($request);
            Organisation::create([
                'project_id' => $this->project_id,
                'name' => $request->orgname,
                'photo' => $catalog
            ] );
        }
        /* */
    }

    public function update(OrganisationRequest $request, $id)
    {
        $this->project_id = $id;

        if($request->orgname != '' && $request->hasFile('logo')){
            $catalog = $this->getPage($request);
            Organisation::create([
                'project_id' => $this->project_id,
                'name' => $request->orgname,
                'photo' => $catalog
            ] );

            
            return back()->with('success', 'Collaborator has been Added');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProjectPage $project
     * @throws Exception
     * */
    public function destroy(Request $request, $id)
    {
        if($request != null && $request->has('photo')){
            foreach($request->photo AS $image){
                if(File::exists(public_path('images/Orgainsation/'.$image))){
                    File::delete(public_path('images/Orgainsation/'.$image));
                }
                Organisation::where('photo', $image)->delete();
            }
    
            return back()->with('success', 'Collaborator has been deleted');
        }else{
            return back();
        }
    }

    public function destroyProject(ProjectPage $project){
        $images = [];
        foreach($project->organisations AS $organisation){
            array_push($images, $organisation->photo);
        }
        
        if($images != null){
            foreach($images AS $image){
                if(File::exists(public_path('images/Orgainsation/'.$image))){
                    File::delete(public_path('images/Orgainsation/'.$image));
                }
            }
            Organisation::where('project_id', $this->project_id)->delete();
        }
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return string
     */
    public function getPage($request)
    {
        $filename = null;
        $randomize = rand(111111, 999999);
        $extension = $request->file('logo')->getClientOriginalExtension();
        $photoname = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
        $filename = $randomize . "_" . time() ."_".$photoname. "." . $extension;
        $request->file('logo')->move(public_path('images/Orgainsation'), $filename);

        return $filename;
    }
}
