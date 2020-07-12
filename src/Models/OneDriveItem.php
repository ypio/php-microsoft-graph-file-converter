<?php

namespace Ypio\MSGraphFileConverter\Models;


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