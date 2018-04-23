<?php

namespace database\seeds;

use Illuminate\Database\seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends \DatabaseSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            array(
                'nickname' => 'test',
                'email' => 'test@test.test',
                'password' => bcrypt('testtest'),
            )
        );
        DB::table('users')->insert($users);
        factory('App\User', 9)->create();
    }
}
