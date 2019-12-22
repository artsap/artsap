<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if ($arParams['JQERY'] == 'Y'):
    CJSCore::Init(['jquery']);
endif;

$this->IncludeComponentTemplate();