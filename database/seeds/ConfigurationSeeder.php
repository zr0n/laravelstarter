<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('configurations')->insert([
            'home_text' => "Seja bem vindo",
            'telephone' => "99999999",
            'cellphone' => "999999999"
        ]);
    }
}
