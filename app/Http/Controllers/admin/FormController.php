<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Page;
use App\Models\Pagesection;

class FormController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pages = Page::all();
        $pagesections = Pagesection::all();
        return view('admin.forms.index', compact('user', 'pages', 'pagesections'));
    }

}
