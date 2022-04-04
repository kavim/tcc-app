<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->longText('body');
            $table->text('featured_image')->nullable();

            $table->boolean('active')->default(0); //ativo = validado pelo admin
            $table->boolean('published')->default(0); //published = publicado
            $table->timestamp('published_at')->nullable(); //ativo = data de publicação, se for ativo, data de publicação não pode ser nula

            $table->unsignedInteger('order')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
