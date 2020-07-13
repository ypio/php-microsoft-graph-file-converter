<?php

namespace Ypio\MSGraphFileConverter\Models;

use Ypio\MSGraphFileConverter\Repositories\FileRepository;

/**
 * Class that represent a file that is stored or will be stored on OneDrive
 *
 * Use {@see FileRepository} to perform operation on OneDrive
 * about the file represented by this class (like uploading, deleting)
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 *
 */
class FileModel implements OneDriveItem {

    /**
     * @var string Name of the file
     */
    public $name;

    /**
     * @var string ID of the file returned by MSGraph when uploading the file
     */
    public $id;

    /**
     * State of the file, true if uploaded
     */
    public $onOneDrive = false;

    /**
     * @var string Id of the parent (directory where the file will be uploaded).
     * Set 'root' to upload in the OneDrive root directory.
     */
    public $parentId = 'root';

    /**
     * @var null Content of the file you want to convert
     */
    public $content = null;

    /**
     * {@inheritDoc}
     */
    public function getItemId(): string
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function onOneDrive(): bool
    {
        return $this->onOneDrive();
    }
}