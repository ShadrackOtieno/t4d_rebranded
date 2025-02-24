<?php

namespace App\Http\Controllers\Backoffice\Programs;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Program\Program;
use App\Tool;
use App\TechStack;
use Storage;
use App\Program\BrochureDownload;
use App\Http\Requests\Backoffice\Programs\StoreProgramRequest;
use App\Http\Requests\Backoffice\Programs\UpdateProgramRequest;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $programs = Program::all();

        return view('backoffice.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProgramRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    // public function store(StoreProgramRequest $request)
    // {
    //     if ($request->hasFile('brochure')) {
    //         $brochure = $request['brochure'] = $request->brochure->getClientOriginalName();
    //         $request->brochure->storeAs('public/Brochures', $brochure);

    //         $program = Program::create(['brochure' => $brochure] + $request->validated());
    //     }
    //     else{
    //         $program = Program::create($request->validated());
    //     }

    //     !$request->filled('bcg_level') ?: $program->bcg_levels()->attach($request->bcg_level);
    //     !$request->filled('pdc_stage') ?: $program->pdc_stages()->attach($request->pdc_stage);
    //     !$request->filled('skill_level') ?: $program->skill_levels()->attach($request->skill_level);
    //     !$request->filled('skill_type') ?: $program->skill_types()->attach($request->skill_type);
    //     !$request->filled('target_staff') ?: $program->target_staffs()->attach($request->target_staff);

    //     return redirect(route('backoffice.programs.programs.index'))->with('success', 'Program has been added.');
    // }

    public function store(StoreProgramRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('brochure')) {
            $brochure = $request['brochure'] = $request->brochure->getClientOriginalName();
            $request->brochure->storeAs('public/Brochures', $brochure);
            $data['brochure'] = $brochure;
        }
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('program/cover', 'public');
            $coverName = basename($coverPath);
            $data['cover'] = $coverPath; 
        }
        
        // if ($request->hasFile('cover')) {
        //     $cover = $request['cover'] = $request->cover->getClientOriginalName();
        //     $request->cover->store('program/cover');
        //     $data['cover'] = $cover;
        // }

        $program = Program::create($data);

        !$request->filled('bcg_level') ?: $program->bcg_levels()->attach($request->bcg_level);
        !$request->filled('pdc_stage') ?: $program->pdc_stages()->attach($request->pdc_stage);
        !$request->filled('skill_level') ?: $program->skill_levels()->attach($request->skill_level);
        !$request->filled('skill_type') ?: $program->skill_types()->attach($request->skill_type);
        !$request->filled('target_staff') ?: $program->target_staffs()->attach($request->target_staff);
        $program->techstacks()->attach($request->TechStack);

        // if ($request->hasFile('tools')) {
        //     foreach ($request->file('tools') as $toolfile) {
        //         $tool = new Tool;
        //         $path = $toolfile->store('/images/resource', ['disk' => 'tools']);
        //         $tool->url = $path;
        //         $tool->program_id = $program->id;
        //         $tool->save();
        //     }
        // }

        return redirect(route('backoffice.programs.programs.index'))->with('success', 'Program has been added.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Program  $program
     * @return Application|Factory|View
     */
    public function edit(Program $program)
    {
        return view('backoffice.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Program  $program
     * @return RedirectResponse
     */
    public function update(UpdateProgramRequest $request, Program $program): RedirectResponse
    {
        
        if ($request->hasFile('brochure')) {
            // Handle brochure upload
            $brochure = $request->brochure->getClientOriginalName();
            $request->brochure->storeAs('public/Brochures', $brochure);
            $program->brochure = $brochure;
        
    
        if ($request->hasFile('cover')) {
            // Handle cover upload
            $cover = rand(111111, 999999) . "." . $request->cover->getClientOriginalExtension();
            $request->file('cover')->move(public_path('images/programs'), $cover);
            $program->cover = $cover;
        }

            $program->update([
                'brochure' => $brochure,
                'name' => $request->name,
                'introduction' => $request->introduction,
                'about'=> $request->about,
                'description' => $request->description,
                'participants' => $request->participants,
                'alumni_information' => $request->alumni_information,
                'prerequisite' => $request->prerequisite,
                'methodology'=>$request->methodology,
                'outcomes' => $request->outcomes,
                'objective'=>$request->objective,
                'courses'=>$request->courses,
                'cover' => $cover

                // 'program_banner'=>$request->program_banner,
            ]);
            
        } else {
            $program->update([
                'name' => $request->name,
                'introduction' => $request->introduction,
                'about'=> $request->about,
                'description' => $request->description,
                'participants' => $request->participants,
                'alumni_information' => $request->alumni_information,
                'prerequisite' => $request->prerequisite,
                'methodology'=>$request->methodology,
                'objective'=>$request->objective,
                'outcomes' => $request->outcomes,
                'courses'=>$request->courses,
                // 'cover'=> $cover
                // 'tool_name' => $request->tool_name,
                // 'tool_banner' => $request->tool_banner
            ]);
        }

        $program->bcg_levels()->sync($request->bcg_level);
        $program->pdc_stages()->sync($request->pdc_stage);
        $program->skill_levels()->sync($request->skill_level);
        $program->skill_types()->sync($request->skill_type);
        $program->target_staffs()->sync($request->target_staff);
        $program->techstacks()->sync($request->TechStack);

        return back()->with('success', 'Program has been updated.');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param Program $program
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Program $program): RedirectResponse
    {
        $program->delete();

        return back()->with('success', 'Program has been updated');
    }

    // Brochure Downloads
    public function downloads()
    {
        $downloads = BrochureDownload::paginate(20);

        return view('backoffice.programs.brochure-downloads', compact('downloads'));
    }

    /**
     * Validate the update request attributes
     *
     * @return array
     */
    protected function ValidatedRequests(): array
    {
        return request()->validate([
            'name' => 'required|min:3',
            'brochure' => 'nullable',
            'introduction' => 'required',
            'about'=>'required',
            'description' => 'required',
            'participants' => 'required',
            'alumni_information' => 'nullable',
            'prerequisite' => 'prerequisite',
            'methodology' => 'required',
            'courser'=>'required',
            'objective'=>'required',
            // 'banner' => 'required',
            'cover' => 'required',
        ]);
    }
}
