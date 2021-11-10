<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $visible = ['name'];
    protected $fillable = ['name'];

    public $timestamps = true;

    public function books()
    {
        $this->hasMany('App\Models\Book', 'author_id');
    }
}

