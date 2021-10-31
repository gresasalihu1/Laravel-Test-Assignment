<?php

namespace Database\Seeders\Company;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
            'id'=>'1',
            'email' => 'abc@gmail.com',
            'logo' =>'logo',
            'website' => 'www.abc.com',
        ],[
            'id'=>'2',
            'email' => 'abcd@gmail.com',
            'logo' =>'logo',
            'website' => 'www.abcd.com',
        ]
        ]);
        
    }
}
