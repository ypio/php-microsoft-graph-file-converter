<?php

namespace Ypio\MSGraphFileConverter;

use Psr\Http\Client\ClientInterface;

class Configuration {

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $token;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * Configuration constructor.
     * @param string $token
     * @param string $user
     * @param ClientInterface $httpClient Http client psr 7 compliant
     */
    public function __construct(string $token, string $user, ClientInterface $httpClient)
    {
        $this->token = $token;
        $this->user = $user;
        $this->httpClient = $httpClient;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

}