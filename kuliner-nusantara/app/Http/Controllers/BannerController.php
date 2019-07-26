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
        $req = json_decode($request->getContent());
		
		$banner = new Banner();
		$banner->title = $req->title;
		$banner->description = $req->description;
		$banner->imageurl = $req->imageurl;
		$banner->clickurl = $req->clickurl;
		$banner->is_active = $req->is_active;
		$banner->save();
		
		$resp = $req;
		$resp->id = $banner->id;
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
        $req = json_decode($request->getContent());
		
		$bnr = $banner->find($id);
		$bnr->title = $req->title;
		$bnr->description = $req->description;
		$bnr->imageurl = $req->imageurl;
		$bnr->clickurl = $req->clickurl;
		$bnr->is_active = $req->is_active;
		$bnr->save();
		
		$resp = $req;
		$resp->id = $id;
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
