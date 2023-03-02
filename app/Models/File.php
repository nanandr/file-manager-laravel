<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = "files";
    protected $primaryKey = "id_file";

    protected $fillable = [
        'id_user',
        'name',
        'route',
        'type',
        'parent',
        'size',
        'created_at',
        'updated_at'
    ];
}
