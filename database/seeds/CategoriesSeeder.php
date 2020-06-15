<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Мобильные телефоны',
                'name_en' => 'Mobiles phones',
                'code' => 'mobiles',
                'description' => 'В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!',
                'image' => 'categories/PftmkcKkHm34n51SEzWPYpuf6KAACpfTFJMrJldj.jpeg',
            ],
            [
                'name' => 'Портативная техника',
                'name_en' => 'Portable technics',
                'code' => 'portable',
                'description' => 'Раздел с портативной техникой.',
                'image' => 'categories/eNRMONQ1HdxzBRqQCPQO9im217Bzcs5nWs5rRPoz.jpeg',
            ],
            [
                'name' => 'Бытовая техника',
                'name_en' => 'Appliances',
                'code' => 'appliances',
                'description' => 'Раздел с бытовой техникой',
                'image' => 'categories/EhBvOJnavmfFVYEBJ1FZnwAEBdr12nvxoqkel57C.jpeg',
            ],
        ]);
    }
}
