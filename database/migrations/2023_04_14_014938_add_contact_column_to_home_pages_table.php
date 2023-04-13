<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->text('fb_message_link')->after('contact_no')->nullable();
            $table->text('whatsapp_number')->after('fb_message_link')->nullable();
            $table->text('whatsapp_call_link')->after('whatsapp_number')->nullable();
            $table->text('sms_number')->after('whatsapp_call_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn('fb_message_link');
            $table->dropColumn('whatsapp_number');
            $table->dropColumn('whatsapp_call_link');
            $table->dropColumn('sms_number');
        });
    }
};
