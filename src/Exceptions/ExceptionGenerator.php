<?php

namespace Ypio\MSGraphFileConverter\Exceptions;

use Psr\Http\Message\ResponseInterface;

/**
 * Generate a {@see MSGraphException} exception when MSGraph return a 4XX or 5XX status code
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
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