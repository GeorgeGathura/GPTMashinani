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
        Schema::create('sms_logs', function (Blueprint $table) {
            $table->id();
            $table->string('phoneNumber',30);
            $table->string('source',20); //user or system
            $table->string('messageId',100)->nullable();
            //carrier statuses
            $table->string('initialStatus',100);
            $table->string('deliveryStatus',100)->nullable();
            //system status
            $table->tinyInteger('systemStatus');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_logs');
    }
};
