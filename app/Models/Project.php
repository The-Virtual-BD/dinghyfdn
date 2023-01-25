<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'short_title',
        'category_id',
        'body',
        'cover',
        'publish_date',
        'target_fund',
        'raised_fund',
        'status',
    ];

    protected $casts = [
        'publish_date' => 'date:d-m, Y'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
