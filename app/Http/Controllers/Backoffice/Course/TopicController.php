<?php

namespace App\Http\Controllers\Backoffice\Course;

use App\Http\Controllers\Controller;
use App\Topic;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Course\Topic\StoreRequest;
use App\Http\Requests\Backoffice\Course\Topic\UpdateRequest;
use App\Http\Controllers\Backoffice\Course\Export\TopicExcelExport;
use Storage;
use Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Subcategory $subcategory)
    {
        $topics = $subcategory->topics()->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"

                )->orWhere(

                    'name', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/category/subcategory/topic/index', compact('subcategory', 'topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\Topic\StoreRequest  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Subcategory $subcategory)
    {
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('course/topic/cover') : null;

        $subcategory->topics()->create( array_merge($request->except('cover'), compact('cover'), ['slug' => Str::slug($request->slug ?? $request->name, '-')]) );

        return back()->with('success', 'Topic has been added');
    }

    /**
     * Show the topic courses.
     *
     * @param  \App\Subcategory  $subcategory
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory, Topic $topic)
    {
        $courses = $topic->courses;

        return view('backoffice/course/category/subcategory/topic/show', compact('courses', 'topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory, Topic $topic)
    {
        return view('backoffice/course/category/subcategory/topic/edit', compact('subcategory', 'topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\Topic\UpdateRequest  $request
     * @param  \App\Subcategory  $subcategory
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Subcategory $subcategory, Topic $topic)
    {
        if ( $request->hasFile('cover') ) {

            $cover = $request->file('cover')->store('course/topic/cover');

            empty($topic->cover) ?: Storage::delete($topic->cover);
        }
        else
            $cover = $topic->cover;

        $subcategory->topics()->whereId($topic->id)->update( array_merge($request->only([

            'name', 'description',

        ]), compact('cover'), ['slug' => Str::slug($request->slug ?? $request->name, '-')]) );

        return back()->with('success', 'Topic has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory, Topic $topic)
    {
        $topic->delete();

        return back()->with('success', 'Topic has been deleted');
    }

    /**
     * Export to excel.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function export(Subcategory $subcategory)
    {
        return (new TopicExcelExport($subcategory) )->download("$subcategory->name course topics.xlsx");
    }
}
