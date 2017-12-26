<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public 
    
    function index(){
        $name='index';

        return view('Pages.index')->with('name',$name);
    }
    
    function about(){
        $name='about';
        return view('Pages.about')->with('name',$name);
    }
    
    function ProLanguage(){
        $language=array('p'=>'Paython','L'=>'Laravel','P'=>'PHP');      
        return view('Pages.ProLanguage')->with('language',$language);
    }
}
