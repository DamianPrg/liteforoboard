<?php

use Illuminate\Database\Seeder;

class DefaultContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->truncate();

        //
        $cat = $this->createTestCategory();

        $cat->addCategory('Test forum #1', 'This is test forum 1');
        $cat->addCategory('Test forum #2', 'This is also test forum but number 2');

        $cat2 = \App\Category::create([
            'category_id' => -1,
            'title' => 'Test category #2',
            'desc' => '...',
        ]);

        $cat2->addCategory('Test forum #1', 'This is test forum in cat 2');

        $cat->addTopic("Welcome!", "Welcome to LiteForo!", \App\User::find(1));
    }

    /**
     *
     */
    public function createTestCategory()
    {
        $category = \App\Category::create([
            'category_id' => -1,
            'title' => 'Test category',
            'desc' => 'This is test category',
            'announcement_message' => 'This is test category to test...'
        ]);

        return $category;
    }

    /**
     *
     */
}
