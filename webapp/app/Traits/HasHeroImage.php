<?php

namespace App\Traits;

use Plank\Mediable\Media;

trait HasHeroImage
{

    /**
     * Add a Media relation as an image
     * Will replace any existing media
     * @param Media $file
     * @return mixed
     */
    public function addHeroImage(Media $file)
    {
        return $this->syncMedia($file, "hero_image");
    }

    /**
     * Remove the hero image if one exists
     * @return mixed|static
     */
    public function removeHeroImage()
    {

        $heroImage = $this->getHeroImage();

        if ($heroImage->exists) {
            $this->detachMedia($heroImage);
        }

        return $heroImage;

    }

    /**
     * Get the hero image if one exists
     * @return mixed
     */
    public function getHeroImage()
    {
        return $this->firstMedia("hero_image");
    }
}