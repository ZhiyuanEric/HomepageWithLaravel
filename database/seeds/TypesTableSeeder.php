<?php

namespace database\seeds;

use Illuminate\Database\seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends \DatabaseSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();

        $types = array(
            array(
                'id' => 1,
                'type_name' => 'daily',
                'user_id' => '1',
            ),
        );

        DB::table('types')->insert($types);
    }
}
