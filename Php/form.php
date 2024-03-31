<?php

session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FIR Report Form</title>
  <style>
    /* Add your CSS styles here */
    body {
      font-family: Arial, sans-serif;
      background-color: #333;
      color: white;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #222;
      border-radius: 10px;
    }

    h1 {
      text-align: center;
      font-weight: 900;
      font-family: 'Times New Roman', Times, serif;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-size: 18px;
    }

    input[type="text"],
    input[type="number"],
    select,
    textarea,
    input[type="date"],
    input[type="time"] {
      width: calc(100% - 20px);
      padding: 8px;
      margin-bottom: 44px;
      border-radius: 5px;
      font-size: 20px;
    }

    .form-group:not(:last-child) {
      margin-bottom: 25px;
      /* Increase margin between fields */
    }

    button[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #28a745;
      color: white;
      cursor: pointer;
      border-radius: 5px;
    }

    :root {
      --button-width: 150px;
      --spinner-width: calc(var(--button-width) / 6);
      --blue: #0076d3;
      --btn-bg: #fb0031;
      --text-light: #fefefe;
    }

    @import url('https://fonts.googleapis.com/css?family=Space+Mono');


    h1 {
      font-size: 1.5em;
    }

    small {
      color: #888;
    }

    @media (min-width: 180px) {
      .wrapper {
        width: 192px;
        display: -webkit-box;
        grid-template-columns: repeat(2, [col] calc(100% / 2));
        grid-auto-rows: 120px;
        margin: 30px auto 40px;
      }
    }

    .button {
      display: inline-block;
      min-width: var(--button-width);
      margin: 10px;
      background: var(--btn-bg);
      color: var(--text-light);
      font-size: 1.3em;
      padding: 0.5em;
      border-radius: 10px;
      text-align: center;
      position: absolute;
      cursor: pointer;
      appearance: none;
      -webkit-appearance: none;
      border: 0;
      transition: border-radius linear 0.05s, width linear 0.05s;

      &:focus {
        outline: 0;
      }

      &.animate {
        width: calc(var(--button-width) / 2.2);
        height: calc(var(--button-width) / 2.2);
        min-width: 0;
        border-radius: 50%;
        color: transparent;

        &:after {
          position: absolute;
          content: '';
          width: var(--spinner-width);
          height: var(--spinner-width);
          border: 4px solid var(--text-light);
          border-radius: 50%;
          border-left-color: transparent;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          animation: spin 2.5s forwards;
        }

        &.success:before {
          position: absolute;
          content: '';
          width: var(--spinner-width);
          height: calc(var(--spinner-width) / 2);
          border: 4px solid var(--text-light);
          border-right: 0;
          border-top: 0;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%) rotate(-45deg) scale(0);
          animation: success 0.15s forwards;
          animation-delay: 2.5s;
        }

        &.error {
          position: relative;
          animation: vibrate 0.5s forwards;
          animation-delay: 2.5s;

          &:before {
            color: #fff;
            position: absolute;
            content: '!';
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale(0);
            animation: error 0.5s forwards;
            animation-delay: 2.5s;
          }
        }
      }
    }

    @keyframes spin {
      0% {
        transform: translate(-50%, -50%) rotate(0deg) scale(1);
      }

      90% {
        transform: translate(-50%, -50%) rotate(1080deg) scale(1);
      }

      100% {
        transform: scale(0);
      }
    }

    @keyframes success {
      from {
        transform: translate(-50%, -50%) rotate(0) scale(0);
      }

      to {
        transform: translate(-50%, -50%) rotate(-45deg) scale(1);
      }
    }

    @keyframes error {
      from {
        transform: translate(-50%, -50%) scale(0);
      }

      to {
        transform: translate(-50%, -50%) scale(1);
        background-color: #f44336;
      }
    }

    @keyframes vibrate {

      0%,
      30%,
      60%,
      85%,
      100% {
        left: 0;
        background-color: #f44336;
      }

      10%,
      40%,
      90%,
      70% {
        left: -2px;
        background-color: #f44336;
      }

      20%,
      50%,
      80%,
      95% {
        left: 2px;
        background-color: #f44336;
      }
    }

    .label {
      display: flex;
      align-items: center;
      border-radius: 100px;
      padding: 14px 16px;
      margin: 5px 0;
      cursor: pointer;
      transition: .3s;
    }

    .label:hover,
    .label:focus-within,
    .label:active {
      background: hsla(0, 0%, 80%, .14);
    }

    .radio-input {
      position: absolute;
      left: 0;
      top: 0;
      width: 1px;
      height: 1px;
      opacity: 0;
      z-index: -1;
    }

    .radio-design {
      width: 20px;
      height: 20px;
      border-radius: 100px;
      background: linear-gradient(to right bottom, hsl(154, 97%, 62%), hsl(225, 97%, 62%));
      position: relative;
    }

    .radio-design::before {
      content: '';
      display: inline-block;
      width: inherit;
      height: inherit;
      border-radius: inherit;
      background: hsl(0, 0%, 90%);
      transform: scale(1.1);
      transition: .3s;
    }

    .radio-input:checked+.radio-design::before {
      transform: scale(0);
    }

    .label-text {
      color: hsl(0, 0%, 60%);
      margin-left: 14px;
      letter-spacing: 3px;
      text-transform: uppercase;
      font-size: 16px;
      font-weight: 900;
      transition: .3s;
    }

    .radio-input:checked~.label-text {
      color: hsl(0, 0%, 40%);
    }

    .input-container {
      position: relative;
      margin: 20px;
    }

    /* Input field */
    .input-field {
      display: block;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-bottom: 2px solid #000;
      outline: none;
      background-color: transparent;
      color: white;
    }

    /* Input label */
    .input-label {
      position: absolute;
      top: 0;
      left: 0;
      font-size: 16px;
      color: rgba(204, 204, 204, 0);
      pointer-events: none;
      transition: all 0.3s ease;
    }

    /* Input highlight */
    .input-highlight {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 2px;
      width: 0;
      background-color: #007bff;
      transition: all 0.3s ease;
    }

    /* Input field:focus styles */
    .input-field:focus+.input-label {
      top: -20px;
      font-size: 12px;
      color: #007bff;
    }

    .input-field:focus+.input-label+.input-highlight {
      width: 100%;
    }

    .location-button {
      /* Add your styling for the location button here */
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    .location-button:hover {
      background-color: #0056b3;
    }

    .location-button:active {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <header>
    <h1>FIR Report Form</h1>
  </header>
  <main class="container">
    <form action="form.php" method="POST" id="fir-form" class="needs-validation">
      <div class="form-group">
        <div class="input-container">
          <input placeholder="Enter your Name:" class="input-field" type="text" id="name" name="name" required>
          <label for="input-field" class="input-label">Enter Name :</label>
          <span class="input-highlight"></span>
        </div>

      </div>
      <div class="form-group">
        <div class="input-container">
          <input placeholder="Enter State" class="input-field" type="text" id="state" name="state" required>
          <label for="input-field" class="input-label">Enter State :</label>
          <span class="input-highlight"></span>
        </div>

      </div>
      <div class="form-group">
        <div class="input-container">
          <input placeholder="Enter City" class="input-field" type="text" id="city" name="city" required>
          <label for="input-field" class="input-label">Enter City :</label>
          <span class="input-highlight"></span>
        </div>
        <div class="form-group">
          <div class="input-container">
            <input placeholder="Enter PIN CODE" class="input-field" type="number" id="pin" name="pin" required>
            <label for="input-field" class="input-label">Enter PIN CODE :</label>
            <span class="input-highlight"></span>
          </div>

          <div class="form-group">
            <label for="gender">Gender :</label>
            <div class="radio-input-wrapper">
              <label class="label">
                <input value="Male" name="gender" id="value-2" class="radio-input" type="radio">
                <div class="radio-design"></div>
                <div class="label-text">Male</div>
              </label>
              <label class="label">
                <input value="Female" name="gender" id="value-3" class="radio-input" type="radio">
                <div class="radio-design"></div>
                <div class="label-text">Female</div>
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="crime-type">Crime Type:</label>
            <select class="form-control" id="crime-type" name="crime-type" required>
              <option value="">Select Crime Type</option>
              <option value="Theft">Theft</option>
              <option value="Assault">Assault</option>
              <option value="Vandalism">Vandalism</option>
              <option value="Cyber">Cyber Crime</option>
              <option value="Fraud">Fraud</option>
              <option value="Kidnapping">Kidnapping</option>
              <option value="Political Crime">Political Crime</option>
              <option value="Black Mail">Black Mail</option>
              <option value="Murder">Murder</option>
              <option value="Racketeering">Racketeering</option>
              <option value="Other">Other</option>
            </select>
          </div>


          <div class="form-group">
      <a href="user-map.php">
              <button type="button" name="location" class="location-button">Select Location</button>
      </a>
    </div>


          <div class="form-group">
            <div class="input-container">
              <input placeholder="Enter Date" class="input-field" type="date" id="date" name="date" required>
              <label for="input-field" class="input-label">Enter Date :</label>
              <span class="input-highlight"></span>
            </div>

            <div class="form-group">
              <div class="input-container">
                <input placeholder="Enter Time" class="input-field" type="time" id="time" name="time" required>
                <label for="input-field" class="input-label">Enter Time :</label>
                <span class="input-highlight"></span>
              </div>

            </div>
            <div class="form-group">
              <div class="input-container">
                <textarea placeholder="Description" class="input-field" id="Description" name="description" required></textarea>
                <label for="input-field" class="input-label">Description :</label>
                <span class="input-highlight"></span>
              </div>

            </div>

            <div class="wrapper">
              <div class="block">
                <button class="button success" name="submit">Submit
                </button>
              </div>
            </div>
            <!-- <div class="wrapper">
              <div class="block"><a href="select_location.html" class="button success" name="submit" id="submit">Select Locations</a></div>
            </div> -->
            <!-- <div class="wrapper">
              <div class="block"><button class="button success" name="submit" href="select_location.html">Submit</button></div>
            </div> -->

    </form>
  </main>
  <footer>
    <center>
      &copy; 2024 Crime Hotspot Mapping & Behavioral Analysis Interface
    </center>
  </footer>
  <script>
    function openMap()
    {
      // Open Google Maps in a new window or tab
      window.open('https://www.google.com/maps');
    }
  </script>

  <script>
    var animateButton = function(e)
    {
      e.preventDefault;
      //reset animation
      e.target.classList.remove('animate');

      e.target.classList.add('animate');

      e.target.classList.add('animate');
      setTimeout(function() {
        e.target.classList.remove('animate');
      }, 6000);
    };

    var classname = document.getElementsByClassName("button");

    for (var i = 0; i < classname.length; i++) {
      classname[i].addEventListener('click', animateButton, false);
    }
  </script>

</body>

</html>


<?php
// Start the session at the beginning of the script
// session_start();

// Check if the user session is set
if (!isset($_SESSION['user_sno'])) {
  // Redirect the user or display an error message
  echo "User session not found.";
  exit; // Stop further execution
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Retrieve the user's sno from the session if it's set
  if (isset($_SESSION['user_sno'])) {
    $user_sno = $_SESSION['user_sno'];

    // Database connection
    $connect = mysqli_connect("localhost", "root", "", "hackathon_2024");

    // Check if the connection is successful
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    // Escape user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $gender = mysqli_real_escape_string($connect, $_POST['gender']);
    $state = mysqli_real_escape_string($connect, $_POST['state']);
    $city = mysqli_real_escape_string($connect, $_POST['city']);
    $pin = mysqli_real_escape_string($connect, $_POST['pin']);
    $crime_type = mysqli_real_escape_string($connect, $_POST['crime-type']);
    $date = mysqli_real_escape_string($connect, $_POST['date']);
    $time = mysqli_real_escape_string($connect, $_POST['time']);
    $disc = mysqli_real_escape_string($connect, $_POST['description']);

    // Attempt to insert data into the Crime table
    $insert_query = "INSERT INTO Crime (user_sno, Name, Gender, State, City, Pin_Code, Crime_Type, Date, Time, Description) 
                         VALUES ('$user_sno', '$name', '$gender', '$state', '$city', '$pin', '$crime_type', '$date', '$time', '$disc')";

    if (mysqli_query($connect, $insert_query)) {
      echo "Record inserted successfully.";
      // Retrieve the last inserted crime ID
      $crime_id = mysqli_insert_id($connect);

      echo "Crime ID: " . $crime_id; // Debug statement

      // Store the crime ID in the session
      // $_SESSION['crime_id'] = $crime_id;

      // $_SESSION['crime_id'] = $row['id']; 


    } else {
      echo "Error: " . $insert_query . "<br>" . mysqli_error($connect);
    }

    // Close the database connection
    mysqli_close($connect);
  } else {
    // Handle the case where $_SESSION['user_sno'] is not set
    echo "User session not found.";
  }
} else {
  // Handle the case where the form is not submitted
  echo "Form not submitted.";
}

?>




<?php

// Include the Python script execution code here if necessary
$command = escapeshellcmd('python c:\xampp\htdocs\test\hackathon_2024\php\index.py');
$output = shell_exec($command);
echo $output;

?>