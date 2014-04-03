<?PHP
define ('IS_ADMIN', isset ($_SESSION ['IS_ADMIN']));
define ('IS_USER', isset ($_SESSION ['IS_USER']));
ini_set('display_errors','on');
error_reporting(E_ALL);
date_default_timezone_set('Europe/Moscow');
session_start();
include "config/db.php";
$act = isset($_GET['act']) ? $_GET['act'] : 'auth';
include_once "tpl/header.php";
switch ($act) {
	case 'auth':
		include 'controllers/auth.php';
echo <<<EOT
	<h1>Регистрация на сайте</h1>
	<form action="/?act=auth" method="POST" style="height: 34px" id="reg_form">
	        <label for="login">Пользователь</label>
	            <input type="text" name="username"/>
	        <label for="password" >Пароль</label>
	            <input type="password" name="password"/>
	        <label for="email">E-mail</label>
	            <input type="email" name="email"/>
	        <input type="submit" name="submit" value="Зарегестрироваться" />
	    </form>
EOT;
		break;
	case 'news':
		include 'controllers/news.php';
		break;
	default:
		include 'tpl/def.php';
		break;
}
//end
include_once "tpl/footer.php";
$dbh = NULL;