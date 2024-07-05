<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagesection extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'type', 'heading', 'content', 'status', 'background_image', 'background_color', 'form_fields'];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

}
