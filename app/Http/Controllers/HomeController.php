<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

use App\Models\File;
use App\Models\Folder;

class HomeController extends Controller
{
    public function index(){
        $folders = Folder::where('id_user', Auth::user()->id_user)->whereNull('parent')->orderBy('name')->get();
        $files = File::where('id_user', Auth::user()->id_user)->whereNull('parent')->orderBy('name')->get();
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('index', ['folders' => $folders, 'files' => $files, 'recent' => $recent]);
    }

    public function trash(){
        $folders = Folder::onlyTrashed()->where('id_user', Auth::user()->id_user)->where(function ($query) {$query->whereRelation('folder', 'deleted_at', null)->orWhere('parent', null);})->orderBy('name')->get();
        $files = File::onlyTrashed()->where('id_user', Auth::user()->id_user)->where(function ($query) {$query->whereRelation('folder', 'deleted_at', null)->orWhere('parent', null);})->orderBy('name')->get();
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('trash', ['folders' => $folders, 'files' => $files, 'recent' => $recent]);
    }
    
    public function shared(){
        $folders = Folder::where('id_user', Auth::user()->id_user)->whereNull('parent')->orderBy('name')->get();
        $files = File::where('id_user', Auth::user()->id_user)->whereNull('parent')->orderBy('name')->get();
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('shared', ['folders' => $folders, 'files' => $files, 'recent' => $recent]);
    }

    public function inFolder($route){
        $id = Folder::where('route', $route)->first();
        $parent = Folder::where('id_folder', $id->parent)->first();
        if($id->id_user != Auth::user()->id_user){
            return redirect('home');
        }
        else{
            //no where('id_user', Auth::user()->id_user) so the owner could see people uploading in shared files
            $folders = Folder::where('parent', $id->id_folder)->orderBy('name')->get();
            $files = File::where('parent', $id->id_folder)->orderBy('name')->get();
            $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();
    
            return view('index', ['folders' => $folders, 'files' => $files, 'recent' => $recent, 'parent' => $parent, 'current' => $id]);
        }
    }

    public function view($route){
        return response()->file('uploads/'.$id);
    }

}
