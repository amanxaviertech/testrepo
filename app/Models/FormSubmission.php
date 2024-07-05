<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'form_data'];

    protected $casts = [
        'page_id' => 'integer',
        'form_data' => 'array',
    ];
}

