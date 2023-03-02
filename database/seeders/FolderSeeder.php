<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Folder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Folder::create([
            'id_user' => 1,
            'name' => 'Tugas Kelas XI',
            'route' => Hash::make('Tugas Kelas XI'),
            'size' => 3102912,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
