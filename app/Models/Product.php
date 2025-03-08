<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'categories_id',
        'name',
        'thumbnail_description',
        'description',
        'goal_price',
        'current_price',
        'photos',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'products_id', 'id'); // Perbaiki nama kolom relasi
    }
    public function expenditures()
    {
        return $this->hasMany(Expenditure::class, 'products_id');
    }

}
