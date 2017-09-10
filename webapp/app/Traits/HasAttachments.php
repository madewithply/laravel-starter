<?php

namespace App\Traits;

use Plank\Mediable\Media;

trait HasAttachments
{

    /**
     * Add a Media relation as an attachment
     * @param Media $file
     * @return mixed
     */
    public function addAttachment(Media $file)
    {
        return $this->attachMedia($file, "attachment");
    }

    /**
     * Get a collection of the Media labelled as an attachment
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->getMedia("attachment");
    }

    /**
     * Remove an attachment with a specific ID
     * @param $id
     * @return mixed|static
     */
    public function removeAttachment($id)
    {

        $media = Media::find($id);

        if ($media->exists) {
            $this->detachMedia($media);
        }

        return $media;

    }
}