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
        Schema::table('service_provides', function (Blueprint $table) {
            $table->unsignedBigInteger('nServiceId'); // Foreign key column
            $table->foreign('nServiceId')->references('nId')->on('add_services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_provides', function (Blueprint $table) {
            $table->dropForeign(['nServiceId']); // Drop the foreign key constraint
            $table->dropColumn('nServiceId'); // Drop the foreign key column
        });
    }
};
