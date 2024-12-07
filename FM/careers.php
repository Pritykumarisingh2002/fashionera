<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="padding:10px">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body style="padding:10px">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $dbname = "mydata";
            $username = "root";
            $password = "";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $Fname = $_POST['fname'];
                $Mname = $_POST['mname'];
                $Lname = $_POST['lname'];
                $College = $_POST['college'];
                $Father = $_POST['father'];
                $DOB = $_POST['dob'];
                $Con = $_POST['con'];
                $Altcon = $_POST['altcon'];
                $Gender = $_POST['gender'];
                $Email = $_POST['email'];
                $Pass = $_POST['pass'];
                $Add1 = $_POST['add1'];
                $Add2 = $_POST['add2'];
                $City = $_POST['city'];
                $State = $_POST['state'];
                $Zip = $_POST['zip'];
                $Country = $_POST['country'];

                $sql = "INSERT INTO application_form (Fname, Mname, Lname, College, Father, DOB, Con, Altcon, Gender, Email, Pass, Add1, Add2, City, State, Zip, Country)
                VALUES (:fname, :mname, :lname, :college, :father, :dob, :con, :altcon, :gender, :email, :pass, :add1, :add2, :city, :state, :zip, :country)";
                $stmt = $conn->prepare($sql);

                $stmt->bindParam(":fname", $Fname);
                $stmt->bindParam(":mname", $Mname);
                $stmt->bindParam(":lname", $Lname);
                $stmt->bindParam(":college", $College);
                $stmt->bindParam(":father", $Father);
                $stmt->bindParam(":dob", $DOB);
                $stmt->bindParam(":con", $Con);
                $stmt->bindParam(":altcon", $Altcon);
                $stmt->bindParam(":gender", $Gender);
                $stmt->bindParam(":email", $Email);
                $stmt->bindParam(":pass", $Pass);
                $stmt->bindParam(":add1", $Add1);
                $stmt->bindParam(":add2", $Add2);
                $stmt->bindParam(":city", $City);
                $stmt->bindParam(":state", $State);
                $stmt->bindParam(":zip", $Zip);
                $stmt->bindParam(":country", $Country);

                $stmt->execute();

                header("Location: academic.php");
                exit();
            } catch (PDOException $e) {
                echo "<p class='text-danger'>Error: " . $e->getMessage() . "</p>";
            }
        }
        ?>

        <div class="text-center">
            <h4><span style="color:red">FASHION</span><span style="color:blue">ERA</span></h2>
                <p><b><span style="color: red;">F</span>ashion <span style="color: red;">M</span>eets <span style="color: red;">T</span>radition</b></p>
                <p><b>FASHIONERA APPLICATION FORM</b></p>
                <p><b>PERSONAL DETAILS</b></p>
        </div>
        <form class="row g-3" method="POST">
            <div class="col-md-3">
                <label for="salutation" class="form-label"><b>Select a title <span style="color:red">*</span></b></label>
                <select name="salutation" id="salutation" class="form-select" required>
                    <option selected="">Please pick one</option>
                    <option>Mr.</option>
                    <option>Mrs.</option>
                    <option>Miss.</option>
                    <option>Dr.</option>
                    <option>Prof.</option>
                    <option>Other</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="inputFname" class="form-label"><b>First Name <span style="color:red">*</span></b></label>
                <input type="text" name="fname" class="form-control" id="inputFname" required>
            </div>
            <div class="col-md-3">
                <label for="inputMname" class="form-label"><b>Middle Name </b></label>
                <input type="text" name="mname" class="form-control" id="inputMname">
            </div>
            <div class="col-md-3">
                <label for="inputLname" class="form-label"><b>Last Name <span style="color:red">*</span></b></label>
                <input type="text" name="lname" class="form-control" id="inputLname" required>
            </div>
            <div class="col-md-6">
                <label for="inputCollege" class="form-label"><b>College/Institute <span style="color:red">*</span></b></label>
                <input type="text" name="college" class="form-control" id="inputCollege" required>
            </div>
            <div class="col-md-6">
                <label for="inputFather" class="form-label"><b>Father's Name</b></label>
                <input type="text" name="father" class="form-control" id="inputFather" required>
            </div>
            <div class="col-md-3">
                <label for="inputDOB" class="form-label"><b>Date Of Birth <span style="color:red">*</span></b></label>
                <input type="date" name="dob" class="form-control" id="inputDOB" required>
            </div>
            <div class="col-md-3">
                <label for="inputCon" class="form-label"><b>Contact Number <span style="color:red">*</span></b></label>
                <input type="number" name="con" class="form-control" id="inputCon" required>
            </div>
            <div class="col-md-3">
                <label for="inputAlt" class="form-label"><b>Alternate Contact Number</b></label>
                <input type="number" name="altcon" class="form-control" id="inputAlt">
            </div>
            <div class="col-md-3">
                <div>
                    <label class="form-label"><b>Gender <span style="color:red">*</span></b></label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="gender" type="radio" id="male" value="Male" required>
                    <label class="form-check-label" for="male">
                        Male
                    </label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="gender" type="radio" id="female" value="Female" checked required>
                        <label class="form-check-label" for="female">
                            Female
                        </label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="gender" type="radio" id="others" value="Others" checked required>
                            <label class="form-check-label" for="others">
                                Others
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label"><b>Email <span style="color:red">*</span></b></label>
                <input type="email" name="email" class="form-control" id="inputEmail4" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label"><b>Password <span style="color:red">*</span></b></label>
                <input type="password" name="pass" class="form-control" id="inputPassword4" required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label"><b>Address <span style="color:red">*</span></b></label>
                <input type="text" name="add1" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label"><b>Address 2</b> </label>
                <input type="text" name="add2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-3">
                <label for="inputCity" class="form-label"><b>City <span style="color:red">*</span></b></label>
                <input type="text" name="city" class="form-control" id="inputCity"required>
            </div>
            <div class="col-md-3">
                <label for="inputState" class="form-label"><b>State <span style="color:red">*</span></b></label>
                <select id="inputState" name="state" class="form-select" required>
                    <option selected>Choose</option>
                    <option>Jharkhand</option>
                    <option>Delhi</option>
                    <option>Uttar Pradesh</option>
                    <option>Rajasthan</option>
                    <option>Himachal Pradesh</option>
                    <option>Madhya Pradesh</option>
                    <option>Bihar</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="inputZip" class="form-label"><b>Zip <span style="color:red">*</span></b></label>
                <input type="text" name="zip" class="form-control" id="inputZip" required>
            </div>
            <div class="col-md-3">
                <label for="inputCountry" class="form-label"><b>Country <span style="color:red">*</span></b></label>
                <select name="country" id="inputCountry" class="form-select" required>
                    <option selected>Choose</option>
                    <option>India</option>
                    <option>China</option>
                    <option>Japan</option>
                    <option>USA</option>
                    <option>Nepal</option>
                    <option>Pakistan</option>
                    <option>Afganistan</option>
                </select>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                    <label class="form-check-label" for="gridCheck">
                        Check me out <span style="color:red">*</span>
                    </label>
                </div>
            </div>
            <div class="col-12" style="text-align:center">
                <button type="submit" onclick="myFunction()" class="btn btn-primary">Save & Next</button>
                <script>
                function myFunction() {
                    alert("Do you want to save changes you have made?\nYou can't edit details after saving details.");
                }
            </script>
                <!-- <a href="academic.php" class="btn btn-primary">Save & Next</a> -->
            </div>
        </Form>
    </body>

    </html>