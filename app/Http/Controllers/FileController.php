<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Models\File;
use App\Models\Folder;
use Carbon\Carbon;

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

    //for edit delete etc, use return back();
}
