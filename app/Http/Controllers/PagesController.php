<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index(){

        $title="Welcome to programmingKnowledge!";
//        passing values to template

//        return  view('pages.index', compact('title'));
        return  view('pages.index')->with('title',$title);
    }

    public function about(){
        $title="About";
        return  view('pages.about')->with('title',$title);
    }

    public function services(){
        $data=array(
            'title'=>'Services',
            'description' => 'This is the services page.'
        );
        return  view('pages.services')->with($data);
    }


}
