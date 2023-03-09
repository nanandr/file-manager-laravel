<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

use App\Models\File;
use App\Models\Folder;
use App\Models\sharedFile;
use App\Models\sharedFolder;

class HomeController extends Controller
{
    public function index(){
        $folders = Folder::where('id_user', Auth::user()->id_user)->whereNull('parent')->orderBy('name')->get();
        $files = File::where('id_user', Auth::user()->id_user)->whereNull('parent')->orderBy('name')->get();
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('index', ['folders' => $folders, 'files' => $files, 'recent' => $recent]);
    }

    public function trash(){
        // $folders = Folder::folder()->onlyTrashed()->get();
        // $tes = $folders->folder->deleted_at;
        // $files = File::onlyTrashed()->folder->deleted_at;

        // $trashFolders = Folder::onlyTrashed()->where('id_user', Auth::user()->id_user)->where(function ($query) {$query->whereRelation('folder', 'deleted_at', null)->orWhere('parent', null);})->orderBy('name')->get();
        // $trashFiles = File::onlyTrashed()->where('id_user', Auth::user()->id_user)->where(function ($query) {$query->whereRelation('folder', 'deleted_at', null)->orWhere('parent', null);})->orderBy('name')->get();
        DB::statement("SET SQL_MODE=''");
        $trashFolders = Folder::onlyTrashed()->where('id_user', Auth::user()->id_user)->where(function ($query) {$query->whereRelation('folder', 'deleted_at', null)->orWhere('parent', null);})->groupBy('deleted_at')->orderBy('deleted_at', 'desc')->get();
        $trashFiles = File::onlyTrashed()->where('id_user', Auth::user()->id_user)->where(function ($query) {$query->whereRelation('folder', 'deleted_at', null)->orWhere('parent', null);})->groupBy('deleted_at')->orderBy('deleted_at', 'desc')->get();
        
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('trash/index', ['folders' => $trashFolders, 'files' => $trashFiles, 'recent' => $recent]);
    }
    
    public function share(){
        $folders = sharedFolder::where('id_user', Auth::user()->id_user)->get();
        $files = sharedFile::where('id_user', Auth::user()->id_user)->get();
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('share/index', ['folders' => $folders, 'files' => $files, 'recent' => $recent]);
    }

    public function shareInFolder($route){
        $id = Folder::where('route', $route)->first();
        $access = sharedFolder::where('id_user', $id->id_user)->first();
        $parent = Folder::where('id_folder', $id->parent)->first();

        $folders = Folder::where('parent', $id->id_folder)->orderBy('name')->get();
        $files = File::where('parent', $id->id_folder)->orderBy('name')->get();
        
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('share/index', ['folders' => $folders, 'files' => $files, 'recent' => $recent, 'parent' => $parent, 'current' => $id, 'access' => $access]);
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

    public function search(Request $request){
        $folders = Folder::where('id_user', Auth::user()->id_user)->where('name', 'like', '%' . $request->keyword .'%')->whereNull('parent')->orderBy('name')->get();
        $files = File::where('id_user', Auth::user()->id_user)->where('name', 'like', '%' . $request->keyword .'%')->whereNull('parent')->orderBy('name')->get();
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('index', ['folders' => $folders, 'files' => $files, 'recent' => $recent]);
    }

}
