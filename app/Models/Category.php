<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Relation;

class Category extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug' , 'description'
    ];

    protected $hidden = [];

    public function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }
}
