<?php

namespace Database\Seeders\Employee;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
            'id'=>'1',
            'email' => 'abcdef@gmail.com',
            'first_name' =>'Gresa',
            'last_name' => 'Salihu',
            'phone'=>'044123455',
            'company_id'=>'1'
            ],
            [
                'id'=>'2',
                'email' => 'ghij@gmail.com',
                'first_name' =>'Era',
                'last_name' => 'Salihu',
                'phone'=>'044123455',
                'company_id'=>'2'
            ]
        ]);
        
    }
}
