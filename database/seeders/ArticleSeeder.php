<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = json_decode(file_get_contents(public_path().'/articles.json'));
        foreach($articles as $article){
            Article::create([
                'name'=>$article->name,
                'desc'=>$argv->desc,
                'date'=>$article->date,
                'user_id'=>11,
            ]);
        };
    }
}
