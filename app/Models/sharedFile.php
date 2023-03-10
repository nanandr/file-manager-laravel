<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sharedFile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'shared_files';
    protected $primaryKey = 'id_shared_file';
    protected $fillable = ['id_user', 'id_file', 'access', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];
    
    public function file(){
        return $this->belongsTo('App\Models\File', 'id_file');
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
