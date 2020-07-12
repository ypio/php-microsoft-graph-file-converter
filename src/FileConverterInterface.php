<?php

namespace Ypio\MSGraphFileConverter;

use Ypio\MSGraphFileConverter\Formats\FormatTo;

interface FileConverterInterface
{

    public function getConfiguration(): Configuration;

    public function setConfiguration(Configuration $configuration): void;

    /**
     * Check if an http client and a configuration has been set
     * @return bool
     */
    public function hasRequirements(): bool;

    public function setFile(string $content): FileConverterInterface;

    public function convert(FormatTo $availableTypes): string;

}