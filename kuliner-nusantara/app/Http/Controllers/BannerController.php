<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Banner::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$banner = new Banner();
		$banner->title = $request->input('title');
		$banner->description = $request->input('description');
		$banner->imagefile = $request->input('imagefile');
		$banner->clickurl = $request->input('clickurl');
		$banner->is_active = $request->input('is_active');
		$banner->save();
		
		$resp = $banner;
		$resp->message = "Success";

		return response()->json($resp, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner, $id)
    {
        return $banner->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner, $id)
    {
		$bnr = $banner->find($id);
		$bnr->title = $request->input('title');
		$bnr->description = $request->input('description');
		$bnr->imagefile = $request->input('imagefile');
		$bnr->clickurl = $request->input('clickurl');
		$bnr->is_active = $request->input('is_active');
		$bnr->save();
		
		$resp = $bnr;
		$resp->message = "Success";

		return response()->json($resp, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner, $id)
    {
        $banner->find($id)->delete();
        return response('Deleted', 204);
    }
}
