<?php

function createTable() {
    $mysqli = new mysqli('localhost', 'root', 'root', 'test');

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = 'CREATE TABLE `test`.`test` 
( `id` INT NOT NULL AUTO_INCREMENT,
`email` TEXT NOT NULL,
`password` TEXT NOT NULL,
`name` TEXT NOT NULL,
PRIMARY KEY (`id`))';

    $result = $mysqli->query($sql);
    if($result)
    {
        echo "Создание таблицы прошло успешно";
    }
    $mysqli->close();

}

function reg() {
    $mysqli = new mysqli('localhost', 'root', 'root', 'test');

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $mysqli->set_charset('utf8');
    $regEmail = test_input($_POST['regEmail']);
    $regPass = test_input($_POST['regPass']);
    $regName = test_input($_POST['regName']);

    $sql = "INSERT INTO `test` (`id`, `email`, `password`, `name`) VALUES (NULL, '$regEmail', '$regPass', '$regName');";
    $result = $mysqli->query($sql);
    $mysqli->close();
    echo json_encode('Вы были успешно зарегестрированы! Ваш email - '.$regEmail.', пароль - '.$regPass.', имя - '.$regName);
}

function auth() {
    $mysqli = new mysqli('localhost', 'root', 'root', 'test');

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $mysqli->set_charset('utf8');
    $authEmail = test_input($_POST['authEmail']);
    $authPass = test_input($_POST['authPass']);


    $sql = "SELECT * FROM `test` WHERE `email` = '$authEmail'";

    $result = $mysqli->query($sql);

    while($row = $result->fetch_assoc() )
    {
        if ($authEmail == $row['email'] && $authPass == $row['password']) {
            unset($row['password']);
            unset($row['id']);
            echo json_encode($row);
        }
    }




    $mysqli->close();

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
createTable();

if (!empty($_POST['regEmail']) && !empty($_POST['regPass'] && $_POST['regName'])) {
    reg();
}

if (!empty($_POST['authEmail']) && !empty($_POST['authPass'])) {
    auth();
}




//
//
//$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
//
//echo '<pre>';
//print_r($row);


//if ('authEmail' as $_POST) {
//    var_dump($_POST);
//}
