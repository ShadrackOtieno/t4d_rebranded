<?php

use Illuminate\Support\Facades\Route;
use App\TechStack;
use Illuminate\Http\Request;

Route::get('cat_filter', function(Request $request){
    return view('front.Projects.cat_filter', compact('request'));
});

Route::get('tpc_filter', function(Request $request){
    return view('front.Projects.tpc_filter', compact('request'));
});

Route::get('filter', 'HomeCourseFilterController@show')->name('filter');
Route::get('clear-filter', 'HomeCourseFilterController@clearFilterSession')->name('clearfilter');

Route::get('explore', function(){
    return view('front.Projects.sub_category');
});

Route::get('short_courses', function() {
    $courses = App\Course::whereFeatured(true)->inRandomOrder()->take(20)->get();
    $state = true;
    return view('front.Projects.short_courses', compact('courses', 'state'));
});

Route::get('intake_program', function() {
    return view('front.Projects.intake_program');
});


// This should be taken to the controllers
Route::get('delete-techstack', function(Request $request) {
    TechStack::destroy($request->query('id'));
    $techstacks = TechStack::all();

    return view('backoffice.programs.techstack.tech', compact('techstacks'));
});

Route::get('techstack', function() {
    $techstacks = TechStack::all();

    return view('backoffice.programs.techstack.tech', compact('techstacks'));
});

 //'TechStackController@delete')->name('delete.tech');

/* Was testing htmx */
// Route::get('htmx', function(){
//     return view('htmxTest');
// });

// Route::get('clicked', function(Request $request){
//     return "<p>".$request->course."</p>";
// });


// Route::get('changed', function(Request $request){
//     return "<p>".$request->name."</p>";
// });
/* End of testing htmx */