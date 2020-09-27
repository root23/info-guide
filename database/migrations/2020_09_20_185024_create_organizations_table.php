<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->integer('user_id')->unsigned();

            $table->string('slug')->unique();
            $table->string('title');

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('organization_categories');

            $table->timestamps();
            $table->softDeletes();
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
