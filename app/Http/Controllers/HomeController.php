<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Page;
use App\Models\Pagesection;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pages = Page::where('active', 1)->get(); 
        // // $pages = $pages->reject(function ($page) use ($id) {
        // //     return $page->id === $id;
        // // });
        // $page = Page::findOrFail($id);
        // $pagesections = Pagesection::where('page_id', $id)->where('status', 1)->get();
        // $pagesections = Pagesection::all();

        $singlepage = Page::where('slug', 'home')->first();
        return view('welcome', compact('user', 'singlepage', 'pages'));
    }


    public function show($slug)
    {
        dd($slug);
        $user = Auth::user();
        $pages = Page::where('active', 1)->get(); 
        if($slug){
            $singlepage = Page::where('slug', $slug)->first();
        }
        else{
            $singlepage = Page::where('slug', 'home')->first();
        }
        
        // $id =  $singlepage->id;
        // $page = Page::findOrFail($id);
        // $pagesections = Pagesection::where('page_id', $page->id)->get();
        // $pagesections = Pagesection::where('page_id', $page->id)->where('status', 1)->get();
        // $pagesections = Pagesection::all();
        return view('welcome', compact('user', 'pages', 'singlepage'));
    }
}
