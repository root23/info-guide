<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->text('content_html')->nullable();
            $table->text('content_raw');
            $table->string('img')->nullable();
            $table->double('mark_x')->nullable();
            $table->double('mark_y')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();

            $table->foreignId('city_id')
                ->nullable()
                ->constrained()
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
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('content_html');
            $table->dropColumn('content_raw');
            $table->dropColumn('img');
            $table->dropColumn('city_id');
            $table->dropColumn('mark_x');
            $table->dropColumn('mark_y');
            $table->dropColumn('address');
            $table->dropColumn('phone');
        });
    }

}
