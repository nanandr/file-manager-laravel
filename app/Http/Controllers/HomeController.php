<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Models\File;
use App\Models\Folder;

class HomeController extends Controller
{
    public function index(){
        $folders = Folder::where('id_user', Auth::user()->id_user)->whereNull('parent')->orderBy('name')->get();
        $files = File::where('id_user', Auth::user()->id_user)->whereNull('parent')->orderBy('name')->get();
        $recent = File::orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('index', ['folders' => $folders, 'files' => $files, 'recent' => $recent]);
    }

    public function inFolder($route){
        $id = Folder::where('route', $route)->first();
        $parent = Folder::where('id_folder', $id->parent)->first();
        if($id->id_user != Auth::user()->id_user){
            return redirect('home');
        }
        else{
            $folders = Folder::where('id_user', Auth::user()->id_user)->where('parent', $id->id_folder)->orderBy('name')->get();
            $files = File::where('id_user', Auth::user()->id_user)->where('parent', $id->id_folder)->orderBy('name')->get();
            $recent = File::orderBy('updated_at', 'DESC')->limit(10)->get();
    
            return view('index', ['folders' => $folders, 'files' => $files, 'recent' => $recent, 'parent' => $parent, 'current' => $id]);
        }
    }

    public function viewFile($id){
        return response()->file('uploads/'.$id);
    }
}
