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
        Schema::create('service_provides', function (Blueprint $table) {
            $table->id('nId');
            $table->string('sName');
            $table->string('sEmail');
            $table->bigInteger('nPhoneNumber');
            $table->longtext('sAddress');
            $table->string('scity');
            $table->integer('nPincode');
            $table->string('sSmPic');
            $table->string('sLgPic');
            $table->enum('bStatus', [1, 0])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provides');
    }
};
