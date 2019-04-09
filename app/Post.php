<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;


//https://mydnic.be/post/how-to-build-an-efficient-and-seo-friendly-multilingual-architecture-in-laravel-v2

class Post extends Model
{
    //

    use Sluggable, HasTranslations;

    public $translatable = ['title', 'slug', 'content'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
