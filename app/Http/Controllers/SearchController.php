<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\File;
use App\Models\Folder;
use App\Models\sharedFile;
use App\Models\sharedFolder;

class SearchController extends Controller
{
    public function index(Request $request){
        $folders = Folder::where('id_user', Auth::user()->id_user)->where('name', 'like', '%' . $request->keyword .'%')->whereNull('parent')->orderBy('name')->get();
        $files = File::where('id_user', Auth::user()->id_user)->where('name', 'like', '%' . $request->keyword .'%')->whereNull('parent')->orderBy('name')->get();
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('index', ['folders' => $folders, 'files' => $files, 'recent' => $recent]);
    }

    public function inFolder($route, Request $request){
        $id = Folder::where('route', $route)->first();
        $parent = Folder::where('id_folder', $id->parent)->first();
        if($id->id_user != Auth::user()->id_user){
            return redirect('home');
        }
        else{
            //no where('id_user', Auth::user()->id_user) so the owner could see people uploading in shared files
            $folders = Folder::where('parent', $id->id_folder)->where('name', 'like', '%' . $request->keyword .'%')->orderBy('name')->get();
            $files = File::where('parent', $id->id_folder)->where('name', 'like', '%' . $request->keyword .'%')->orderBy('name')->get();
            $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();
    
            return view('index', ['folders' => $folders, 'files' => $files, 'recent' => $recent, 'parent' => $parent, 'current' => $id]);
        }
    }

    public function share(Request $request){
        // $folders = Folder::where('name', 'like', '%' . $request->keyword .'%')->get();
        // $files = File::where('name', 'like', '%' . $request->keyword .'%')->get();

        $sharedFolders = sharedFolder::where('id_user', Auth::user()->id_user)->whereHas('folder', function($query) use($request) { $query->where('name', 'like', '%'.$request->keyword.'%'); })->get();
        $sharedFiles = sharedFile::where('id_user', Auth::user()->id_user)->whereHas('file', function($query) use($request) { $query->where('name', 'like', '%'.$request->keyword.'%'); })->get();

        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('share/index', ['folders' => $sharedFolders, 'files' => $sharedFiles, 'recent' => $recent]);
    }

    public function shareInFolder(Request $request, $route){
        $id = Folder::where('route', $route)->first();
        $access = sharedFolder::where('id_folder', $id->id_folder)->where('id_user', Auth::user()->id_user)->first();
        $parent = Folder::where('id_folder', $id->parent)->first();

        if(isset($access)){
            $request->session()->put('access',$access->access);
        }

        $folders = Folder::where('parent', $id->id_folder)->where('name', 'like', '%' . $request->keyword .'%')->orderBy('name')->get();
        $files = File::where('parent', $id->id_folder)->where('name', 'like', '%' . $request->keyword .'%')->orderBy('name')->get();
        
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('share/index', ['folders' => $folders, 'files' => $files, 'recent' => $recent, 'parent' => $parent, 'current' => $id, 'access' => $access, 'request' => $request]);
    }

    public function trash(Request $request){
        $folders = Folder::onlyTrashed()->where('id_user', Auth::user()->id_user)->where('name', 'like', '%' . $request->keyword .'%')->orderBy('name')->get();
        $files = File::onlyTrashed()->where('id_user', Auth::user()->id_user)->where('name', 'like', '%' . $request->keyword .'%')->orderBy('name')->get();
        $recent = File::where('id_user', Auth::user()->id_user)->where('hide','false')->orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('trash/index', ['folders' => $folders, 'files' => $files, 'recent' => $recent]);
    }
}
