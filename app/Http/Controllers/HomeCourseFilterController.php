<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeCourseFilterController extends Controller
{
    public function show(Request $request){

        // Check if the form is empty first
        if($this->isFormEmpty($request)){
            $sql = $this->queryFilter($request);

            $total = DB::table('courses')->whereRaw($sql)->count();
            $pos = null;

            $courses = DB::table('courses')
                            ->whereRaw($sql)
                            ->take(20)
                            ->get();

            if($total > 20) {
                session([
                    'query' => $sql, 
                    'skip' => 20, 
                    'total' => DB::table('courses')->whereRaw($sql)->count(),
                ]);

                $pos = +1;
            }

            return view('front.Projects.short_courses', compact('courses','pos'));
        }
        //check if the Query result are worth displaying the navigation buttons
        elseif(session('total') > 20){
            $skip = session('skip') + 20 * (int)$request->input('direction');
            
            session()->put(['skip' => $skip]);

            if((session('total') - $skip) > 0){
                if(session('skip') <= 20 ) $pos = +1;
                else $pos = 0;
            }else{
                $pos = -1;
            }

            $courses = DB::table('courses')
                            ->whereRaw(session()->get('query'))
                            ->skip(session()->get('skip') - 20)
                            ->take(20)
                            ->get();

            return view('front.Projects.short_courses', compact('courses', 'pos'));
        }
        else{
            return "<p>Nothing was filtered</p>";
        }
    }

    private function isFormEmpty(Request $request) {
        return (!empty($request->category) || !empty($request->sub_category) || !empty($request->topic));
    }

    private function queryFilter(Request $request) {
        
        $sql = ' 1 = 1 ';

        if (!empty($request->category)) {
            $sql .= ' AND category_id = '.$request->category;
        }

        if (!empty($request->sub_category)) {
            $sql .= ' AND subcategory_id = '.$request->sub_category;
        }
        
        if (!empty($request->topic)) {
            $sql .= ' AND topic_id = '.$request->topic;
        }

        return $sql;
    }

    public function clearFilterSession() {
        session()->forget([
            'query',
            'skip',
            'total',
        ]);

        return "<p>filter cache cleared</p>";
    }
}
