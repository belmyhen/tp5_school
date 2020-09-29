<?php
session_start();
require_once 'person.php';
$person = new person();
$person->setAge(21);
$_SESSION['person'] = $person;
echo "<a href='output.php'>check here to output age</a>";
?>