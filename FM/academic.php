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

        $sql="SELECT max(Id) as id from application_form";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row= $stmt->fetch(PDO::FETCH_ASSOC);
        $id=$row['id'];

        $Degree = htmlspecialchars($_POST['degree']);
        $Institute = htmlspecialchars($_POST['institute']);
        $Reg = htmlspecialchars($_POST['reg']);
        $Uni = htmlspecialchars($_POST['uni']);
        $Sdate = $_POST['sdate'];
        $Edate = $_POST['edate'];
        $Marks = htmlspecialchars($_POST['marks']);
        $Cadd = htmlspecialchars($_POST['cadd']);
        $Ccity = htmlspecialchars($_POST['ccity']);
        $Cstate = htmlspecialchars($_POST['cstate']);
        $Czip = htmlspecialchars($_POST['czip']);

        $sql = "update application_form set Degree=:degree, Institute=:institute, Reg=:reg, Uni=:uni, Sdate=:sdate, Edate=:edate, Marks=:marks, Cadd=:cadd, Ccity=:ccity, Cstate=:cstate, Czip=:czip where Id =:id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":degree", $Degree);
        $stmt->bindParam(":institute", $Institute);
        $stmt->bindParam(":reg", $Reg);
        $stmt->bindParam(":uni", $Uni);
        $stmt->bindParam(":sdate", $Sdate);
        $stmt->bindParam(":edate", $Edate);
        $stmt->bindParam(":marks", $Marks);
        $stmt->bindParam(":cadd", $Cadd);
        $stmt->bindParam(":ccity", $Ccity);
        $stmt->bindParam(":cstate", $Cstate);
        $stmt->bindParam(":czip", $Czip);

        $stmt->execute();
        header("Location: another.php");
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
            <p><b>ACADEMIC DETAILS</b></p>
    </div>
    <form class="row g-3" method="POST">
    <div class="col-md-6">
            <label for="inputDegree" class="form-label"><b>Degree <span style="color:red">*</span></b></label>
            <select id="inputDegree" name="degree" class="form-select" required>
                <option selected>Choose</option>
                <option>Bachelor's in Techcnology (B.tech)</option>
                <option>Bachelor's in Science (B.Sc)</option>
                <option>Diploma (3 years)</option>
                <option>Intermediate</option>
                <option>Master's in Technology (M.tech)</option>
                <option>Master's in Science (M.Sc)</option>
                <option>Secondary</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputCollege" class="form-label"><b>College/Institute <span style="color:red">*</span></b></label>
            <input type="text" name="institute" class="form-control" id="inputCollege" required>
        </div>
        <div class="col-md-6">
            <label for="inputReg" class="form-label"><b>Registration/Roll No. <span style="color:red">*</span></b></label>
            <input type="text" name="reg" class="form-control" id="inputReg" required>
        </div>
        <div class="col-md-6">
            <label for="inputUniversity" class="form-label"><b>University <span style="color:red">*</span></b></label>
            <input type="text" name="uni" class="form-control" id="inputUniversity" required>
        </div>
        <div class="col-md-6">
            <label for="inputSdate" class="form-label"><b>Start date <span style="color:red">*</span></b></label>
            <input type="date" name="sdate" class="form-control" id="inputSdate" required>
        </div>
        <div class="col-md-6">
            <label for="inputEdate" class="form-label"><b>End date <span style="color:red">*</span></b></label>
            <input type="date" name="edate" class="form-control" id="inputEdate" required>
        </div>
        <div class="col-md-6">
            <label for="inputMarks" class="form-label"><b>Marks % <span style="color:red">*</span></b></label>
            <input type="text" name="marks" class="form-control" id="inputMarks" required>
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label"><b>Address <span style="color:red">*</span></b></label>
            <input type="text" name="cadd" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label"><b>City <span style="color:red">*</span></b></label>
            <input type="text" name="ccity" class="form-control" id="inputCity" required>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label"><b>State <span style="color:red">*</span></b></label>
            <select id="inputState" name="cstate" class="form-select" required>
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
        <div class="col-md-4">
            <label for="inputZip" class="form-label"><b>Zip <span style="color:red">*</span></b></label>
            <input type="text" name="czip" class="form-control" id="inputZip" required>
        </div>
        <div class="col-6" style="text-align:left">
           <a href="index.php" class="btn btn-primary">Back</a>
        </div>
        <div class="col-6" style="text-align:right">
        <button type="submit" onclick="myFunction()" class="btn btn-primary">Save & Next</button>
        <script>
                function myFunction() {
                    alert("Do you want to save changes you have made? You can't edit details after saving details.");
                }
            </script>
        </div>
    </Form>
</body>

</html>