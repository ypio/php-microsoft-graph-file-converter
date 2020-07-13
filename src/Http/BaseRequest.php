<?php

namespace Ypio\MSGraphFileConverter\Http;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Ypio\MSGraphFileConverter\Configuration;
use Ypio\MSGraphFileConverter\Exceptions\ExceptionGenerator;
use Ypio\MSGraphFileConverter\Exceptions\MSGraphException;

/**
 * Add an abstraction layers for request sent to MSGraph
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 */
class BaseRequest {

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var Configuration
     */
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->client = $configuration->getHttpClient();
        $this->configuration = $configuration;
    }

    /**
     * @param $method
     * @param $uri
     * @param $body
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     * @throws MSGraphException
     */
    public function execute($method, $uri, $body = null): ResponseInterface {

        $headers = [
            'Authorization' => 'Bearer ' . $this->configuration->getToken(),
        ];

        if ($body !== null) {
            $headers['Content-Type'] = 'text/plain';
        }

        $uri = 'https://graph.microsoft.com/v1.0/users/' . $this->configuration->getUser() . $uri;

        $request = new Request(
            $method,
            $uri,
            $headers,
            $body
        );

        $response = $this->client->sendRequest($request);

        new ExceptionGenerator(clone $response);

        return $response;
    }

    /**
     *
     * Follow redirection return by response with a 'location' header
     *
     * @param ResponseInterface $response
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     * @throws MSGraphException
     */
    public function followRedirect(ResponseInterface $response): ResponseInterface
    {
        $response = $this->configuration
            ->getHttpClient()
            ->sendRequest(
                new Request('GET', $response->getHeader('Location')[0])
            );

        new ExceptionGenerator(clone $response);

        return $response;
    }

}