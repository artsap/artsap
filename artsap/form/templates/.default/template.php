<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
<div id="formBox" data-url="<?= $templateFolder; ?>">
    <div class="close"></div>
    <form action="#" id="formGo">
        <input name="URL" id="url" type="hidden" required>
        <input name="ID" type="hidden" value="<?= $arParams['HLB_ID']; ?>" required>
        <input name="ID_SEND" type="hidden" value="<?= $arParams['EVENT_MESSAGE_ID']; ?>" required>
        <input name="NAME" type="text" placeholder="Имя">
        <input name="PHONE" type="tel" placeholder="Телефон" required>
        <input type="submit" value="Отправить">
    </form>
</div>
<a class="openForm" href="Нажми на меня">Нажми на меня</a>