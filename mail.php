
<?php
function complete_mail() { 
        $_POST['name'] =  substr(htmlspecialchars(trim($_POST['name'])), 0, 50); 
        $_POST['tel'] =  substr(htmlspecialchars(trim($_POST['tel'])), 0, 30); 
        $_POST['city'] =  substr(htmlspecialchars(trim($_POST['city'])), 0, 30); 
        $_POST['message'] =  substr(htmlspecialchars(trim($_POST['message'])), 0, 1000); 
        // если не заполнено поле "Имя" - показываем ошибку 0 
        if (empty($_POST['name'])) 
             output_err(0); 
        // если неправильно заполнено поле email - показываем ошибку 1 
        if(empty($_POST['message'])) 
             output_err(2); 
        // создаем наше сообщение 
        $mess = ' 
        Имя отправителя:'.$_POST['name'].' 
        Контактный телефон:'.$_POST['tel'].' 
        Страна:'.$_POST['city'].'
        '.$_POST['message']; 
        // $to - кому отправляем 
        $to = 'n.korolev13@gmail.com'; 
        // $from - от кого 
        $from='info@site.ru'; 
        mail($to, $_POST['name'], $mess, "From:".$from); 
        echo 'Спасибо! Ваше письмо отправлено.'; 
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '/#form-back');
exit;

} 
 
function output_err($num) 
{ 
    $err[0] = 'ОШИБКА! Не введено Ф.И.О.'; 
    $err[1] = 'ОШИБКА! Неверно введен телефон.'; 
    $err[2] = 'ОШИБКА! Не введено сообщение.'; 
    echo '<p>'.$err[$num].'</p>'; 
    exit(); 
} 
 
if (!empty($_POST['submit'])) complete_mail(); 
?>