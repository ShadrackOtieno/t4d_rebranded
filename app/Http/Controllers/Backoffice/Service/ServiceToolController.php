<?php

namespace App\Http\Controllers\Backoffice\Service;
use App\Http\Controllers\Controller;

use App\ServiceTool;
use App\Service;
use Illuminate\Http\Request;

class ServiceToolController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($service)
    {
        $service = Service::findOrFail($service);
        return view('backoffice.service.tools.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $service)
    {   
        $request->validate([
            'tool_name' => 'required',
            'description' => 'nullable|min:5',
            'cover_image' => 'nullable',
        ]);

        $cover_image = null;

        if ($request->hasFile('cover_image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $cover_image = $request->cover_image->storeAs('service-tools', $filename);
        }

        ServiceTool::create(array_merge( $request->only([
            'tool_name', 'description']),['service_id' => $service, 'cover_image' => $cover_image]));

        return back()->with('success', 'Service Tool Addition: Success');
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\ServiceTool  $tool
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceTool $tool)
    {
        return view('backoffice.service.tools.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceTool  $tool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceTool $tool)
    {
        $request->validate([
            'tool_name' => 'required',
            'description' => 'nullable|min:5',
        ]);

        $tool->update(array_merge($request->only([
            'tool_name', 'description'])));

        return redirect()->back()->with('success', 'Service Tool Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceTool  $tool
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceTool $tool)
    {
        $tool->delete();

        return back()->with('success', 'Service Tool Deletion: Success');
    }
}
