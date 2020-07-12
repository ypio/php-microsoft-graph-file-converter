<?php

namespace Ypio\MSGraphFileConverter;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Ypio\MSGraphFileConverter\Exceptions\MSGraphException;
use Ypio\MSGraphFileConverter\Http\BaseRequest;
use Ypio\MSGraphFileConverter\Models\FileModel;
use Ypio\MSGraphFileConverter\Repositories\FileRepository;
use Ypio\MSGraphFileConverter\Formats\FormatTo;
use Ypio\MSGraphFileConverter\Formats\FormatToPdfFrom;

class FileConverter implements FileConverterInterface
{

    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @var FileModel
     */
    private $file;

    /**
     * @return Configuration
     */
    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    /**
     * @param Configuration $configuration
     */
    public function setConfiguration(Configuration $configuration): void
    {
        $this->configuration = $configuration;
    }

    /**
     * @return bool
     */
    public function hasRequirements(): bool
    {
        return ($this->getConfiguration()->getHttpClient() instanceof ClientInterface);
    }

    /**
     * Set the file that should be convert.
     *
     * This method do not perform any request and only store the file content inside the object attribute.
     *
     * @param string $content Content of the file that you want to convert.
     * @param string $filename Name that will be shown on OneDrive. You don't need to specify the extension.
     * File extension is automatically defined from the {@see FileConverter::convert()} arguments
     * @param bool $suffixWithRandomString does the filename should be prefixed with a random string
     *
     * @return $this|FileConverterInterface
     * @throws Exception
     */
    public function setFile(string $content, $filename = '', $suffixWithRandomString = true): FileConverterInterface
    {
        $file = new FileModel();
        $file->content = $content;
        $file->name = $filename . base64_encode(md5(random_int(1000, 1000000), uniqid()));
        $this->file = $file;

        return $this;
    }

    /**
     *
     * Upload a file, convert it, delete the uploaded file, and return the converted content
     *
     * @param \Ypio\MSGraphFileConverter\Formats\FormatTo $availableTypes Input format and out put format
     * See {@see FormatToPdfFrom}
     *
     * @param bool $avoidPhantomFile If an exception exception is thrown during the conversion process after the file uploaded
     * the method will try to call the {@see FileRepository::delete()} method to avoid phantom files.
     *
     * @return string The content of the file converted in the desired format
     *
     * @throws ClientExceptionInterface
     * @throws MSGraphException
     */
    public function convert(FormatTo $availableTypes, $avoidPhantomFile = true): string
    {
        $this->file->name .= '.' . $availableTypes->input();

        $repo = new FileRepository(
            $this->file,
            new BaseRequest($this->configuration),
            $this->configuration
        );

        $repo->upload();
        try {
            $content = $repo->convert($availableTypes->output());
        } catch (MSGraphException $e) {
            $repo->delete();
            throw new MSGraphException($e->getResponse(),
                "We deleted the uploaded file from OneDrive to avoid phantom file.",
                MSGraphException::SENT_FILE_DELETED_FROM_ONE_DRIVE
            );
        }

        $repo->delete();

        return $content;
    }
}