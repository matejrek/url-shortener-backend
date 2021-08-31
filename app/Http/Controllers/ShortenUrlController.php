<?php

namespace App\Http\Controllers;

use App\Models\ShortenUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShortenUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $newurl = new ShortenUrl();
        $newurl->requestedurl = $request->requestedurl;
        $newurl->shortstring = substr(md5(uniqid(rand(), true)), 0,7);//random_bytes(7);
        $newurl->save();
        return $newurl->shortstring;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShortenUrl  $shortenUrl
     * @return \Illuminate\Http\Response
     */
    public function show(ShortenUrl $shortenUrl, $linkhash)
    {
        //find url
        $url = ShortenUrl::where('shortstring', $linkhash)->first();
        //return $url->requestedurl;
        //$length = "".$url->requestedurl;
        if($url){
            return redirect()->away($url->requestedurl);
        }
        else{
            return "invalid url";
        }
        //return $url['requestedurl'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShortenUrl  $shortenUrl
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortenUrl $shortenUrl)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShortenUrl  $shortenUrl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShortenUrl $shortenUrl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShortenUrl  $shortenUrl
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortenUrl $shortenUrl)
    {
        //
    }
}
