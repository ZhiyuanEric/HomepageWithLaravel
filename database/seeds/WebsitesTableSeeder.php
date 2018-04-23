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
                'type_id' => '1',
                'name' => 'Google',
                'user_id' => '1',
                'url' => 'http://www.google.ca',
                'image' => 'images/Websites/default/google.png',
                'alexa' => '0',
            ),
            array(
                'type_id' => '1',
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
