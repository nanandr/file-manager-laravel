<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Models\File;
use App\Models\Folder;
use Carbon\Carbon;
use File as FileStorage;

class FileController extends Controller
{
    public function createInFolder($route, Request $request){
        $this->validate($request, ['file' => 'required']);

        $id = Folder::where('route', $route)->first();

        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file_enc = time() . "_" . $file_name;

        File::create([
            'name' => $file_name,
            'route' => $file_enc,
            'type' => $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
            'id_user' => Auth::user()->id_user,
            'parent' => $id->id_folder,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $file->move('uploads', $file_enc);
        return redirect('folder/'.$route);
    }
    public function create(Request $request){

        $file = $request->file("file");
        $file_name = $file->getClientOriginalName();
        $file_enc = time() . "_" . $file_name;

        File::create([
            'name' => $file_name,
            'route' => $file_enc,
            'type' => $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
            'id_user' => Auth::user()->id_user,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $file->move('uploads', $file_enc);
        return redirect('home');
    }

    public function edit($route, Request $request){
        $file_enc = time() . "_" . $request->name;
        
        $file = File::where('route', $route)->first();
        $file->name = $request->name;
        $file->route = $file_enc;
        $file->save();

        rename(public_path('uploads/'.$route), public_path('uploads/'.$file_enc));
        return redirect()->back();
    }

    public function delete($route){
        $file = File::where('route', $route)->first();
        $file->delete();
        FileStorage::delete('uploads/'.$file->route);
        return redirect()->back();
    }

    public function hide($route){
        $file = File::where('route', $route)->first();
        $file->hide = "true";
        $file->save();
        return redirect()->back();
    }
    public function unhide($route){
        $file = File::where('route', $route)->first();
        $file->hide = "false";
        $file->save();
        return redirect()->back();
    }
}
