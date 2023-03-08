<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sharedFolder extends Model
{
    use HasFactory;

    protected $table = 'shared_folders';
    protected $primaryKey = 'id_shared_folder';
    protected $fillable = ['id_user', 'id_folder', 'access', 'created_at', 'updated_at'];
    
    public function folder(){
        return $this->belongsTo('App\Models\Folder', 'id_folder');
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
