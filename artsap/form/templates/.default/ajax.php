<? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Mail\Event;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
use Bitrix\Main\Application;

Loader::includeModule('highloadblock');

$post = Application::getInstance()->getContext()->getRequest();

$name = htmlspecialchars($post->getPost("NAME"));
$phone = htmlspecialchars($post->getPost("PHONE"));
$url = htmlspecialchars($post->getPost("URL"));
$id = htmlspecialchars((int)$post->getPost("ID"));
$send = htmlspecialchars((int)$post->getPost("ID_SEND"));
$ok_text = htmlspecialchars($post->getPost("OK_TEXT"));

if ($id):
    if ($phone):

        $hlbl = $id;
        $hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch();
        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();

        $data = array(
            'UF_NAME' => $name,
            'UF_PHONE' => $phone,
            'UF_URL' => $url,
        );

        $result = $entity_data_class::add($data);

        Event::send(array(
            "EVENT_NAME" => 'FEEDBACK_FORM',
            "LID" => SITE_ID,
            "C_FIELDS" => array(
                'NAME' => $name,
                'PHONE' => $phone,
                'URL' => $url
            )
        ));

        echo '<span style="color:green;">' . $ok_text . '</span>';
    else:
        echo '<span style="color:red;">Не указан телефон</span>';
    endif;
else:
    echo '<span style="color:red;">Не правильно указан ID Highload-блока в настройках компонента</span>';
endif;


