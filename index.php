<?php
require_once 'connec.php';

$pdo = new \PDO(DSN, USER, PASS);


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";

    $statement = $pdo->prepare($query);

    $statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
    $statement->bindValue(':lastname',$_POST['lastname'], PDO::PARAM_STR);

    $statement->execute();

    header('Location:/index.php');
}

$query ="SELECT * FROM friend";
$statement = $pdo->query($query);

$friends = $statement->fetchAll(PDO::FETCH_ASSOC); // same as $statement->fetchAll()
foreach($friends as $friend)
{
    echo $friend['id'] . ' ' . $friend['firstname'] . ' ' . $friend['lastname'] . '<br/>';
}
?>

<form action="" method="post">
    <label for="firstname">First Name :</label>
    <input type="text" name="firstname" id="firstname" required>
    <label for="lastname">Last Name:</label>
    <input type="text0" name="lastname" id="lastname" required>
    <button type="submit">Submit</button>
</form>