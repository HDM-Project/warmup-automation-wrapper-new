<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->dateTime('open_timestamp');
            $table->dateTime('click_timestamp');
        });

        DB::table('event_activity')->insert([
            'id' => 1,
            'email' => 'darvin.krishnan@ematicsolutions.com',
            'open_timestamp' => '2020-07-07 00:00:00',
            'click_timestamp' => '2020-07-07 00:00:00'
        ]);
        DB::table('event_activity')->insert([
            'id' => 2,
            'email' => 'harrish.ganapathy@ematicsolutions.com',
            'open_timestamp' => '2020-07-07 00:00:00',
            'click_timestamp' => '2020-07-07 00:00:00'
        ]);
        DB::table('event_activity')->insert([
            'id' => 3,
            'email' => 'mohan.raaj@ematicsolutions.com',
            'open_timestamp' => '2020-07-07 00:00:00',
            'click_timestamp' => '2020-07-07 00:00:00'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_activities');
    }
}
