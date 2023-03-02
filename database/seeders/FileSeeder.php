<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\File;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::create([
            'id_user' => 1,
            'name' => 'Tugas Android Kelas XI.pdf',
            'route' => Hash::make('Tugas Android Kelas XI.pdf'),
            'type' => 'PDF Document',
            'size' => 11233,
            'parent' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
