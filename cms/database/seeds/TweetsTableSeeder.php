<?php

use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $tweet_contents = [
        'ビートたけしお守り',
        'タモリあああ',
        '明石家さんまううう',
        'ダウンタウン',
        'ナインティナイン',
        'ロンドンブーツ１号２号',
    ];

    foreach ($tweet_contents as $tweet_content) {

        \App\Tweet::create([
            'tweets_content' => $tweet_content
        ]);

    }
    }
}
