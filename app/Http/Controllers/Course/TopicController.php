<?php

namespace App\Http\Controllers\Course;

use App\Topic;
use App\PhysicalClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SEO;

class TopicController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        $subcategory = $topic->subcategory;

        $category = $topic->subcategory->category;

        $topics = Topic::where('subcategory_id', $subcategory->id)->get();

        SEO::setTitle( "$topic->name");
        SEO::setDescription( strip_tags($topic->description) ?? config('app.description') );

        SEO::opengraph()->setTitle( "$topic->name");
        SEO::opengraph()->setDescription( strip_tags($topic->description) ?? config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$topic->name");
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$topic->name");
        $courses = $topic->courses()->selectRaw(

            "courses.id, courses.slug, courses.name, courses.cover, courses.created_at, 'course' AS type"
        );

        $course_bundles = $topic->courseBundles()->selectRaw(

            "course_bundles.id, course_bundles.slug, course_bundles.name, course_bundles.cover, course_bundles.created_at, 'bundle' AS type"
        );

        $courses = $courses->unionAll($course_bundles)->oldest()->Paginate(16);

        return view('front/course/category/subcategory/topic/show', compact('category', 'subcategory', 'courses', 'topic', 'topics'));
    }



}
