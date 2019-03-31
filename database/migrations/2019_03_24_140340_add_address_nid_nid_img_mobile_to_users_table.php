<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressNidNidImgMobileToUsersTable extends Migration
{


    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable()->after('image');
            $table->string('mobile')->nullable()->after('address');
            $table->string('nid')->nullable()->after('mobile');
            $table->string('nid_img')->nullable()->after('nid');
        });
    }



    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable()->after('image');
            $table->string('mobile')->nullable()->after('address');
            $table->string('nid')->nullable()->after('mobile');
            $table->string('nid_img')->nullable()->after('nid');
        });
    }

}
