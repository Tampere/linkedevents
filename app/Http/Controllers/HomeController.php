<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = json_encode([
            "keyword" => url('keyword'),
            "keyword_set" => url('keyword_set'),
            "place" => url('place'),
            "language" => url('language'),
            "organization" => url('organization'),
            "image" => url('image'),
            "event" => url('event'),
            "search" => url('search'),
            "user" => url('user')
        ]);
        return view('api-home', compact('data'));
    }
}
