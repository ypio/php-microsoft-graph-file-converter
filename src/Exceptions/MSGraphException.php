<?php

namespace Ypio\MSGraphFileConverter\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use Ypio\MSGraphFileConverter\Models\OneDriveItem;

/**
 * Exception throw when MSGraph return a 4XX or 5XX status code
 *
 * Notes :
 * * You can you {@see MSGraphException::getResponse()} to get more information about the error that occured.
 * * You can use {@see MSGraphException::getConcernedItem()} to get information about the OneDrive item that was in use when the exception was thrown
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 */
class MSGraphException extends Exception {

    /** @var ResponseInterface */
    private $response;

    /**
     * OneDrive item on which an operation was performed by the repository when the exception occurred
     *
     * @var OneDriveItem
     */
    private $concernedItem;

    /**
     * Code set when an exception occurred after a file upload but before the that the file has been deleted.
     */
    public const SENT_FILE_DELETED_FROM_ONE_DRIVE = 1;

    /**
     * MSGraphError constructor.
     * @param ResponseInterface $response
     * @param string $message
     * @param int $code
     * @param Throwable $previous
     */
    public function __construct(ResponseInterface $response, $message = "", $code = 0, Throwable $previous = null)
    {

        $message = 'MsGraph returned a 4XX or 5XX status code. See the response inside the exception for more information. '
            . $message;

        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     *
     * OneDrive item on which an operation was performed by the repository
     *
     * You can then use and store the item id deal with it later if in exception occurred
     *
     * @return OneDriveItem|null OneDrive item on which an operation was performed by the repository when the exception
     * occurred. Null if the operation did not concern any OneDrive item.
     *
     */
    public function getConcernedItem(): ?OneDriveItem
    {
        return $this->concernedItem;
    }

    public function setConcernedItem(OneDriveItem $oneDriveItem): void
    {
        $this->concernedItem = $oneDriveItem;
    }
}