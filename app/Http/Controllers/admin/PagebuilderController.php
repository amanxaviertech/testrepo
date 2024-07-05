<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PagebuilderController extends Controller
{
    public function index() {
        $user = Auth::user();
        $pages = Page::all();
        return view('admin.pageBuilder.index', compact('user', 'pages'));
    }

    public function create() {
        return view('admin.pageBuilder.create');
    }

    public function showEditor($id)
    {
        $page = Page::findOrFail($id); // Assuming you have a 'pages' table

        return view('admin.pageBuilder.create', compact('page'));
    }


    public function savePage(Request $request)
    {
        $rules = [
            'html' => 'required|string',
            'css' => 'required|string',
            'title' => 'required|string|max:255',
            'pcontent' => 'required|string',
            'slug' => [
                'required',
                'string',
                'unique:pages,slug',
                'max:255',
                'regex:/^[a-zA-Z0-9_-]+$/'
            ],
            'status' => 'required|boolean',
            'imageData' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $messages = [
            'slug.regex' => 'The slug must not contain spaces and can only include alphanumeric characters, hyphens, and underscores.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $htmlContent = $request->input('html');
        $cssContent = $request->input('css');
        $title = $request->input('title');
        $content = $request->input('pcontent');
        $slug = $request->input('slug');
        $status = $request->input('status');
    
        // Save the image
        // Update the image if imageData is provided
        if ($request->hasFile('imageData')) {
            $imgpath = $request->file('imageData')->store('images/pages','public');
        }
        // Save the page content to the database
        $page = new Page();
        $page->title = $title;
        $page->slug = $slug;
        $page->content = $content;
        $page->active = $status;
        $page->htmlContent = $htmlContent;
        $page->cssContent = $cssContent;
        $page->screenshot = $imgpath ?? null; // Store image URL in database
        $page->save();
    
        return response()->json(['message' => 'Page Created successfully!']);
    }
    

    public function updatePage(Request $request, $id)
    {
        $htmlContent = $request->input('html');
        $cssContent = $request->input('css');
        $imageData = $request->input('imageData'); // Assuming you're sending image data as base64 encoded string
    
        try {
            $page = Page::findOrFail($id);
            $page->htmlContent = $htmlContent;
            $page->cssContent = $cssContent;
            
            // Update the image if imageData is provided
            if ($request->hasFile('imageData')) {
                $imgpath = $request->file('imageData')->store('images/pages','public');
                $page->screenshot = $imgpath; // Example field to save image path
            }
    
            $page->save();
    
            return response()->json(['message' => 'Page Updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
    


    public function load()
    {
        // Load the page content from the database
        $page = Page::find(1); // Assuming a single-page setup

        return response()->json(['content' => $page ? $page->content : '']);
    }


    public function previewEditorpage($id)
    {
        // Assuming 'editorpage' is the slug you are querying for
         $page = Page::findOrFail($id);

        // Check if the page was found
        if ($page) {
            return view('admin.pageBuilder.preview', compact('page'));
        } else {
            abort(404); // Or handle not found case appropriately
        }
    }
}
