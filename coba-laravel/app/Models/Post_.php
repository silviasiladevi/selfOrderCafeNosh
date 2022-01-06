<?php

namespace App\Models;



class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Silvia Siladevi Gosal",
            "body" => " Lorem satu ipsum dolor sit amet consectetur adipisicing elit.
            Optio in obcaecati veli t est architecto, omnis voluptatibus 
            desert laudantium corrupti nihil corporis animi tempora 
            doloribus numquam dicta rem harum quis repellat incidunt 
            cumque maiores ullam nisi nulla. Libero deserunt, quidem, 
            neque recusandae esse perspiciatis quos eaque magni dolorem 
            nam officia ipsum in optio, quod rem! Ipsum in neque, aut 
            necessitatibus, rerum quibusdam asperiores repellendus voluptate
            consequatur rem veniam nihil eos tempore, consequuntur aspernatur
            quisquam tenetur animi pariatur labore quas illo? Eligendi!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Angelita ",
            "body" => "Lorem Dua ipsum dolor sit amet consectetur adipisicing elit.
            Optio in obcaecati velit est architecto, omnis voluptatibus 
            deserunt laudantium corrupti nihil corporis animi tempora 
            doloribus numquam dicta rem harum quis repellat incidunt 
            cumque maiores ullam nisi nulla. Libero deserunt, quidem, 
            neque recusandae esse perspiciatis quos eaque magni dolorem 
            nam officia ipsum in optio, quod rem! Ipsum in neque, aut 
            necessitatibus, rerum quibusdam asperiores repellendus voluptate
            consequatur rem veniam nihil eos tempore, consequuntur aspernatur
            quisquam tenetur animi pariatur labore quas illo? Eligendi!"
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p)
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        return $posts->firstWhere('slug', $slug);
    }
}
