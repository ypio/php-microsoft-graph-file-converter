<?php

namespace Ypio\MSGraphFileConverter\Formats;

/**
 * Input format supported for HTML output format
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 */
class FormatToHtmlFrom extends FormatTo {

    public const _eml = 'eml';
    public const _md = 'md';
    public const _msg = 'msg';

    /**
     * @inheritDoc
     */
    public function output(): string
    {
        return 'html';
    }

}