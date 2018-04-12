<?php

namespace database\seeds;

use Illuminate\Database\seeder;
use Illuminate\Support\Facades\DB;

class WebsitesTableSeeder extends \DatabaseSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->delete();

        $websites = array(
            array(
                'id' => 1,
                'type_name' => 'daily',
                'name' => 'Google',
                'user_id' => '1',
                'url' => 'http://www.google.ca',
                'image' => 'images/Websites/default/google.png',
                'alexa' => '0',
            ),
            array(
                'id' => 2,
                'type_name' => 'daily',
                'name' => 'Youtube',
                'user_id' => '1',
                'url' => 'http://www.Youtube.com',
                'image' => 'images/Websites/default/Youtube.png',
                'alexa' => '0',
            ),
        );

        DB::table('websites')->insert($websites);
    }
}
