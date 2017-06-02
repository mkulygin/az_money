<?php

use Illuminate\Database\Seeder;

class az_accountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\az_accounts::class, 50)->create();
    }
}
