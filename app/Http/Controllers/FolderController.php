<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Models\User as UserModel;
use App\Models\Folder;
use App\Models\File;
use App\Models\sharedFolder;
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
        return redirect()->back();
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
        $sharedFolder = sharedFolder::where('id_folder', $folder->id_folder);
        if($sharedFolder->count() > 0){
            $sharedFolder->delete();
        }
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
        
        $sharedFolder = sharedFolder::withTrashed()->where('id_folder', $getFolder->id_folder);
        if($sharedFolder->count() > 0){
            $sharedFolder->restore();
        }

        File::withTrashed()->where('deleted_at', $getFolder->deleted_at)->restore();
        Folder::withTrashed()->where('deleted_at', $getFolder->deleted_at)->restore();
        return redirect()->back();
    }

    public function share($route, Request $request){
        $this->validate($request, ['access' => 'required']);
        $folder = Folder::where('route', $route)->first();
        $user = UserModel::where('username', $request->username)->orWhere('email', $request->username)->first();
        if(sharedFolder::where('id_user', $user->id_user)->where('id_folder', $folder->id_folder)->count() == 0){
            sharedFolder::create([
                'id_user' => $user->id_user,
                'id_folder' => $folder->id_folder,
                'access' => $request->access,
            ]);
        }
        return redirect()->back();
    }
}
