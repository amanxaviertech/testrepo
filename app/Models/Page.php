<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'status', 'htmlContent', 'cssContent'];

     public function pagesection()
    {
        return $this->hasMany(Pagesection::class, 'page_id');
    }
}
