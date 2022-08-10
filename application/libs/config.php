<?php
/* PHP 에러 출력 여부 */
error_reporting( E_ALL );
ini_set('display_errors', 1 );
ini_set('session.name', 'SESSID');
if(extension_loaded('zlib'))
{
    ini_set('zlib.output_compression', 'On');
    ini_set('zlib.output_compression_level', 6);
}

/* */
define('_root', $_SERVER['DOCUMENT_ROOT']);
define('_dbCharset', 'utf8mb4');
define('_encryptKey', '3D301EFF008CA2087C0B6EACA0D19C35C32BAF582F28F3EAA8FA2DC08976174E');


?>