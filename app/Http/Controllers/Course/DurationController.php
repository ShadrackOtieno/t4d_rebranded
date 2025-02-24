<?php

namespace App\Http\Controllers\Course;

use App\Topic;
use App\Subcategory;
use App\PhysicalClass;
use App\Http\Controllers\Controller;
use Closure;
use SEO;

class DurationController extends Controller
{
    public function categoryWeek($subcategory)
    {
        $subcategory = Subcategory::where('slug', $subcategory)->first();;
        $category = $subcategory->category;
        $topics = Topic::where('subcategory_id', $subcategory->id)->get();

        SEO::setTitle( $subcategory->name.' - 1 Week Courses' );
        $this->page_seo($subcategory);

        $schedules = PhysicalClass::whereDate(
            'from', '>=', now()
        )->when(
            $subcategory, $this->filterSubcategory('course.subcategory')
        )->orderBy('from')->simplePaginate(50);

        return view('front.course.duration.subcategory-weekly', compact('schedules', 'topics', 'category', 'subcategory'));
    }

    public function categoryWeeks($subcategory)
    {
        $subcategory = Subcategory::where('slug', $subcategory)->first();;
        $category = $subcategory->category;
        $topics = Topic::where('subcategory_id', $subcategory->id)->get();

        $this->extracted($subcategory);

        $schedules = PhysicalClass::whereDate(
            'from', '>=', now()
        )->when(
            $subcategory, $this->filterSubcategory('course.subcategory')
        )->orderBy('from')->simplePaginate(50);

        return view('front.course.duration.subcategory-weeks', compact('schedules', 'topics', 'category', 'subcategory'));
    }

    public function duration(Topic $topic, $duration)
    {
        $subcategory = $topic->subcategory;
        $category = $topic->subcategory->category;
        $topics = Topic::where('subcategory_id', $subcategory->id)->get();

        SEO::setTitle( $topic->name.' - 1 Week Courses');
        $this->page_seo($topic);

        $schedules = PhysicalClass::whereDate(
            'from', '>=', now()
        )->when(
            $topic, $this->filterTopic('course.topic')
        )->orderBy('from')->simplePaginate(50);

        return view('front.course.duration.week', compact('schedules', 'topic', 'topics', 'category', 'subcategory', 'duration'));
    }


    public function weeks(Topic $topic, $duration)
    {
        $subcategory = $topic->subcategory;
        $category = $topic->subcategory->category;
        $topics = Topic::where('subcategory_id', $subcategory->id)->get();

        $this->extracted($topic);

        $schedules = PhysicalClass::whereDate(
            'from', '>=', now()
        )->when(
            $topic, $this->filterTopic('course.topic')
        )->orderBy('from')->Paginate(5);

        return view('front.course.duration.weeks', compact('schedules', 'topic', 'topics', 'category', 'subcategory', 'duration'));
    }

    /**
     * Filter by topic.
     *
     * @param  string  $relation
     * @return Closure
     */
    private function filterTopic($relation): Closure
    {
        return function ($query, $topic) use ($relation) {
            $query->whereHas($relation, function ($query) use ($topic) {
                $query->where('id', $topic->id);
            });
        };
    }

    /**
     * Filter by subcategory.
     *
     * @param  string  $relation
     * @return Closure
     */
    private function filterSubcategory($relation): Closure
    {
        return function ($query, $subcategory) use ($relation) {
            $query->whereHas($relation, function ($query) use ($subcategory) {
                $query->where('id', $subcategory->id);
            });
        };
    }

    /**
     * @param $subcategory
     * @return void
     */
    public function extracted($subcategory): void
    {
        SEO::setTitle($subcategory->name . ' - 2 Weeks Courses');
        $this->page_seo($subcategory);
    }

    /**
     * @param $subcategory
     * @return void
     */
    public function page_seo($subcategory): void
    {
        SEO::setDescription($subcategory->description ?? config('app.description'));

        SEO::opengraph()->setTitle("$subcategory->name");
        SEO::opengraph()->setDescription($subcategory->description ?? config('app.description'));
        SEO::opengraph()->setUrl(url()->current());

        SEO::twitter()->setTitle("$subcategory->name");
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle("$subcategory->name");
    }
}
