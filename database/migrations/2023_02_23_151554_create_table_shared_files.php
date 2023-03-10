<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSharedFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_files', function (Blueprint $table) {
            $table->increments('id_shared_file');
            $table->unsignedInteger('id_user')->nullable();
            $table->unsignedInteger('id_file')->nullable();
            $table->string('access');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("id_user")->references("id_user")->on("users")
            ->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("id_file")->references("id_file")->on("files")
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
        Schema::dropIfExists('table_shared_files');
    }
}
