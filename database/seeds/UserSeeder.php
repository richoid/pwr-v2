<?php

use Illuminate\Database\Seeder;
use App\Profile;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create()->each(function($u) {
            $u->profiles()->save(factory(Profile::class)->make());
          });
    }
}
