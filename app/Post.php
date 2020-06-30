<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

// use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

class Post extends Model implements HasMedia
{
    //
    use InteractsWithMedia;


    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('tiny')
              ->width(640);
        $this->addMediaConversion('small')
              ->width(768);
        $this->addMediaConversion('medium')
              ->width(1024);
        $this->addMediaConversion('large')
              ->width(1280);
        $this->addMediaConversion('xl')
              ->width(2000);
        
    }
    
}
