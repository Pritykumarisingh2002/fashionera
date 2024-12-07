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
        session_start();
        $servername = "localhost";
        $dbname = "mydata";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT max(Id) as id from application_form";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];

            $Portfolio = htmlspecialchars($_POST['portfolio']);
            $Resume = htmlspecialchars($_POST['resume']);
            $Photo = htmlspecialchars($_POST['photo']);
            $Additional = htmlspecialchars($_POST['additional']);
            $Break = $_POST['break'];
            $OtherCourse = $_POST['otherCourse'];
            $Backlogs = htmlspecialchars($_POST['backlogs']);

            $sql = "UPDATE application_form set Portfolio=:portfolio, Resume=:resume, Photo=:photo, Addfiles=:addition, Q1=:q1, Q2=:q2, Q3=:q3 where Id=:id";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":portfolio", $Portfolio);
            $stmt->bindParam(":resume", $Resume);
            $stmt->bindParam(":photo", $Photo);
            $stmt->bindParam(":addition", $Additional);
            $stmt->bindParam(":q1", $Break);
            $stmt->bindParam(":q2", $OtherCourse);
            $stmt->bindParam(":q3", $Backlogs);

            $stmt->execute();
            header("Location: preview.php");
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
            <p><b>OTHER DETAILS</b></p>
    </div>
    <form class="row g-3" method="POST">
        <div class="col-md-6">
            <label for="inputPortfolio" class="form-label"><b>Portfolio<span style="color:red">*</span></b></label>
            <input type="file" accept=".pdf" class="form-control" name="portfolio" id="inputPortfolio" placeholder="Enter your most recent degree" required>
        </div>
        <div class="col-md-6">
            <label for="inputResume" class="form-label"><b>Resume<span style="color:red">*</span></b></label>
            <input type="file" accept=".pdf" class="form-control" name="resume" id="inputResume" required>
        </div>
        <div class="col-md-6">
            <label for="inputPhoto" class="form-label"><b>Upload photo<span style="color:red">*</span></b></label>
            <input type="file" accept=".jpg,.jpeg,.png" class="form-control" name="photo" id="inputPhoto" required>
        </div>
        <div class="col-md-6">
            <label for="inputAdditional" class="form-label"><b>Additional Files</b></label>
            <input type="file" accept=".pdf" class="form-control" name="additional" id="inputAdditional" required>
        </div>
        <div class="col-12">
            <label style="text-align:center" class="form-label"><b>Are there any break in studies ?<span style="color:red">*</span></b></label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="yes" name="break" id="Yes" required>
                <label class="form-check-label" for="Yes">
                    Yes
                </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="no" name="break" id="No" checked required>
                    <label class="form-check-label" for="No">
                        No
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <label style="text-align:center" class="form-label"><b>Have you done any other course ?<span style="color:red">*</span></b></label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="yes" name="otherCourse" id="Yes" required>
                <label class="form-check-label" for="Yes">
                    Yes
                </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="no" name="otherCourse" id="No" checked required>
                    <label class="form-check-label" for="No">
                        No
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <label style="text-align:center" class="form-label"><b>Do you have any pending backlogs
                    currently ?<span style="color:red">*</span>
                </b></label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="yes" name="backlogs" id="Yes" required>
                <label class="form-check-label" for="Yes">
                    Yes
                </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="no" name="backlogs" id="No" checked required>
                    <label class="form-check-label" for="No">
                        No
                    </label>
                </div>
            </div>
        </div>
        <div class="col-6" style="text-align:left">
            <a href="academic.php" class="btn btn-primary">Back</a>
        </div>
        <div class="col-6" style="text-align:right">
            <button type="submit"  onclick="myFunction()" class="btn btn-primary">Save</button>
            <script>
                function myFunction() {
                    alert("Are you sure, you want to save changes.");
                }
            </script>
        </div>
    </Form>
    </Form>
</body>

</html>