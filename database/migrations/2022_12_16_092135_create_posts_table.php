<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->bigInteger('user_id')->comment('つぶやいたユーザーのID');
            $table->string('body', 255)->comment('つぶやき本文');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0)->comment('論理削除フラグ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
