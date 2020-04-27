<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin_data = [
          'name' => 'Admin',
          'email' => 'ankitakumari.ca@gmail.com',
          'password' => Hash::make('123'),
          'user_type' => 1,
          'phone' => 1234567890
      ];

      DB::statement("SET FOREIGN_KEY_CHECKS=0");
      DB::table("users")->truncate();
      DB::statement("SET FOREIGN_KEY_CHECKS=1");

        if(!User::create($admin_data)) {
            dd('failed to insert'); // dump and die
        }

    }
}
