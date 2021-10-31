<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Company\CompaniesTableSeeder;
use Database\Seeders\Employee\EmployeesTableSeeder;
use Database\Seeders\User\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CompaniesTableSeeder::class]);
        $this->call([EmployeesTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
    }
}
