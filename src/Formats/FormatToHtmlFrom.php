<?php

namespace Ypio\MSGraphFileConverter\Formats;

/**
 * Input format supported for HTML output format
 *
 * @package Ypio\MSGraphFileConverter\Types
 */
class FormatToHtmlFrom extends FormatTo {

    public const _eml = 'eml';
    public const _md = 'md';
    public const _msg = 'msg';

    public function output(): string
    {
        return 'html';
    }

}