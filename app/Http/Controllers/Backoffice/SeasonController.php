<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Season;
use Illuminate\Http\Request;
use DB;

class SeasonController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $season = Season::first();

        return view('backoffice/settings/season', compact('season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('seasons')->{ Season::exists() ? 'update' : 'insert' }([

            'percentage' => $request->percentage ?? 0,
            'months' => $request->filled('months') ? implode(' | ', $request->months) : null
        ]);

        return back()->with('success', 'Low seasons have been updated');
    }
}
