<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arEvent = Array();
$dbType = CEventMessage::GetList($by = 'ID', $order = 'DESC', $arFilter);
while ($arType = $dbType->GetNext())
    $arEvent[$arType['ID']] = '[' . $arType['ID'] . '] ' . $arType['SUBJECT'];

$arComponentParameters = array(
    'GROUPS' => array(),
    'PARAMETERS' => array(
        'OK_TEXT' => Array(
            'NAME' => 'Сообщение об удачной отправке',
            'TYPE' => 'STRING',
            'DEFAULT' => 'Ваше сообщение получено, в ближайшее время с вами свяжется менеджер.',
            'PARENT' => 'BASE',
        ),
        'EVENT_MESSAGE_ID' => Array(
            'NAME' => 'Почтновый шаблон для отправки письма(Поля: NAME, PHONE, URL)',
            'TYPE' => 'LIST',
            'VALUES' => $arEvent,
            'DEFAULT' => '',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'HLB_ID' => Array(
            'NAME' => 'Идентефикатор (ID) Highload-блока (Поля: UF_NAME, UF_PHONE, UF_URL)',
            'TYPE' => 'STRING',
            'DEFAULT' => '',
            'PARENT' => 'BASE',
        ),
    ),
);