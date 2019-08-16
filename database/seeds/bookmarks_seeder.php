<?php

use Illuminate\Database\Seeder;

class bookmarks_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BookmarkModel::class, 5)->create();
    }
}
