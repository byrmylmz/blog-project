<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->default(1)->constrained();
        });

        /**
         * First change the is_admin as role id =2
         * 
         */

        \App\Models\User::where('is_admin',1)->update(['role_id'=>2]);
        
        /**
         * Secondly we need to drop to is_admin column after assign the role id  =2 for admin
         */
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
