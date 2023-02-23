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
        'name',
        'route',
        'type',
        'parent',
        'created_at',
        'updated_at'
    ];
}
