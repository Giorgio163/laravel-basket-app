<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('model_has_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permission_id');
            $table->morphs('model'); // for polymorphic relation
            $table->timestamps();

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_has_permissions');
    }
};
