<?php
if(isset($_POST['Fname'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "test_one"; // Replace with your actual database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $Fname = $_POST["Fname"];
        $Lname = $_POST["Lname"];
        $add = $_POST["add"];
        $gender = $_POST["gender"];
        $hobbyArray = $_POST["hobby"]; // Get the array of hobbies
        $hobby = implode(', ', $hobbyArray); // Convert the array to a comma-separated string
        $country = $_POST["country"];

        $sql = "INSERT INTO `htmlform` (`First_Name`, `Last_Name`, `address`, `gender`, `hobby`, `country`, `date`, `time`)
                VALUES ('$Fname', '$Lname', '$add', '$gender', '$hobby', '$country', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .form-group label {
            font-weight: bold;
        }

        .form-check-label {
            font-weight: normal;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST">
                    <h1 class="pb-lg-5">Registration form!</h1>
                    <div class="form-group">
                        <label for="Fname">First Name:</label>
                        <input type="text" class="form-control" id="Fname" name="Fname" placeholder="Enter your first name" required>
                    </div>
                    <div class="form-group">
                        <label for="Lname">Last Name:</label>
                        <input type="text" class="form-control" id="Lname" name="Lname" placeholder="Enter your last name" required>
                    </div>
                    <div class="form-group">
                        <label for="add">Address:</label>
                        <textarea class="form-control" id="add" name="add" rows="2" placeholder="Enter your address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" value="male" id="male" required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" value="female" id="female" required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">Area of Interest:</label>
                        <select class="form-control" id="country" name="country" style="width: 100%;" required>
                            <option value="artificial intelligence">Artificial Intelligence</option>
                            <option value="machine learning">Machine Learning</option>
                            <option value="web development">Web Development</option>
                            <option value="app development">App Development</option>
                            <option value="prompt engineer">Prompt Engineer</option>
                            <option value="prompt engineer">Internet of things</option>
                            <option value="prompt engineer">data science</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hobbies:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="hobby[]" value="cricket" id="cricket">
                            <label class="form-check-label" for="cricket">Cricket</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="hobby[]" value="football" id="football">
                            <label class="form-check-label" for="football">Football</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="hobby[]" value="hockey" id="hockey">
                            <label class="form-check-label" for="hockey">Hockey</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <select class="form-control" id="country" name="country" style="width: 100%;" required>
                            <option value="india">India</option>
                            <option value="pakistan">Pakistan</option>
                            <option value="africa">Africa</option>
                            <option value="china">China</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
