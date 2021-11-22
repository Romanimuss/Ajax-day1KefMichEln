<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <style>
        #message {
            color: red;
        }
    </style>

</head>

<body>
    <h1 id="message"></h1>

    <form id="form">

        <input type="text" id="firstname" name="fname" placeholder="first name">

        <input type="text" id="lastname" name="lname" placeholder="last name">

        <input type="email" id="email" name="email" placeholder="email">

        <input type="submit" value="submit">

    </form>



    <script>
        var arrem = []; //store the emails in this array.
        let ajReq = new XMLHttpRequest();
        ajReq.open("Get", "users.php", true);
        ajReq.onload = function() {
            if (this.status == 200) {
                let emails = JSON.parse(this.responseText);
                for (const val of emails) {
                    arrem.push(val.email)
                }
                console.log(emails[0].email)
                document.getElementById("email").addEventListener("input", check);

            }

        }

        function check() {
            let var2 = document.getElementById('email');
            if (arrem.includes(var2.value)) {
                document.getElementById("message").innerHTML = "This email is already in use!";
            } else {
                document.getElementById("message").innerHTML = "";
            }
        }
        ajReq.send();
        document.getElementById("form").addEventListener("submit", insertName);

        //POST with Inserting user into db

        function insertName(e) {

            e.preventDefault(); //this prevents the page from refreshing after submitting

            let fname = document.getElementById("firstname").value; //saving the firstname value

            let lname = document.getElementById("lastname").value; //saving the lastname value
            let email = document.getElementById("email").value; //saving the lastname value

            let params = `fname=${fname }&lname=${lname}&email=${email}`; //creating the parameters for the POST method

            console.log(params)

            let request = new XMLHttpRequest(); //creating new request

            request.open("POST", "process.php", true); //connecting to the process.php file

            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //setting header for POST method

            request.onload = function() {

                if (this.status == 200) {

                    console.log(this.responseText)

                }

            }

            request.send(params); //send parameters to be further processed by php

        }
    </script>

</body>

</html>

<!-- <h1 id="test">You have typed in hello</h1>
    <input type="text" id="btn" oninput="check()" placeholder="Enter something">
    <script>
        function check() {
            let v1 = document.getElementById("btn");
            if (v1.value === "hello") {
                let v2 = document.getElementById("test");
                v2.style.color = 'red';
            }
        }
    </script> -->