<?php

namespace Ypio\MSGraphFileConverter\Formats;

/**
 * Input format supported for PDF output format
 *
 * @package Ypio\MSGraphFileConverter\Types
 */
class FormatToPdfFrom extends FormatTo {

    public const CSV = 'csv';
    public const DOC = 'doc';
    public const DOCX = 'docx';
    public const ODP = 'odp';
    public const ODS = 'ods';
    public const ODT = 'odt';
    public const POT = 'pot';
    public const POTM = 'potm';
    public const POTX = 'potx';
    public const PPS = 'pps';
    public const PPSX = 'ppsx';
    public const PPSXM = 'ppsxm';
    public const PPT = 'ppt';
    public const PPTM = 'pptm';
    public const PPTX = 'pptx';
    public const RTF = 'rtf';
    public const XLS = 'xls';
    public const XLSX = 'xlsx';

    public function output(): string
    {
        return 'pdf';
    }

}