<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Forms with Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="file"],
        input[type="text"],
        input[type="date"],
        input[type="time"],
        button,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="submit"],
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #45a049;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Dashboard</h1>
 -->
        <!-- Image Upload Form -->
        <!-- <section>
            <h2>Upload an Image</h2>
            <?php
            // $servername = "localhost";
            // $dbname = "mydata";
            // $username = "root";
            // $password = "";

            // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_image'])) {
            //     try {
            //         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //         if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            //             $allowedTypes = ['image/jpeg', 'image/jpg'];
            //             if (!in_array($_FILES['image']['type'], $allowedTypes)) {
            //                 throw new Exception("Invalid file type. Only JPG/JPEG allowed.");
            //             }

            //             $uploadDir = 'uploads/';
            //             if (!is_dir($uploadDir)) {
            //                 mkdir($uploadDir, 0777, true);
            //             }

            //             $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            //             $targetFile = $uploadDir . $fileName;

            //             if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            //                 $sql = "INSERT INTO gallery (images) VALUES (:image)";
            //                 $stmt = $conn->prepare($sql);
            //                 $stmt->bindParam(':image', $targetFile);
            //                 $stmt->execute();
            //                 echo "<p class='success'>Image uploaded successfully!</p>";
            //             } else {
            //                 throw new Exception("Failed to move uploaded file.");
            //             }
            //         } else {
            //             throw new Exception("No file uploaded or an error occurred.");
            //         }
            //     } catch (Exception $e) {
            //         echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
            //     }
            // }
            // ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Select Image (JPG/JPEG only):</label>
                    <input type="file" id="image" accept=".jpg,.jpeg" name="image" required>
                </div>
                <input type="submit" name="upload_image" value="Upload">
            </form>
            <form action="index1.php">
                <input type="submit" value="Edit Image" name="edit_image">
            </form>
        </section> -->

        <!-- Event Form -->
        <!-- <section>
            <h2>Add Upcoming Event</h2>
            <?php
            // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_event'])) {
            //     try {
            //         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //         $date = $_POST['date'];
            //         $stime = $_POST['stime'];
            //         $etime = $_POST['etime'];
            //         $location = $_POST['location'];

            //         if (!empty($date) && !empty($stime) && !empty($etime) && !empty($location)) {
            //             $sql = "INSERT INTO upcoming_events (date, stime, etime, location) VALUES (:date, :stime, :etime, :location)";
            //             $stmt = $conn->prepare($sql);
            //             $stmt->bindParam(':date', $date);
            //             $stmt->bindParam(':stime', $stime);
            //             $stmt->bindParam(':etime', $etime);
            //             $stmt->bindParam(':location', $location);
            //             $stmt->execute();
            //             header("location:index.php#events"); -->
                        // echo "<p class='success'>Event added successfully!</p>";
            //         } else {
            //             throw new Exception("All fields are required.");
            //         }
            //     } catch (Exception $e) {
            //         echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
            //     }
            // }
            // ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="date">Event Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="stime">Start Time:</label>
                    <input type="time" id="stime" name="stime" required>
                </div>
                <div class="form-group">
                    <label for="etime">End Time:</label>
                    <input type="time" id="etime" name="etime" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
                </div>
                <input type="submit" name="add_event" value="Add Event">

            </form>
            <form action="upcoming_event.php" method="POST">
                </from>
                <input type="submit" name="edit_event" value="Edit Event">
            </form>
        </section>

    </div>

</body>

</html> -->