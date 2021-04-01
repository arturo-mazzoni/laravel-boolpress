<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {

            $newTag = new Tag();
            $newTag->name = $faker->words(3, true);
            //genero lo slug
            $slug = Str::slug($newTag->name);
            $slugBase = $slug;
            //verifico che lo slug non esista nel database
            $tagPresente = Tag::where('slug', $slug)->first();
            $contatore = 1;
            //entro nel ciclo while se trovo un post con lo stesso slug
            while ($tagPresente) {
                //genero un nuovo slug aggiungendo il contatore alla fine
                $slug = $slugBase . '-' . $contatore;
                $contatore++;
                $tagPresente = Tag::where('slug', $slug)->first();
            }
            //quando esco dal while sono sicuro che lo slug non esiste nel db
            //assegno lo slug al post
            $newTag->slug = $slug;
            $newTag->save();
        }
    }
}
