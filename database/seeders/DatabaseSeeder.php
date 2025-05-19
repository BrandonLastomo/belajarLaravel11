<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // memasukkan blueprint ke variabel untuk seeder
        // $admin = User::create([
        //     'name' => 'Brandon',
        //     'username' => 'baron',
        //     'email' => 'baron@gmail.com',
        //     'password' => Hash::make('baronForger'),
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]);
        
        // Membuat blueprint secara manual di seeder
        // User::create([
        //     'name' => 'Brandon',
        //     'username' => 'baron',
        //     'email' => 'baron@gmail.com',
        //     'password' => Hash::make('baronForger'),
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]);

        // Category::create([
        //     'name' => 'Web Programming',
        //     'slug' => 'web-programming'
        // ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama','body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.</p>',
        //     'author_id' => 1,
        //     'category_id' => 1
        // ]);

        // command factory di seeder
        // Post::factory(20)->recycle(
        //     [
        //         $admin,
        //         User::factory(5)->create(),
        //         Category::factory(5)->create()
        //     ]
        // )->create();

        // command factory dengan seeder terpisah
        $this->call([
            UserSeeder::class,
            CategorySeeder::class
        ]);
        Post::factory(20)->recycle([
            User::all(),
            Category::all()
        ])->create();
    }
}
