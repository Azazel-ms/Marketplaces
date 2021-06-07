<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'source_provider_id',
        'json',
        'ean',
    ];
}
