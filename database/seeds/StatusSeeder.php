<?php

use Illuminate\Database\Seeder;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name'=> 'active'],
            ['name'=> 'cancel'],
            ['name'=> 'deny']
        ];

        DB::table('statuses')->insert($statuses);

    }
}
