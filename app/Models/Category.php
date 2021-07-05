<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $guarded = [];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }


    public function scopeActive($q){
        return $q->where('active', 1);
    }


}
