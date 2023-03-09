<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Folder;
use App\Models\sharedFile;
use App\Models\sharedFolder;

class ShareController extends Controller
{
    public function editFileAccess($route, $id_user, $access){
        $file = File::where('route', $route)->first();
        $sharedFile = sharedFile::where('id_file',$file->id_file)->where('id_user',$id_user)->first();
        $sharedFile->access = $access;
        $sharedFile->save();
        return redirect()->back();
    }
    public function deleteFileAccess($route, $id_user){
        $file = File::where('route', $route)->first();
        sharedFile::where('id_file',$file->id_file)->where('id_user',$id_user)->delete();
        return redirect()->back();
    }

    public function editFolderAccess($route, $id_user, $access){
        $folder = Folder::where('route', $route)->first();
        $sharedFolder = sharedFolder::where('id_folder',$folder->id_folder)->where('id_user',$id_user)->first();
        $sharedFolder->access = $access;
        $sharedFolder->save();
        return redirect()->back();
    }
    public function deleteFolderAccess($route, $id_user){
        $folder = Folder::where('route', $route)->first();
        sharedFolder::where('id_folder',$folder->id_folder)->where('id_user',$id_user)->delete();
        return redirect()->back();
    }
}
