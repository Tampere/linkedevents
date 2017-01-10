<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return [
            "keyword" => url('keyword'),
            //"keyword_set" => url('keyword_set'),
            "place" => url('place'),
            //"language" => url('language'),
            //"organization" => url('organization'),
            //"image" => url('image'),
            "event" => url('event'),
            //"search" => url('search'),
            //"user" => url('user')
        ];
    }
}
