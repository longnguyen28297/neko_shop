<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_account')->insert([
            'name' => 'le thanh',
            'email' => 'nnl123456'.'@gmail.com',
            'phone_num'=>'0987',
            'images'=>'logo.png',
            'password' => bcrypt('12345'),
        ]);
    }
}
