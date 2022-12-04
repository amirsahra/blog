<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','slug','parent_id'
    ];

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id','id')
            ->with('children');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
