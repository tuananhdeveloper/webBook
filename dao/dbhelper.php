<?php
define('HOST','localhost');
define('DATABASE','dbbook');
define('USERNAME','root');
define('PASSWORD','');
function execute($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

	//query
	mysqli_query($conn, $sql);

	//dong connection
	mysqli_close($conn);
}

function executeResult($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

	//query
	$resultset = mysqli_query($conn, $sql);
	$list      = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}

	//dong connection
	mysqli_close($conn);

	return $list;
}

function login($username, $password) {
	$dbConnection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$stmt = $dbConnection->prepare('SELECT users.login_id, account.id as accountId
	FROM ((users 
	INNER JOIN customer ON users.login_id = customer.user_login_id)
	INNER JOIN account ON customer.id = account.customer_id)
	WHERE users.login_id = ? AND users.password = ? ');
	$stmt->bind_param("is", $username, $password);
	$stmt->execute();

	$result = $stmt->get_result();
	$res = mysqli_fetch_assoc($result);
	mysqli_close($dbConnection);
	return $res;
}

function getAllProducts() {
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$query = "SELECT * FROM product";
	
	$resultset = mysqli_query($conn, $query);
	$list = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}

	//print_r($list);
	//dong connection
	mysqli_close($conn);
	return $list;
}


function getProductDetail($productId) {
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$query = "SELECT * FROM product WHERE id = $productId";
	$resultset = mysqli_query($conn, $query);
	$res = mysqli_fetch_assoc($resultset);
	return $res;
}

function register($login_id, $password, $email, $phone, $address) {
	if(!empty($login_id) && !empty($password) 
	&& !empty($email) && !empty($phone) && !empty($address)) {
		$customerId = uniqid("customer");
		$accountId = uniqid("account");

		$mysqli = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

		//transaction
		$mysqli->query("START TRANSACTION");
		//insert into users
		$stmt = $mysqli->prepare('INSERT INTO users(login_id, password) VALUES (?, ?)');
		$stmt->bind_param('ss', $login_id, $password);
		$stmt->execute();

		//insert into customer
		$stmt = $mysqli->prepare('INSERT INTO customer (id, address, email, phone, user_login_id) VALUES(?, ? , ?, ?, ?)');
		$stmt->bind_param('sssss', $customerId , $address, $email, $phone, $login_id);
		$stmt->execute();


		//insert into account
		$stmt = $mysqli->prepare('INSERT INTO account (id, customer_id, open_date) VALUES(?, ? , ?)');
		$stmt->bind_param('sss', $accountId , $customerId, date('Y-m-d H:i:s'));
		$stmt->execute();

		$stmt->close();
		$result = $mysqli->query("COMMIT");

		if($result) {
			return true;
		}
		return false;
	}
}

function addProductToCart($loginId, $accountId, $productId) {
	if(!empty($loginId) && !empty($accountId) && !empty($productId)) {
		$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	}
}