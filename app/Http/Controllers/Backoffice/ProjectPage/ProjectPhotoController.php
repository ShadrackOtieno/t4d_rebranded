<?php

namespace App\Http\Controllers\Backoffice\ProjectPage;

use App\Http\Requests\ProjectPhotoRequest;
use App\ProjectPage;
use App\ProjectPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class ProjectPhotoController extends Controller
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
        if($request->hasFile('images')){
            //This line fetchs the name to be give to the image being uploaded
            $photos = $this->getPage($request);
    
            foreach($photos AS $photo){
                ProjectPhoto::create([
                    'project_id' => $this->project_id,
                    'name' => $photo,
                ] );
                 
            }/**/
        }
    }
    
    public function update(ProjectPhotoRequest $request, $id)
    {
        $this->project_id = $id;
        if($request->hasFile('images')){
            //This line fetchs the name to be give to the image being uploaded
            $photos = $this->getPage($request);
    
            foreach($photos AS $photo){
                ProjectPhoto::create([
                    'project_id' => $this->project_id,
                    'name' => $photo,
                ] );
                 
            }/**/
            
            return back()->with('success', 'Successfully Uploaded more Photos');
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
        if($request != null && $request->has('images')){
            foreach($request->images AS $image){
                if(File::exists(public_path('images/project/'.$image))){
                    File::delete(public_path('images/project/'.$image));
                }
                ProjectPhoto::where('name', $image)->delete();
            }
            
            return back()->with('success', 'Photos have been deleted');
        }else{
            return back();
        }

    }

    public function destroyProject(ProjectPage $project){
        $images = [];
        foreach($project->projectphotos AS $projectphoto){
            array_push($images, $projectphoto->name);
        }
        
        if($images != null){
            foreach($images AS $image){
                if(File::exists(public_path('images/Project/'.$image))){
                    File::delete(public_path('images/Project/'.$image));
                }
            }
            ProjectPhoto::where('project_id', $this->project_id)->delete();
        }
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getPage($request)
    {
        $filename = null;
        $photos = [];
        
        foreach($request->images AS $photo){
            $randomize = rand(111111, 999999);
            $extension = $photo->getClientOriginalExtension();
            $photoname = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = $randomize . "_" . time() ."_".$photoname. "." . $extension;
            $photo->move(public_path('images/project'), $filename);
            array_push($photos, $filename);
        }

        return $photos;
    }
}
