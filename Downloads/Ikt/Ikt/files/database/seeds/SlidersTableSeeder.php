<?php

use App\Slider;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'name' => 'Кыргызский национальный университет',
            'url' => 'https://www.knu.kg/ky/',
            'image' => 'sliders/bg-knu1.jpg',
            'body' => '<p>имени Жусупа Баласагына</p>',
        ]);

        Slider::create([
            'name' => 'АБИТУРИЕНТ - 2020',
            'url' => 'https://docs.google.com/forms/d/e/1FAIpQLSe1PMmeRY5EWESOJZGpQjfozVCn6XCrk9Lg9p0wvVoakqclbQ/viewform',
            'image' => 'sliders/bg-knu2.jpg',
            'body' => '<p>Добро пожаловать в Кыргызский национальный университет имени Жусупа Баласагына</p>',
        ]);

        Slider::create([
            'name' => 'Мы предлагаем 4 профессиональных кафедры',
            'url' => 'https://www.knu.kg/ky/',
            'image' => 'sliders/old2.jpg',
            'body' => '<p>имени Жусупа Баласагына</p>',
        ]);
    }
}
