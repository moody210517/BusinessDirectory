<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//php artisan make:migration create_users_table
//php artisan migrate --force


//php artisan make:model Post -m -c



class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');            
            $table->string('address');
            $table->string('lat')->nullable();      
            $table->string('lng')->nullable();      
            $table->string('phone');         
            $table->string('email');         
            $table->string('fax')->nullable();
            $table->string('url')->nullable();
            $table->string('img')->nullable();      
            $table->string('video')->nullable();
            $table->string('rate')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('business_id');
            $table->string('category_id'); 
            $table->string('hour_id'); 
            $table->string('ad_img')->nullable(); 
            $table->string('slug'); 
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
        Schema::dropIfExists('directory');
    }
}
