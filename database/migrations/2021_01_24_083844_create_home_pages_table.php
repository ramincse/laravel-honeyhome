<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->longText('sliders') -> nullable();
            $table->longText('home_setup') -> nullable();
            $table->longText('services') -> nullable();
            $table->longText('about_us') -> nullable();
            $table->longText('Projects') -> nullable();
            $table->longText('prices') -> nullable();
            $table->longText('Testimonials') -> nullable();
            $table->longText('Clients') -> nullable();
            $table->longText('Contact_us') -> nullable();
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
        Schema::dropIfExists('home_pages');
    }
}
