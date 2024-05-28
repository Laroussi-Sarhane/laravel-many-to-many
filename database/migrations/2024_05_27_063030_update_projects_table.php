<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_project_id')->nullable()->after('id');

            $table->foreign('parent_project_id')
                          ->references('id')
                          ->on('projects')
                          ->onDelete('cascade');





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropForeign(['parent_project_id']);


            $table-> dropColumn('parent_project_id');





        });
    }
};
