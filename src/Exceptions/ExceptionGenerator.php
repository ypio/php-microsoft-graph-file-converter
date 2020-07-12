<?php

namespace Ypio\MSGraphFileConverter\Exceptions;

use Psr\Http\Message\ResponseInterface;

/**
 * Class MSGraphError
 * Generate a {@see MSGraphException} exception when MSGraph return a 4XX or 5XX status code
 */
class ExceptionGenerator {

    /**
     * ExceptionGenerator constructor.
     * @param ResponseInterface $response
     * @throws MSGraphException
     */
    public function __construct(ResponseInterface $response)
    {

        $statusCode = $response->getStatusCode();

        if ($statusCode >= 400 || $statusCode >= 500) {
            throw new MSGraphException($response);
        }

    }

}