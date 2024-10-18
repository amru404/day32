<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Ini menggunakan unsigned big integer secara default
            $table->string('judul');
            $table->string('kategori');
            $table->string('tag');
            $table->unsignedInteger('user_id'); 
            $table->text('konten');
    
            $table->foreign('user_id', 'blogs_user_id_foreign')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
    
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
