<?php

$conn = mysqli_connect('localhost', 'root', '', 'ajaxtest');

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])) {

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);

    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "INSERT INTO users(fname,lname,email) VALUES ('$fname','$lname','$email')";

    if (mysqli_query($conn, $query)) {

        echo "user added";
    } else {

        echo mysqli_error($conn);
    }
};
//So what we did is within the create.php file, we created the handling of the data given by the user. This whole part is done with Javascript(in the front-end of our small application). This data taken by Javascript is passed on to our php(process.php) which in turn sends it over to our database.