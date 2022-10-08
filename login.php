<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            padding: 100px 400px;
        }
        /* Style all input fields */
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #c16707;
            color: white;
        }

        /* Style the container for inputs */
        .container {
            background-color: #f1f1f1;
            padding: 20px;
        }

        /* The message box is shown when the user clicks on the password field */
        #message, #confirm {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
        }

        #message p, #confirm p {
            padding: 10px 35px;
            font-size: 18px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "\2714";
        }

        /* Add a red text color and an "x" icon when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "\00D7";
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="/action_page.php">
            <label for="usrname">Username</label>
            <input type="text" id="usrname" name="usrname" required>

            <label for="dropdwn">Level</label>
            <select id="dropdwn" name="cars">
                <option value="Student">...</option>
                <option value="Student">Student</option>
                <option value="teamlead">Team Lead</option>
                <option value="facilitator">Facilitator</option>
              </select>
            
            <label for="psw">Password</label>
            <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required>
            
            <label for="npsw">Confirm Password</label>
            <input type="password" id="npsw" name="npsw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A lowercase letter</p>
        <p id="capital" class="invalid">A CapitaL letter</p>
        <p id="number" class="invalid">A number</p>
        <p id="length" class="invalid">Minimum 8 characters</p>
    </div>

    <div id="confirm">
        <h3>Password must much:</h3>
        <p id="valids" class="invalid">Matching password</p>
    </div>

    <script>
        var myInput = document.getElementById("psw");
        var npswd = document.getElementById("npsw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        var valids = document.getElementById("valids");
    
        // When the user clicks on the password field, show the message box
        npswd.onfocus = function () {
            document.getElementById("confirm").style.display = "block";
        }
    
        // When the user clicks outside of the password field, hide the message box
        npswd.onblur = function () {
            document.getElementById("confirm").style.display = "none";
        }

        //************************************************************//

        // When the user clicks on the confirm field, show the message box
        myInput.onfocus = function () {
            document.getElementById("message").style.display = "block";
        }
    
        // When the user clicks outside of the confirm field, hide the message box
        myInput.onblur = function () {
            document.getElementById("message").style.display = "none";
        }

        //*******************************************************//
    
        // When the user starts to type something inside the password field
        myInput.onkeyup = function () {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }
    
            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }
    
            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }
    
            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }

        // When the user clicks outside of the password field, hide the message box
        npswd.onkeyup = function () {
            if(myInput != npswd)  {   
                valids.classList.remove("invalid");  
                valids.classList.add("valid");  
            } else {  
                valids.classList.remove("valid");  
                valids.classList.add("invalid");  
            }  
        }
        // When the user starts to type something inside the password field

    </script>
</body>

</html>