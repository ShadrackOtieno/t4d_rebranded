<?php

namespace App\Http\Controllers\backoffice\Programs;

use App\Http\Controllers\Controller;
use App\TechStack;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Backoffice\Programs\TechStackRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TechStackController extends Controller
{
    //

    public function index(): View {
        return view('backoffice/programs/techstack/index');
    }

    public function store(TechStackRequest $request) {

        // try{
        //     DB::beginTransaction();

            TechStack::create([
                'name' => $request->title,
                'logo' => $this->storeFile($request)
            ]);

        //     DB::commit();
        // }catch(\Exception $e){
        //     DB::rollBack();

        //     return back()->with('error', 'Something went wrong uploading the tech stack');
        // }
        
        return view('backoffice/programs/techstack/index');
    }

    public function delete(Request $request) {

        $data = $request->query('id');

        return "<p>".$data."</p>";
    }

    public function storeFile($request, $techstack = null): string
    {
        $filename = null;
        
        if($techstack != null && File::exists(public_path('images/program/techstack/'.$techstack->logo))){
            File::delete(public_path('images/program/techstack/'.$techstack->logo));
        }

        $randomize = rand(11111111, 99999999);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $randomize . "_" . time() . "." . $extension;
        $request->file('image')->move(public_path('images/program/techstack/'), $filename);

        return $filename;
    }
}
