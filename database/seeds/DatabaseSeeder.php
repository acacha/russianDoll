<?php

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
        // $this->call(UsersTableSeeder::class);

        factory(App\Card::class, 50)->create()->each(function ($u) {
            $u->notes()->save(factory(App\Note::class)->make());
            $u->notes()->save(factory(App\Note::class)->make());
            $u->notes()->save(factory(App\Note::class)->make());
        });
    }
}
