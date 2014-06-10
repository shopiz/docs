<?php

define('DS', DIRECTORY_SEPARATOR);

define('APP_PATH', dirname(__DIR__) . DS);

$languages = array('en', 'es', 'ja', 'fr', 'pl', 'pt', 'ru', 'zh');


foreach ($languages as $k => $v) {
    // 修改Makefile文件
    $file = APP_PATH . "{$v}/Makefile";
    $file_content = file_get_contents($file);
    $file_content = str_replace("BUILDDIR      = _build", "BUILDDIR      = .", $file_content);
    $file_content = str_replace("$(BUILDDIR)/html", "$(BUILDDIR)/latest", $file_content);
    file_put_contents($file, $file_content);

    // 修改模版文件
    // 
    // 
    $file = APP_PATH . "{$v}/_theme/phalcon/layout.html";
    $file_content = file_get_contents($file);
    $file_content = str_replace("http://phalconphp.com", "http://www.iphalcon.com", $file_content);
    $file_content = str_replace("Ubuntu:400,500,700,300italic,400italic,500italic&amp;subset=latin,cyrillic-ext", "Ubuntu&amp;subset=latin,cyrillic-ext", $file_content);
    file_put_contents($file, $file_content);
}
