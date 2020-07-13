<?php

namespace Ypio\MSGraphFileConverter;

use Psr\Http\Client\ClientInterface;

/**
 * Configuration elements used for conversion
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 */
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
     *
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
     * Get the user that will be used for interaction his with OneDrive drive
     *
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * Set the user that will be used for interaction his with OneDrive drive
     *
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     *
     * Get the token that will be used for MSGraph authentication
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set the token that will be used for MSGraph authentication
     *
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     *
     * Get Http client psr-7 compliant that will be used for sending request to MSGraph
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Set Http client psr-7 compliant that will be used for sending request to MSGraph
     *
     * @param ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

}