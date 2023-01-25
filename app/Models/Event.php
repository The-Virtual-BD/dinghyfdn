<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Event extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable = [
        'title',
        'short_title',
        'category_id',
        'body',
        'cover',
        'date_one',
        'date_two',
        'time_one',
        'time_two',
        'address_line_one',
        'address_line_two',
        'address_line_three',
        'address_line_four',
        'organizer_name',
        'organizer_phone',
        'organizer_webname',
        'organizer_weblink',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
