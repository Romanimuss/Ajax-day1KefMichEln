<?php

$conn = mysqli_connect('localhost', 'root', '', 'ajaxtest');

//query

$query = "SELECT * FROM  users";
$query2 = "SELECT email FROM `users`;";

//Get results

$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);

//Fetch Data from database

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
$emails = mysqli_fetch_all($result2, MYSQLI_ASSOC);
echo json_encode($emails);
//$emails = $users['email'];

//echo json_encode($emails); //js_encode is the php method for JSON.stringify
