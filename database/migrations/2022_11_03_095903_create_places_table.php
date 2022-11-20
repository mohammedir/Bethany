<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->longText('description');
            $table->string('lat');
            $table->string('long');
            $table->text('location');
            $table->tinyInteger('type')->default(1)->comment('1:PLACES | 0:TOURIST-SITE');
            $table->foreignId('added_by')->nullable()->constrained('admins')->nullOnDelete();
            $table->string('QRCode');
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
        Schema::dropIfExists('places');
    }
};
