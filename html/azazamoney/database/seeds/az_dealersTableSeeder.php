<?php

use Illuminate\Database\Seeder;

class az_dealersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\az_dealers::class, 10)->create()->each(function ($u) {
        	$u->posts()->save(factory(App\az_accounts::class)->make());
    	});
    }
}
