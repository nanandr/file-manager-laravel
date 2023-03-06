<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use HasFactory;
    use SoftDeletes;
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
}
