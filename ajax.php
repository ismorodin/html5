<?PHP
try {
	$dsn = 'mysql:host=localhost;dbname=ajax';
	$username = 'root';
	$password = '';
	$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

	$dbh = new PDO($dsn, $username, $password, $options);

} catch (Exception $exc) {
	echo $exc->getMessage();
}
if (isset($_POST['l']) && isset($_POST['p'])) {
	$login = isset($_POST['l']) ? $_POST['l'] : "ERROR";
	$password = isset($_POST['p']) ? $_POST['p'] : "ERROR";
	$pdo = $dbh->prepare('INSERT INTO users(login,password) VALUES(?,?)');
	$pdo = $dbh->prepare('SELECT login,password FROM users WHERE login=:login');
	$pdo->bindValue(":login",$login);
	$pdo->execute();
	$hash = $pdo->fetch();
	if (password_verify($password, $hash['password'])) {
    		$json = true;
		} else {
    		$json = false;
	}
	echo json_encode(['json'=>$json]);

  // 	 $hash = crypt($password);
	 // $pdo = $dbh->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
	 // $pdo->bindValue("1", $login);
	 // $pdo->bindValue("2", $hash);
	 // $pdo->execute();
}
?>