<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // UNTUK MENGGUNAKAN FACTORY DENGAN LEBIH DARI SATU RECYCLE, GUNAKAN (CONTOH):
            // App\Models\Post::factory(n)->recycle([User::factory(n)->create(), Category::factory(n)->create()])->create();
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()),
            // mengganti author dengan author_id sekalian buat factory
            'author_id' => User::factory(),
            // buat factory untuk category
            'category_id' => Category::factory(),
            // 'category_id' => fake()->randomElement(Category::pluck('id')),
            'body' => fake()->paragraph()
        ];
    }
}
