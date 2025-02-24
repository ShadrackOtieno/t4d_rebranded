<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PhysicalClass;
use App\VirtualClass;
use App\Course;
use App\Venue;
use App\Category;
use App\Subcategory;
use App\Topic;
use SEO;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @param  \App\Subcategory  $subcategory
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Category $category = null, Subcategory $subcategory = null, Topic $topic = null)
    {
        if ( isset($category) and isset($subcategory) and isset($topic) )

            $title = "$topic->name  - $subcategory->name - $category->name - Course Schedules - ";

        elseif ( isset($category) and isset($subcategory) )

            $title = "$subcategory->name - $category->name - Course Schedules - ";

        elseif ( isset($category) )

            $title = "$category->name - Course Schedules - ";

        else

            $title = 'Course Schedules - ';

        SEO::setTitle( $title );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( $title . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( $title . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( $title . config('app.name') );
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        switch ( $request->query('sort') ) {

            case 'title':
                $result = $this->byTitle($category, $subcategory, $topic);
                break;

            case 'location':
                $result = $this->byVenue($category, $subcategory, $topic);
                break;

            case 'virtual':
                $result = $this->byVirtual($category, $subcategory, $topic);
                break;

            case 'elearning':
                $result = $this->byElearning($category, $subcategory, $topic);
                break;

            default:
                $result = $this->byMonth($category, $subcategory, $topic);
                break;
        }

        return $result;
    }

    /**
     * Display a listing of the resource by month.
     *
     * @param  mixed  $category
     * @param  mixed  $subcategory
     * @param  mixed  $subcategory
     * @param  mixed $topic
     * @return \Illuminate\Http\Response
     */
    private function byMonth($category, $subcategory, $topic)
    {
    	# face to face

        $physical_schedules = PhysicalClass::whereDate(

            'from', '>=', now()

        )->when(

        	$category, $this->filterCategory('course.subcategory.category')

        )->when(

            $subcategory, $this->filterSubcategory('course.subcategory')

        )->when(

            $topic, $this->filterTopic('course.topic')

        )->selectRaw(

        	"physical_classes.id, physical_classes.from, physical_classes.to, physical_classes.booking_end, 'physical' AS type, physical_classes.course_id, physical_classes.city_id, YEAR(physical_classes.from) AS schedule_year"

        )->with(['course', 'currencies'])->limit(1500)->get();

        # virtual

        $virtual_schedules = VirtualClass::whereDate(

            'from', '>=', now()

        )->when(

        	$category, $this->filterCategory('course.subcategory.category')

        )->when(

            $subcategory, $this->filterSubcategory('course.subcategory')

        )->when(

            $topic, $this->filterTopic('course.topic')

        )->selectRaw(

        	"virtual_classes.id, virtual_classes.from, virtual_classes.to, virtual_classes.booking_end, 'virtual' AS type, virtual_classes.course_id, Null AS city_id, YEAR(virtual_classes.from) AS schedule_year"

        )->with(['course', 'currencies'])->limit(1500)->get();

        # concatenate the schedules

        $schedules = $physical_schedules->concat($virtual_schedules)->sortBy('from');

        return view('front/course/schedule/monthly', compact('schedules', 'category', 'subcategory'));
    }

    /**
     * Display a listing of the resource by location.
     *
     * @param  mixed  $category
     * @param  mixed  $subcategory
     * @param  mixed  $topic
     * @return \Illuminate\Http\Response
     */
    private function byVenue($category, $subcategory, $topic)
    {
        $venues = Venue::when(

        	$category, $this->filterCategory('cities.physicalClasses.course.subcategory.category')

        )->when(

            $subcategory, $this->filterSubcategory('cities.physicalClasses.course.subcategory')

        )->when(

            $topic, $this->filterTopic('cities.physicalClasses.course.topic')

        )->whereHas('cities.physicalClasses', function ($query) {

            $query->whereDate(

                'from', '>=', now()
            );

        })->with(['cities.physicalClasses' => function ($query) use ($category, $subcategory, $topic) {

            return $query->when(

                $category, $this->filterCategory('course.subcategory.category')

            )->when(

                $subcategory, $this->filterSubcategory('course.subcategory')

            )->when(

                $topic, $this->filterTopic('course.topic')
            );

        }])->limit(1500)->get();

        return view('front/course/schedule/venue', compact('venues', 'category'));
    }

    /**
     * Display a listing of the resource by title.
     *
     * @param  mixed  $category
     * @param  mixed  $subcategory
     * @param  mixed  $topic
     * @return \Illuminate\Http\Response
     */
    private function byTitle($category, $subcategory, $topic)
    {
        $courses = Course::when(

        	$category, $this->filterCategory('subcategory.category')

        )->when(

            $subcategory, $this->filterSubcategory('subcategory')

        )->when(

            $topic, $this->filterTopic('topic')

        )->latest()->paginate();

        return view('front/course/schedule/title', compact('courses', 'category'));
    }

    /**
     * Display a listing of the resource by title.
     *
     * @param  mixed  $category
     * @param  mixed  $subcategory
     * @param  mixed  $topic
     * @return \Illuminate\Http\Response
     */
    private function byVirtual($category, $subcategory, $topic)
    {
        $schedules = VirtualClass::whereDate(

            'from', '>=', now()

        )->when(

            $category, $this->filterCategory('course.subcategory.category')

        )->when(

            $subcategory, $this->filterSubcategory('course.subcategory')

        )->when(

            $topic, $this->filterTopic('course.topic')

        )->selectRaw(

            "virtual_classes.*, YEAR(virtual_classes.from) AS schedule_year"

        )->with(['course', 'currencies'])->limit(1500)->get();

        return view('front/course/schedule/virtual', compact('schedules', 'category'));
    }

    /**
     * Display a listing of the resource by title.
     *
     * @param  mixed  $category
     * @param  mixed  $subcategory
     * @param  mixed  $topic
     * @return \Illuminate\Http\Response
     */
    private function byElearning($category, $subcategory, $topic)
    {
        $courses = Course::has('elearningClass')->when(

            $category, $this->filterCategory('subcategory.category')

        )->when(

            $subcategory, $this->filterSubcategory('subcategory')

        )->when(

            $topic, $this->filterTopic('topic')

        )->latest()->paginate();

        return view('front/course/schedule/elearning', compact('courses', 'category'));
    }

    /**
     * Filter by category.
     *
     * @param  string  $relation
     * @return void
     */
    private function filterCategory($relation)
    {
    	return function ($query, $category) use ($relation) {

    		$query->whereHas($relation, function ($query) use ($category) {

	    		$query->where('id', $category->id);
	    	});
    	};
    }

    /**
     * Filter by subcategory.
     *
     * @param  string  $relation
     * @return void
     */
    private function filterSubcategory($relation)
    {
        return function ($query, $subcategory) use ($relation) {

            $query->whereHas($relation, function ($query) use ($subcategory) {

                $query->where('id', $subcategory->id);
            });
        };
    }

    /**
     * Filter by topic.
     *
     * @param  string  $relation
     * @return void
     */
    private function filterTopic($relation)
    {
        return function ($query, $topic) use ($relation) {

            $query->whereHas($relation, function ($query) use ($topic) {

                $query->where('id', $topic->id);
            });
        };
    }
}
