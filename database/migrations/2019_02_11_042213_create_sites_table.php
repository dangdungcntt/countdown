<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('name');
            $table->text('data');
            $table->boolean('is_draft')->default(true);
            $table->unsignedInteger('template_id');
            $table->unsignedInteger('author');
            $table->timestamps();

            $table->foreign('author')
                ->references('id')
                ->on('users');

            $table->foreign('template_id')
                ->references('id')
                ->on('templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
