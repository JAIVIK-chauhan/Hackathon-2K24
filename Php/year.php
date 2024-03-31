<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .input__container--variant {
  background: linear-gradient(to bottom, #F3FFF9, #F3FFF9);
  border-radius: 30px;
  max-width: 13em;
  padding: 1em 1em;
}

.shadow__input--variant {
  filter: blur(25px);
  border-radius: 30px;
  background-color: #F3FFF9;
  opacity: 0.5;
}

.input__button__shadow--variant {
  border-radius: 15px;
  background-color: #07372C;
  padding: 10px;
  border: none;
}

.input__button__shadow--variant:hover {
  background-color: #3C6659;
}

.input__search--variant {
  width: 13em;
  align-items: center;
  border-radius: 13em;
  outline: none;
  border: none;
  padding: 0.8em;
  font-size: 1.2em;
  color: #002019;
  background-color: transparent;
}

.input__search--variant::placeholder {
  color: #002019;
  opacity: 0.7;
}

.input__container--variant {
  background: linear-gradient(to bottom, #F3FFF9, #F3FFF9);
  border-radius: 1.5em;
  max-width: 14em;
  padding: 1em;
  box-shadow: 0em 1em 3em #beecdc64;
}
body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        #analysis {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        #analysis th, #analysis td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        #analysis th {
            background-color: #f2f2f2;
        }

        @media screen and (max-width: 600px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
        }
 

    </style>
</head>
<body>
<div class="input__container input__container--variant">
        <div class="shadow__input shadow__input--variant"></div>
        <form method="post">
            <input type="year" name="year" class="input__search input__search--variant" placeholder="Search Year...">
            <button type="submit" class="input__button__shadow input__button__shadow--variant" name="submit">
                <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" height="1.5em" width="13em">
                    <path d="M4 9a5 5 0 1110 0A5 5 0 014 9zm5-7a7 7 0 104.2 12.+26.999.999 0 00.093.107l3 3a1 1 0 001.414-1.414l-3-3a.999.999 0 00-.107-.093A7 7 0 009 2z" fill-rule="evenodd" fill="#FFF"></path>
                </svg>
            </button>
        </form>
    </div>
    <div class="container">
        <h1>FIR Data Analysis</h1>
        <table id="analysis">
    <thead>
        <tr>
            <th>Id</th>
            <th>User Sno</th>
            <th>Name</th>
            <th>State</th>
            <th>City</th>
            <th>PIN Code</th>
            <th>Crime Type</th>
            <th>Date</th>
            <th>Time</th>
            <th>Description</th>
            <th>latitude</th>
            <th>longitude</th>
            <th>description</th>
            <th>Location Status</th>
        </tr>
    </thead>
    <tbody id="analysisData">
        <?php
        require("connect.php");

        if (isset($_POST['submit'])) {
            $year = $_POST['year'];

            $crime_query = "SELECT * FROM Crime WHERE YEAR(Date) = '$year'";
            $crime_result = mysqli_query($connect, $crime_query);

            while ($crime_row = mysqli_fetch_assoc($crime_result)) {
                echo "<tr>";
                echo "<td>".$crime_row['id']."</td>";
                echo "<td>".$crime_row['user_sno']."</td>";
                echo "<td>".$crime_row['Name']."</td>";
                echo "<td>".$crime_row['State']."</td>";
                echo "<td>".$crime_row['City']."</td>";
                echo "<td>".$crime_row['Pin_Code']."</td>";
                echo "<td>".$crime_row['Crime_Type']."</td>";
                echo "<td>".$crime_row['Date']."</td>";
                echo "<td>".$crime_row['Time']."</td>";
                echo "<td>".$crime_row['Description']."</td>";

                $location_query = "SELECT * FROM locations WHERE id = ".$crime_row['id'];
                $location_result = mysqli_query($connect, $location_query);

                // Display all corresponding location details
                while ($location_row = mysqli_fetch_assoc($location_result)) {
                    echo "<td>".$location_row['lat']."</td>";
                    echo "<td>".$location_row['lng']."</td>";
                    echo "<td>".$location_row['description']."</td>";
                    echo "<td>".$location_row['location_status']."</td>";
                    echo "</tr>";
                }
            }
        }
        ?>
    </tbody>
</table>
    </div>
</body>
</html>

