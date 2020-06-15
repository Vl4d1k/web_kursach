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
                'name' => 'iPhone X 64 Гб',
                'name_en' => 'iPhone X 64 GB',
                'code' => 'iphone_x_64',
                'description' => 'Отличный продвинутый телефон с памятью на 64 gb',
                'description_en' => 'It is revolution, Johny.',
                'price' => '71990',
                'category_id' => 1,
                'image' => 'products/iphone_x_1',
                'slide1' => 'products/iphone_x_2.jpeg',
                'slide2' => 'products/iphone_x_3.jpeg'
            ],
            [
                'name' => 'iPhone 11 Pro 256 Гб',
                'name_en' => 'iPhone 11 Pro 256 GB',
                'code' => 'iphone_x_256',
                'description' => 'Отличный продвинутый телефон с памятью на 256 gb',
                'description_en' => 'It is revolution, Johny.',
                'price' => '119000',
                'category_id' => 1,
                'image' => 'products/iphone_11_pro_1.jpeg',
                'slide1' => 'products/iphone_11_pro_2.jpeg',
                'slide2' => 'products/iphone_11_pro_3.jpeg'
            ],
            [
                'name' => 'iPhone X 256 Гб',
                'name_en' => 'iPhone X 256 GB',
                'code' => 'iphone_x_256',
                'description' => 'Отличный продвинутый телефон с памятью на 256 gb',
                'description_en' => 'It is revolution, Johny.',
                'price' => '89990',
                'category_id' => 1,
                'image' => 'products/iphone_x_1.jpeg',
                'slide1' => 'products/iphone_x_2.jpeg',
                'slide2' => 'products/iphone_x_3.jpeg'
            ],
            [
                'name' => 'iPhone SE 2020',
                'name_en' => 'iPhone SE 2020',
                'code' => 'iphone_5se',
                'description' => 'Отличный классический iPhone',
                'description_en' => 'It is revolution, Johny.',
                'price' => '17221',
                'category_id' => 1,
                'image' => 'products/',
                'slide1' => 'products/',
                'slide2' => 'products/'
            ],
            [
                'name' => 'Камера GoPro',
                'name_en' => 'Action Camera GoPro',
                'code' => 'gopro',
                'description' => 'Снимай самые яркие моменты с помощью этой камеры',
                'description_en' => 'Take the brightest moments with this camera.',
                'price' => '12000',
                'category_id' => 2,
                'image' => 'products/go_pro_1.jpeg',
                'slide1' => 'products/go_pro_2.jpeg',
                'slide2' => 'products/go_pro_3.jpeg'
            ],
            [
                'name' => 'Камера Panasonic HC-V770',
                'name_en' => 'Camera Panasonic HC-V770',
                'code' => 'panasonic_hc-v770',
                'description' => 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!',
                'description_en' => 'For a serious video shoot you need a serious camera. Panasonic HC-V770 is the best choice for these purposes!',
                'price' => '27900',
                'category_id' => 2,
                'image' => 'products/panasonic_1.jpeg',
                'slide1' => 'products/panasonic_2.jpeg',
                'slide2' => 'products/panasonic_3.jpeg'
            ],
            [
                'name' => 'Кофемашина DeLongi',
                'name_en' => 'Coffe Machine DeLongi',
                'code' => 'delongi',
                'description' => 'Хорошее утро начинается с хорошего кофе!',
                'description_en' => 'A good morning starts with good coffee!',
                'price' => '25200',
                'category_id' => 3,
                'image' => 'products/de_longi_1.jpeg',
                'slide1' => 'products/de_longi_2.jpeg',
                'slide2' => 'products/de_longi_2.jpeg'
            ],
            [
                'name' => 'Холодильник Haier',
                'name_en' => 'Refrigerator Haier',
                'code' => 'haier',
                'description' => 'Для большой семьи большой холодильник!',
                'description_en' => 'For a large family a big refrigerator!',
                'price' => '40200',
                'category_id' => 3,
                'image' => 'products/haier_1.jpeg',
                'slide1' => 'products/haier_2.jpeg',
                'slide2' => 'products/haier_1.jpeg'
            ],
            [
                'name' => 'Блендер Moulinex',
                'name_en' => 'Blender Haier',
                'code' => 'moulinex',
                'description' => 'Для самых смелых идей',
                'description_en' => 'For the wildest ideas.',
                'price' => '4200',
                'category_id' => 3,
                'image' => 'products/moulinex_1.jpeg',
                'slide1' => 'products/mou;inex_2.jpeg',
                'slide2' => 'products/moulinex_1.jpeg'
            ],
            [
                'name' => 'Мясорубка Bosch',
                'name_en' => 'Meat Grinder Bosch',
                'code' => 'bosch',
                'description' => 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!',
                'description_en' => 'Do you like homemade meatballs? You should definitely look at this meat grinder!',
                'price' => '9200',
                'category_id' => 3,
                'image' => 'products/bosch_1.jpeg',
                'slide1' => 'products/bosch_2.jpeg',
                'slide2' => 'products/bosch_3.jpeg'
            ],
        ]);
    }
}
