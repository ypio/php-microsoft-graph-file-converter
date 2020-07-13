<?php

namespace Ypio\MSGraphFileConverter;

use Ypio\MSGraphFileConverter\Formats\FormatTo;

interface FileConverterInterface
{

    /**
     * Get configuration
     *
     * @return Configuration
     */
    public function getConfiguration(): Configuration;

    /**
     * Set configuration
     *
     * @param Configuration $configuration
     */
    public function setConfiguration(Configuration $configuration): void;

    /**
     * Check if an http client and a configuration has been set
     * @return bool
     */
    public function hasRequirements(): bool;

    /**
     * Set content to convert
     *
     * @param string $content
     * @return FileConverterInterface
     */
    public function setFile(string $content): FileConverterInterface;

    /**
     * Convert the content which was set
     *
     * @param FormatTo $availableTypes
     * @return string
     */
    public function convert(FormatTo $availableTypes): string;

}