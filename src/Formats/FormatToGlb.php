<?php

namespace Ypio\MSGraphFileConverter\Formats;

/**
 * Input format supported for GLB output format
 *
 * @package Ypio\MSGraphFileConverter\Types
 */
class FormatToGlb extends FormatTo {

    public const _cool = 'cool';
    public const _fbx = 'fbx';
    public const _obj = 'obj';
    public const _ply = 'ply';
    public const _stl = 'stl';
    public const _3mf = '3mf';

    public function output(): string
    {
        return 'glb';
    }

}