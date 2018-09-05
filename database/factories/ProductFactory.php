<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'author_id' => function () {
            return factory(App\Author::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\Category::class)->create([
                'number_of' => 1
            ])->id;
        }
    ];
});
