<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index(){

        $title="Welcome to programmingKnowledge";
        return  view('pages.index', compact('title'));
    }
    public function about(){
        return  view('pages.about');
    }
    public function services(){
        return  view('pages.services');
    }


}
