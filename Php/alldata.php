<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIR Data Analysis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
                    <!-- <th>Location</th> -->
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


                $extract = mysqli_query($connect, "SELECT Crime.*, locations.* FROM Crime LEFT JOIN locations ON Crime.id = locations.id");

                while ($row = mysqli_fetch_assoc($extract)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['user_sno'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['State'] . "</td>";
                    echo "<td>" . $row['City'] . "</td>";
                    echo "<td>" . $row['Pin_Code'] . "</td>";
                    echo "<td>" . $row['Crime_Type'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "<td>" . $row['Time'] . "</td>";
                    echo "<td>" . $row['Description'] . "</td>";
                    echo "<td>" . $row['lat'] . "</td>";
                    echo "<td>" . $row['lng'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['location_status'] . "</td>";
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
        </div>
</body>
</html>
