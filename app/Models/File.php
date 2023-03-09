<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "files";
    protected $primaryKey = "id_file";

    protected $fillable = [
        'name',
        'route',
        'type',
        'id_user',
        'parent',
        'size',
        'created_at',
        'updated_at'
    ];
    protected $dates = ['deleted-at'];

    public function sharedFile(){
        return $this->hasMany('App\Models\sharedFile', 'id_file');
    }

    public function folder(){
        return $this->belongsTo('App\Models\Folder', 'parent');
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
