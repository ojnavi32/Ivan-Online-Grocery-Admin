<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parents = [
            'fresh', 
            'frozen', 
            'cooking',
            'canned-goods',
            'dairy-&-eggs',
            'beverages',
            'snacks'
        ];

        foreach ($parents as $item) {
            $categories[] = [
                'name' => ucfirst(str_replace('-', ' ', $item)),
                'slug' => $item
            ];
        }

        Category::insert($categories);
    }
}
