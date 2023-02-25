<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Sluggable {

    public static function bootSluggable()
    {
        static::saving(function (Model $model) {
            $model->setSlug(Str::slug($model->getSluggableString()));
        });
    }

    public function getSlug()
    {
        return $this->getAttribute($this->getSlugColumnName());
    }

    public function setSlug($value)
    {
        $this->setAttribute($this->getSlugColumnName(), $value);

        return $this;
    }

    protected function getSlugColumnName()
    {
        return 'slug';
    }


    protected function getSluggableString()
    {
        return $this->getAttribute($this->sluggableField ?? 'name');
    }
}
