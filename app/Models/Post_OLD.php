<?php

namespace App\Models;



class Post 
{
    private static $post_blog= [
        [
            "title" => "Post Pertama",
            "slug" => "post-pertama",
            "author" => "subairi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente exercitationem at saepe quaerat. Excepturi eum unde, numquam aliquam maiores officiis earum aspernatur fugiat omnis quia error quaerat officia magnam labore"
        ],
        [
            "title" => "Post Kedua",
            "slug" => "post-kedua",
            "author" => "iwan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente exercitationem at saepe quaerat. Excepturi eum unde, numquam aliquam maiores officiis earum aspernatur fugiat omnis quia error quaerat officia magnam labore"
        ]
    ];
    public static function all(){
        return collect(self::$post_blog);
    }

    public static function find($slug){
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
        
    }
}
