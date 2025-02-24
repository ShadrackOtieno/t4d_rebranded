<?php

namespace App\Http\Controllers;

use App\Company;
use App\Segment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use SEO;
use DataTables;

class AboutController extends Controller
{
    /**
     * Display resource.
     *
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        SEO::setTitle("About");
        // SEO::setDescription(config('app.description'));
        SEO::setDescription('We build the capacity of people, processes and systems for organizational success and growth as well as nurturing a thriving ecosystem. ');

        SEO::opengraph()->setTitle('About');
        SEO::opengraph()->setDescription('We build the capacity of people, processes and systems for organizational success and growth as well as nurturing a thriving ecosystem.');
        // SEO::opengraph()->setDescription(config('app.description'));
        SEO::opengraph()->setUrl(url()->current());
 

        SEO::twitter()->setTitle('About - ' . config('app.name'));
        SEO::twitter()->setSite('@indepthresearch');
        SEO::twitter()->setDescription('We build the capacity of people, processes and systems for organizational success and growth as well as nurturing a thriving ecosystem.');
       

        SEO::jsonLd()->setTitle('About');
        SEO::jsonLd()->setDescription('We build the capacity of people, processes and systems for organizational success and growth as well as nurturing a thriving ecosystem.');
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        $sections = DB::table('sections')
            ->orderBy('order')
            ->get();

        $histories = DB::table('histories')
            ->orderBy('year', 'DESC')
            ->get();

        $values = DB::table('core_values')
            ->get();
        return view('front/about', compact('sections', 'histories', 'values'));
    }


    /**
     * Display resource.
     *
     * @return View
     */
    public function clients(): View
    {
        return view('front/clients');
    }

    /**
     * Display resource.
     *
     * @return View
     */
    public function viewClients($slug)
    {
        $segment = Segment::where('slug', $slug)->firstOr(function () {
            return Segment::all();
        });
        if (\request()->ajax()) {
            $data = $segment->companies->where('status', 'Approved');

            return Datatables::of($data)
                ->escapeColumns([])
                ->addIndexColumn()
                ->editColumn('sector', function ($row) {
                    if ($row->name) {
                        return sprintf(
                            '
                                    %s
                                    ',
                            $row->sector->name
                        );
                    }

                    return '';
                })
                ->editColumn('name', function ($row) {
                    if ($row->name) {
                        return sprintf(
                            '
                                    <img href="" src="%s" height="10" width="30" alt="" /> %s
                                    ',
                            asset('storage/' . $row->logo),
                            $row->name
                        );
                    }

                    return '';
                })
                ->make(true);
        }

        return view('front/segment-clients', compact('segment'));
    }

    /**
     * Display resource.
     *
     * @return View
     */
    public function allClients()
    {
        if (\request()->ajax()) {
            $data = Company::where('status', 'Approved')->get();

            return Datatables::of($data)
                ->escapeColumns([])
                ->addIndexColumn()
                ->editColumn('sector', function ($row) {
                    if ($row->name) {
                        return sprintf(
                            '
                                    %s
                                    ',
                            $row->sector->name
                        );
                    }

                    return '';
                })
                ->editColumn('name', function ($row) {
                    if ($row->name) {
                        return sprintf(
                            '
                                    <img href="" src="%s" height="10" width="30" alt="" /> %s
                                    ',
                            asset('storage/' . $row->logo),
                            $row->name
                        );
                    }

                    return '';
                })
                ->make(true);
        }

        return view('front/segment-clients');
    }


    /**
     * Display resource.
     *
     * @return View
     */
    public function terms_conditions(): View
    {
        return view('front/terms-conditions');
    }
    /**
     * Display resource.
     *
     * @return View
     */

    public function privacy_policy(): View
    {
        return view('front/data-privacy-policy');
    }
    public function our_venues(): View
    {
        return view('front/venue/our-venues');
    }
    public function event(): View
    {
        return view('front/ticket');
    }


    // added sitemap
    public function sitemap(): View
    {
        return view('front/sitemap');
    }


}
