<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiitUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiit_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fiit_blog_id')->unsigned();
            $table->string('uploads')->unique();
            $table->timestamps();

            $table->foreign('fiit_blog_id')
                ->references('id')
                ->on('fiit_blogs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiit_uploads');
    }
}
