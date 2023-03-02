<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id_file');
            $table->unsignedInteger('id_user')->nullable();
            $table->string('name');
            $table->string('route');
            $table->string('type');
            $table->integer('size')->nullable();
            $table->unsignedInteger('parent')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("id_user")->references("id_user")->on("users")
            ->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("parent")->references("id_folder")->on("folders")
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
        Schema::dropIfExists('files');
    }
}
