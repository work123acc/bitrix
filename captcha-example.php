<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/captcha.php');
$cpt = new CCaptcha();
$captchaPass = COption::GetOptionString('main', 'captcha_password', '');
if (strlen($captchaPass) <= 0) {
    $captchaPass = randString(8);
    COption::SetOptionString('main', 'captcha_password', $captchaPass);
}
$cpt->SetCodeCrypt($captchaPass);
?>

<form method="post" ..>
    ..
    <input name="captcha_code" value="<?= htmlspecialchars($cpt->GetCodeCrypt()); ?>" type="hidden">
    <img src="/bitrix/tools/captcha.php?captcha_code=<?= htmlspecialchars($cpt->GetCodeCrypt()); ?>">
    <input id="captcha_word" name="captcha_word" type="text">
</form>

<?
if (!$APPLICATION->CaptchaCheckCode($_POST['captcha_word'], $_POST['captcha_code'])) {
    echo 'Неправильный ответ антиспама';
} else {
    ..
}
?>