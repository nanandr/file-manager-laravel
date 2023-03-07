<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSharedFolders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_folders', function (Blueprint $table) {
            $table->increments('id_shared_folder');
            $table->unsignedInteger('id_user')->nullable();
            $table->unsignedInteger('id_folder')->nullable();
            $table->string('access');
            $table->timestamps();

            $table->foreign("id_user")->references("id_user")->on("users")
            ->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("id_folder")->references("id_folder")->on("folders")
            ->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_shared_folders');
    }
}
