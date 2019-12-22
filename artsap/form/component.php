<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

if ($arParams['JQERY'] == 'Y'):
    Asset::getInstance()->addString('<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>');
endif;
$this->IncludeComponentTemplate();