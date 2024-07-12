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
        Log::info('Entered show method with slug: ' . $slug);

        try {
            $page = Page::where('slug', $slug)->firstOrFail();
            Log::info('Page found: ' . json_encode($page));

            return view('welcome', compact('user', 'pages', 'singlepage'));
        } catch (\Exception $e) {
            Log::error('Error in show method: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->view('errors.500', [], 500);
        }
    }

    // public function show($slug)
    // {
    //     dd($slug);
    //     $user = Auth::user();
    //     $pages = Page::where('active', 1)->get(); 
    //     if($slug){
    //         $singlepage = Page::where('slug', $slug)->first();
    //     }
    //     else{
    //         $singlepage = Page::where('slug', 'home')->first();
    //     }
        
    //     // $id =  $singlepage->id;
    //     // $page = Page::findOrFail($id);
    //     // $pagesections = Pagesection::where('page_id', $page->id)->get();
    //     // $pagesections = Pagesection::where('page_id', $page->id)->where('status', 1)->get();
    //     // $pagesections = Pagesection::all();
    //     return view('welcome', compact('user', 'pages', 'singlepage'));
    // }
}
