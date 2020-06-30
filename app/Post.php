<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

// use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

class Post extends Model implements HasMedia
{
    //
    use InteractsWithMedia;

    // public function registerMediaConversions(Media $media = null)
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(130)
    //         ->height(130);
    // }

    // public function registerMediaCollections()
    // {
    //     $this->addMediaCollection('main')->singleFile();
    //     $this->addMediaCollection('my_multi_collection');
    // }
    // public function fields(Request $request)
    // {
    //     return [
    //         Images::make('Main image', 'main') // second parameter is the media collection name
    //             ->conversionOnIndexView('thumb') // conversion used to display the image
    //             ->rules('required'), // validation rules
    //     ];
    // }
}
