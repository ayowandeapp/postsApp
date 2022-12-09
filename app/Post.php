<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    # declare out the table 
    protected $table = 'posts';
    protected $fillable = ['title', 'body','author_id'];

    // public function setAuthorIdAttribute($author)
    // {
    //     $this->attributes['author_id'] = Author::firstOrCreate(['name'=>$author])->id;

    // }

}
