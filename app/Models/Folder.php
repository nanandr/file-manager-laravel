<?php

namespace App\Models;

use App\Models\File;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Folder extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;
    protected $table = 'folders';
    protected $primaryKey = 'id_folder';

    protected $fillable = [
        'name',
        'route',
        'type',
        'id_user',
        'parent',
        'created_at',
        'updated_at'
    ];
    protected $dates = ['deleted_at'];

    protected $cascadeDeletes = ['child_folder', 'child_file'];

    public function folder(){
        return $this->belongsTo('App\Models\Folder', 'parent');
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function child_folder(){
        return $this->hasMany(Folder::class, 'parent');
    }
    public function child_file(){
        return $this->hasMany(File::class, 'parent');
    }

    public function sharedFolder(){
        return $this->hasMany('App\Models\sharedFolder', 'id_folder');
    }

}
