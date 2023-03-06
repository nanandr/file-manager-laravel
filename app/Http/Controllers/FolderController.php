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
        $file = Folder::where('route', $route)->first();
        $file->name = $request->name;
        $file->save();
        return redirect()->back();
    }

    public function trash($route){
        return redirect()->back();
    }


    public function resore($route){
        return redirect()->back();
    }

    public function delete($route){
        return redirect()->back();
    }
}
