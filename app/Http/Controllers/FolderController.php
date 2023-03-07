<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Models\Folder;
use App\Models\File;
use Carbon\Carbon;
use File as FileStorage;

class FolderController extends Controller
{
    public function createInFolder($route, Request $request){
        $id = Folder::where('route', $route)->first();
        Folder::create([
            'name' => $request->name,
            'route' => str_replace ('/', '', Hash::make($request->name)),
            'id_user' => Auth::user()->id_user,
            'parent' => $id->id_folder,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('folder/'.$route);
    }
    public function create(Request $request){
        Folder::create([
            'name' => $request->name,
            'route' => str_replace ('/', '', Hash::make($request->name)),
            'id_user' => Auth::user()->id_user,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('home');
    }

    public function edit($route, Request $request){
        $folder = Folder::where('route', $route)->first();
        $folder->name = $request->name;
        $folder->save();
        return redirect()->back();
    }

    public function trash($route){
        $folder = Folder::withTrashed()->where('route', $route)->first();
        File::withTrashed()->where('parent', $folder->id_folder)->delete();
        $folder->delete();
        return redirect()->back();
    }

    public function delete($route){
        $folder = Folder::withTrashed()->where('route', $route)->first();
        $file = File::withTrashed()->where('parent', $folder->id_folder)->get();
        foreach ($file as $r) {
            FileStorage::delete('uploads/'.$r->route);
            File::withTrashed()->where('parent', $folder->id_folder)->first()->forceDelete();
        }
        $folder->forceDelete();
        return redirect()->back();
    }

    public function restore($route){
        $getFolder = Folder::withTrashed()->where('route', $route)->first();

        File::withTrashed()->where('deleted_at', $getFolder->deleted_at)->restore();
        Folder::withTrashed()->where('deleted_at', $getFolder->deleted_at)->restore();
        return redirect()->back();
    }
}
