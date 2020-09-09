<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $numberOfBooks = 60;
        $languages = [
            'English',
            'Mandarin Chinese',
            'Hindi',
            'Spanish',
            'French',
            'Standard Arabic',
            'Bengali',
            'Russian',
            'Portuguese',
            'Indonesian',
        ];
        $images = [
            'https://images-na.ssl-images-amazon.com/images/I/71pfI0hEvBL._AC_UL200_SR200,200_.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/71JkFqnvPSL._AC_UL200_SR200,200_.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/71wz5VtuCrL._AC_UL200_SR200,200_.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/81VwyjrTfjL._AC_UL200_SR200,200_.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/61kiKAlEalL._AC_UL200_SR200,200_.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/71kA1NW-cAL._AC_UL200_SR200,200_.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/81zBVMvSjNL._AC_UL200_SR200,200_.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/71UOTAiinsL._AC_UL200_SR200,200_.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/91yeltFNrGL._AC_UL200_SR200,200_.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/811opppMPQL._AC_UL200_SR200,200_.jpg',
        ];

        for ($i = 0; $i < $numberOfBooks; $i++) {
            Book::create([
                'title' => $faker->word() . " " . $faker->word(),
                'author' => $faker->name(),
                'image' => $images[random_int(0, count($images) - 1)],
                'description' => $faker->paragraph(),
                'language' => $languages[random_int(0, count($languages) - 1)],
                'publisher' => $faker->company(),
                'published' => now()
            ]);
        };
    }
}
