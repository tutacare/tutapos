<?php

use Illuminate\Database\Seeder;

class TutaposSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tutapos_settings')->insert([
            'languange' => 'en',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
