<?php

namespace Ypio\MSGraphFileConverter\Repositories;

use Psr\Http\Client\ClientExceptionInterface;
use Ypio\MSGraphFileConverter\Configuration;
use Ypio\MSGraphFileConverter\Exceptions\MSGraphException;
use Ypio\MSGraphFileConverter\Http\BaseRequest;
use Ypio\MSGraphFileConverter\Models\FileModel;

class FileRepository {

    /**
     * @var BaseRequest
     */
    private $baseRequest;

    /**
     * @var FileModel
     */
    private $fileModel;

    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * FileRepository constructor.
     * @param FileModel $fileModel
     * @param BaseRequest $baseRequest
     * @param Configuration $configuration
     */
    public function __construct(FileModel $fileModel, BaseRequest $baseRequest, Configuration $configuration)
    {
        $this->fileModel = $fileModel;
        $this->baseRequest = $baseRequest;
        $this->configuration = $configuration;
    }

    /**
     * Upload the file on OneDrive using MSGraph API
     *
     * @throws ClientExceptionInterface|MSGraphException
     */
    public function upload(): void
    {
        $response = $this->baseRequest->execute(
            'PUT',
            '/drive/items/' . $this->fileModel->parentId . ':/' . $this->fileModel->name . ':/content',
            $this->fileModel->content
        );

        $this->fileModel->onOneDrive = true;

        $file = json_decode($response->getBody()->getContents(), true);

        $this->fileModel->id = $file['id'];
    }

    /**
     * Convert and download the file from MSGraph API.
     *
     * @param string $output Output format
     * @param bool $return_dl_uri If the method will return the converted file or on url where you can download the converted file provided by MSGraph
     * @return string The content of the file converted in the desired format
     * @throws ClientExceptionInterface|MSGraphException
     */
    public function convert(string $output, bool $return_dl_uri = false): string
    {
        try {

            $response = $this->baseRequest->execute(
                'GET',
                '/drive/items/' . $this->fileModel->id . "/content?format=$output"
            );

            if ($return_dl_uri === false) {
                $response = $this->baseRequest->followRedirect($response);
            }

        } catch (MSGraphException $e) {
            $e->setConcernedItem($this->fileModel);
            throw $e;
        }

        if ($return_dl_uri === false) {
            return $response->getBody()->getContents();
        }

        return $response->getHeader('Location')[0];
    }

    /**
     * Delete the file from OneDrive using the MSGraph API.
     *
     * @throws ClientExceptionInterface|MSGraphException
     */
    public function delete(): void
    {
        $this->baseRequest->execute(
            'DELETE',
            '/drive/items/' . $this->fileModel->id
        );

        $this->fileModel->onOneDrive = false;
    }
}