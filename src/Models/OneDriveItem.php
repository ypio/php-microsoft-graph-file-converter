<?php

namespace Ypio\MSGraphFileConverter\Models;


/**
 * Interface OneDriveItem
 *
 * This interface represent a OneDrive (an element that will be stored, was stored, or is stored one OneDrive)
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 */
interface OneDriveItem {

    /**
     * Return the id of the OneDrive item
     *
     * @return string
     */
    public function getItemId(): string;

    /**
     * State of the file one OneDrive.
     *
     * Return true if the file is still present on OneDrive. This value might not be up to date.
     *
     * @return bool
     */
    public function onOneDrive(): bool;

}