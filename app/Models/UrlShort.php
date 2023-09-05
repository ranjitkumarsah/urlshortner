<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShort extends Model
{
    use HasFactory;
    public $table = 'urlshort';

    public $fillable = [
        'url',
        'url_id',
        'ip',
    ];
}
