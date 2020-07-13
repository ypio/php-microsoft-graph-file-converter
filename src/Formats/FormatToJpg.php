<?php

namespace Ypio\MSGraphFileConverter\Formats;

/**
 * Input format supported for JPG output format
 *
 * @author ypio <ypio.fr@gmail.com>
 * @since 1.0.0
 */
class FormatToJpg extends FormatTo {

    public const _3g2 = '3g2';
    public const _3gp = '3gp';
    public const _3gp2 = '3gp2';
    public const _3gpp = '3gpp';
    public const _3mf = '3mf';
    public const _ai = 'ai';
    public const _arw = 'arw';
    public const _asf = 'asf';
    public const _avi = 'avi';
    public const _bas = 'bas';
    public const _bash = 'bash';
    public const _bat = 'bat';
    public const _bmp = 'bmp';
    public const _c = 'c';
    public const _cbl = 'cbl';
    public const _cmd = 'cmd';
    public const _cool = 'cool';
    public const _cpp = 'cpp';
    public const _cr2 = 'cr2';
    public const _crw = 'crw';
    public const _cs = 'cs';
    public const _css = 'css';
    public const _csv = 'csv';
    public const _cur = 'cur';
    public const _dcm = 'dcm';
    public const _dcm30 = 'dcm30';
    public const _dic = 'dic';
    public const _dicm = 'dicm';
    public const _dicom = 'dicom';
    public const _dng = 'dng';
    public const _doc = 'doc';
    public const _docx = 'docx';
    public const _dwg = 'dwg';
    public const _eml = 'eml';
    public const _epi = 'epi';
    public const _eps = 'eps';
    public const _epsf = 'epsf';
    public const _epsi = 'epsi';
    public const _epub = 'epub';
    public const _erf = 'erf';
    public const _fbx = 'fbx';
    public const _fppx = 'fppx';
    public const _gif = 'gif';
    public const _glb = 'glb';
    public const _h = 'h';
    public const _hcp = 'hcp';
    public const _heic = 'heic';
    public const _heif = 'heif';
    public const _htm = 'htm';
    public const _html = 'html';
    public const _ico = 'ico';
    public const _icon = 'icon';
    public const _java = 'java';
    public const _jfif = 'jfif';
    public const _jpeg = 'jpeg';
    public const _jpg = 'jpg';
    public const _js = 'js';
    public const _json = 'json';
    public const _key = 'key';
    public const _log = 'log';
    public const _m2ts = 'm2ts';
    public const _m4a = 'm4a';
    public const _m4v = 'm4v';
    public const _markdown = 'markdown';
    public const _md = 'md';
    public const _mef = 'mef';
    public const _mov = 'mov';
    public const _movie = 'movie';
    public const _mp3 = 'mp3';
    public const _mp4 = 'mp4';
    public const _mp4v = 'mp4v';
    public const _mrw = 'mrw';
    public const _msg = 'msg';
    public const _mts = 'mts';
    public const _nef = 'nef';
    public const _nrw = 'nrw';
    public const _numbers = 'numbers';
    public const _obj = 'obj';
    public const _odp = 'odp';
    public const _odt = 'odt';
    public const _ogg = 'ogg';
    public const _orf = 'orf';
    public const _pages = 'pages';
    public const _pano = 'pano';
    public const _pdf = 'pdf';
    public const _pef = 'pef';
    public const _php = 'php';
    public const _pict = 'pict';
    public const _pl = 'pl';
    public const _ply = 'ply';
    public const _png = 'png';
    public const _pot = 'pot';
    public const _potm = 'potm';
    public const _potx = 'potx';
    public const _pps = 'pps';
    public const _ppsx = 'ppsx';
    public const _ppsxm = 'ppsxm';
    public const _ppt = 'ppt';
    public const _pptm = 'pptm';
    public const _pptx = 'pptx';
    public const _ps = 'ps';
    public const _ps1 = 'ps1';
    public const _psb = 'psb';
    public const _psd = 'psd';
    public const _py = 'py';
    public const _raw = 'raw';
    public const _rb = 'rb';
    public const _rtf = 'rtf';
    public const _rw1 = 'rw1';
    public const _rw2 = 'rw2';
    public const _sh = 'sh';
    public const _sketch = 'sketch';
    public const _sql = 'sql';
    public const _sr2 = 'sr2';
    public const _stl = 'stl';
    public const _tif = 'tif';
    public const _tiff = 'tiff';
    public const _ts = 'ts';
    public const _txt = 'txt';
    public const _vb = 'vb';
    public const _webm = 'webm';
    public const _wma = 'wma';
    public const _wmv = 'wmv';
    public const _xaml = 'xaml';
    public const _xbm = 'xbm';
    public const _xcf = 'xcf';
    public const _xd = 'xd';
    public const _xml = 'xml';
    public const _xpm = 'xpm';
    public const _yaml = 'yaml';
    public const _yml = 'yml';

    public function output(): string
    {
        return 'jpg';
    }

}