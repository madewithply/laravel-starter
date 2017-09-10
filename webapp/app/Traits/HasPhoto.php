<?php

namespace App\Traits;

use Plank\Mediable\Media;

trait HasPhoto
{

    /**
     * Add a Media relation as a photo
     * Will replace any existing media
     * @param Media $file
     * @return mixed
     */
    public function addPhoto(Media $file)
    {
        return $this->syncMedia($file, "photo");
    }

    /**
     * Remove the photo if one exists
     * @return mixed|static
     */
    public function removePhoto()
    {

        $heroImage = $this->getPhoto();

        if ($heroImage->exists) {
            $this->detachMedia($heroImage);
        }

        return $heroImage;

    }

    /**
     * Get the photo if it exists
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->firstMedia("photo");
    }
}