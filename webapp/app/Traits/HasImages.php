<?php

namespace App\Traits;

use Plank\Mediable\Media;

trait HasImages
{

    /**
     * Add a Media relation as an image
     * @param Media $file
     * @return mixed
     */
    public function addImage(Media $file)
    {
        return $this->attachMedia($file, "image");
    }

    /**
     * Get a collection of the Media labelled as an image
     * @return mixed
     */
    public function getImages()
    {
        return $this->getMedia("image");
    }

    /**
     * Remove an attachment with a specific ID
     * @param $id
     * @return mixed|static
     */
    public function removeImage($id)
    {

        $media = Media::find($id);

        if ($media->exists) {
            $this->detachMedia($media);
        }

        return $media;

    }
}