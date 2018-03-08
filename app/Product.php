<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 	protected $fillable = ['imagePath', 'title' ,'category_id', 'description', 'price'];

 	public function category()
 	{
 		return $this->belongsTo(Category::class);
 	}

 	public function scopeSearch($query,$search)
    {
    	return $query->where('title', 'like', '%' . $search . '%');
    }
}
