<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('designation')->nullable();
            $table->text('s_description')->nullable();
            $table->text('l_description')->nullable();
            $table->string('image')->nullable();
            $table->string('alt')->nullable();
            $table->integer('category_id')->nullable()->default(NULL);
            $table->integer('subcategory_id')->nullable()->default(NULL);
            $table->text('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('sort')->default('0')->nullable();
            $table->integer('status')->default(1);
            $table->integer('h_status')->default(0);
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
        Schema::dropIfExists('boards');
    }
}
