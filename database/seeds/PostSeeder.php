<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\User;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->sentence(3);
            $newPost->content = $faker->text(500);

            $userCount = Count(User::all()->toArray());
            $newPost->user_id = rand(1,$userCount);

            $slug = Str::slug($newPost->title);
            $slugIniziale = $slug;
            
            $postPresente = Post::where('slug',$slug)->first();

            $contatore = 1;

            while($postPresente) {
                $slug = $slugIniziale . '-' . $contatore;
                $postPresente = Post::where('slug',$slug)->first();
                $contatore++;
            }

            $newPost->slug = $slug;


            $newPost->save();
        }
    }
}
