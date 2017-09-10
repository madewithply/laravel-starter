<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Seed with the core data
        $this->call(CoreDataSeeder::class);

        // Create a new admin user
        factory(User::class, 1)->create();
        $user = User::get()->first();
        $user->email = "admin@demo.com";
        $user->save();
        $user->assignRole('app_admin');

    }
}
