<?php

namespace App\Traits;

use Plank\Mediable\Media;

trait HasLogo
{

    /**
     * Add a Media relation as an image
     * Will replace any existing media
     * @param Media $file
     * @return mixed
     */
    public function addLogo(Media $file)
    {
        return $this->syncMedia($file, "logo");
    }

    /**
     * Remove the logo if one exists
     * @return mixed|static
     */
    public function removeLogo()
    {

        $logo = $this->getLogo();

        if ($logo->exists) {
            $this->detachMedia($logo);
        }

        return $logo;

    }

    /**
     * Get the logo if one exists
     * @return mixed
     */
    public function getLogo()
    {
        return $this->firstMedia("logo");
    }
}