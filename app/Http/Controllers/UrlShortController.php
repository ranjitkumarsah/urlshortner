<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\UrlShort;
use Illuminate\Support\Str;
class UrlShortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $urlShort = UrlShort::select('id','url','url_id')->get();
        return view('urlshort',compact('urlShort'))->with('sno',1);
    
    }

    public function store(Request $request)
    {
        $appUrl = url('/');

        $request->validate([
            'url' => 'required|url',
        ]);
        $url_id = Str::random(9);

        $storeUrl = array(
            'url' => $request->url,
            'url_id' => $url_id,
        );
        
        UrlShort::create($storeUrl);

        return redirect('urlshort')->with('success','Link Shorten Successfully.');
    }

    public function linkShort($code) {

        // dd($code);
        $redirectUrl = UrlShort::select('url')->where('url_id',$code)->first();
        if($redirectUrl) {
            return redirect($redirectUrl->url);
        } else {
            return view('404');
        }
    }
}
