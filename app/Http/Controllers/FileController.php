<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Models\User as UserModel;
use App\Models\File;
use App\Models\Folder;
use App\Models\sharedFile;
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
        $id = File::where('route', $route)->first();

        $file_enc = time() . "_" . $request->name . "." . $id->type;
        
        $file = File::where('route', $route)->first();
        $file->name = $request->name . "." . $id->type;
        $file->route = $file_enc;
        $file->save();

        rename(public_path('uploads/'.$route), public_path('uploads/'.$file_enc));
        return redirect()->back();
    }

    public function trash($route){
        $file = File::where('route', $route)->first();
        $file->delete();
        return redirect()->back();
    }

    public function restore($route){
        $file = File::withTrashed()->where('route', $route);
        $file->restore();
        return redirect()->back();
    }

    public function delete($route){
        $file = File::where('route', $route);
        FileStorage::delete('uploads/'.$route);
        $file->forceDelete();
        return redirect()->back();
    }

    public function share($route, Request $request){
        $this->validate($request, ['access' => 'required']);
        $file = File::where('route', $route)->first();
        $user = UserModel::where('username', $request->username)->first();

        sharedFile::create([
            'id_user' => $user->id_user,
            'id_file' => $file->id_file,
            'access' => $request->access,
        ]);
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
