<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trend',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    public $translatable = ['name','short_description','description','meta_description'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
