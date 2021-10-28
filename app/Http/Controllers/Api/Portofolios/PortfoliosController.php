<?php

namespace App\Http\Controllers\Api\Portofolios;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\Portfolio;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Portfolio::with('images', 'sections')->get();
    }

    public function lang($lang)
    {
        return Portfolio::where('lang', $lang)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
    {
        return Portfolio::where('lang_index', $slug)->where('lang', $request->lang)->with(['images', 'sections' => function ($section) use ($request) {
            $section->where('lang', $request->lang);
        }, 'links'])->first();
    }

    public function next($slug, Request $request)
    {
        if ($slug) {
            $actual = Portfolio::where('lang_index', $slug)->where('lang', $request->lang)->first()->id;

            $next = Portfolio::where('id', '>',  $actual)->where('lang', $request->lang)->first();

            return $next;
        }
    }

    public function prev($slug, Request $request)
    {
        if ($slug) {

            $actual = Portfolio::where('lang_index', $slug)->where('lang', $request->lang)->first()->id;

            $prev = Portfolio::where('id', '<',  $actual)->where('lang', $request->lang)->get()->last();

            return $prev;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
