<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = ['title','langue','date_sortie','ecrivain','durée', 'artiste','category_id','image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}