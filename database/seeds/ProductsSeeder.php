<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'iPhone X 64GB',
                'code' => 'iphone_x_64',
                'description' => 'Отличный продвинутый телефон с памятью на 64 gb',
                'price' => '71990',
                'category_id' => 1,
                'image' => 'products/iphone_x_1',
                'slide1' => 'products/iphone_x_2.jpeg',
                'slide2' => 'products/iphone_x_3.jpeg'
            ],
            [
                'name' => 'iPhone 11 Pro 256GB',
                'code' => 'iphone_x_256',
                'description' => 'Отличный продвинутый телефон с памятью на 256 gb',
                'price' => '119000',
                'category_id' => 1,
                'image' => 'products/iphone_11_pro_1.jpeg',
                'slide1' => 'products/iphone_11_pro_2.jpeg',
                'slide2' => 'products/iphone_11_pro_3.jpeg'
            ],
            [
                'name' => 'iPhone X 256GB',
                'code' => 'iphone_x_256',
                'description' => 'Отличный продвинутый телефон с памятью на 256 gb',
                'price' => '89990',
                'category_id' => 1,
                'image' => 'products/iphone_x_1.jpeg',
                'slide1' => 'products/iphone_x_2.jpeg',
                'slide2' => 'products/iphone_x_3.jpeg'
            ],
            [
                'name' => 'iPhone SE 2020',
                'code' => 'iphone_5se',
                'description' => 'Отличный классический iPhone',
                'price' => '17221',
                'category_id' => 1,
                'image' => 'products/',
                'slide1' => 'products/',
                'slide2' => 'products/'
            ],
            [
                'name' => 'Наушники Beats Audio',
                'code' => 'beats_audio',
                'description' => 'Отличный звук от Dr. Dre',
                'price' => '20221',
                'category_id' => 2,
                'image' => 'products/iphone_se_2020_1.png',
                'slide1' => 'products/iphone_se_2020_2.png',
                'slide2' => 'products/iphone_se_2020_3.jpeg'
            ],
            [
                'name' => 'Камера GoPro',
                'code' => 'gopro',
                'description' => 'Снимай самые яркие моменты с помощью этой камеры',
                'price' => '12000',
                'category_id' => 2,
                'image' => 'products/go_pro_1.jpeg',
                'slide1' => 'products/go_pro_2.jpeg',
                'slide2' => 'products/go_pro_3.jpeg'
            ],
            [
                'name' => 'Камера Panasonic HC-V770',
                'code' => 'panasonic_hc-v770',
                'description' => 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!',
                'price' => '27900',
                'category_id' => 2,
                'image' => 'products/panasonic_1.jpeg',
                'slide1' => 'products/panasonic_2.jpeg',
                'slide2' => 'products/panasonic_3.jpeg'
            ],
            [
                'name' => 'Кофемашина DeLongi',
                'code' => 'delongi',
                'description' => 'Хорошее утро начинается с хорошего кофе!',
                'price' => '25200',
                'category_id' => 3,
                'image' => 'products/de_longi_1.jpeg',
                'slide1' => 'products/de_longi_2.jpeg',
                'slide2' => 'products/de_longi_2.jpeg'
            ],
            [
                'name' => 'Холодильник Haier',
                'code' => 'haier',
                'description' => 'Для большой семьи большой холодильник!',
                'price' => '40200',
                'category_id' => 3,
                'image' => 'products/haier_1.jpeg',
                'slide1' => 'products/haier_2.jpeg',
                'slide2' => 'products/haier_1.jpeg'
            ],
            [
                'name' => 'Блендер Moulinex',
                'code' => 'moulinex',
                'description' => 'Для самых смелых идей',
                'price' => '4200',
                'category_id' => 3,
                'image' => 'products/moulinex_1.jpeg',
                'slide1' => 'products/mou;inex_2.jpeg',
                'slide2' => 'products/moulinex_1.jpeg'
            ],
            [
                'name' => 'Мясорубка Bosch',
                'code' => 'bosch',
                'description' => 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!',
                'price' => '9200',
                'category_id' => 3,
                'image' => 'products/bosch_1.jpeg',
                'slide1' => 'products/bosch_2.jpeg',
                'slide2' => 'products/bosch_3.jpeg'
            ],
        ]);
    }
}
