<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <style>
        #gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        #gallery img {
            width: 200px;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .gallery-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .action-buttons {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    
    <h2>Gallery</h2>
    <div id="gallery">
        <?php
        $servername = "localhost";
        $dbname = "mydata";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
                $imageId = $_POST['image_id'];
                $deleteSql = "DELETE FROM gallery WHERE id = :id";
                $deleteStmt = $conn->prepare($deleteSql);
                $deleteStmt->execute(['id' => $imageId]);
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
                $imageId = $_POST['image_id'];
                if (isset($_FILES['new_image_url']) && $_FILES['new_image_url']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/'; 
                    $uploadedFile = $uploadDir . basename($_FILES['new_image_url']['name']);
                    if (move_uploaded_file($_FILES['new_image_url']['tmp_name'], $uploadedFile)) {
                        $updateSql = "UPDATE gallery SET images = :images WHERE id = :id";
                        $updateStmt = $conn->prepare($updateSql);
                        $updateStmt->execute(['images' => $uploadedFile, 'id' => $imageId]);
                        header("Location: " . $_SERVER['PHP_SELF']); 
                        exit;
                    } else {
                        echo "Error uploading the file.";
                    }
                }
            }

            $sql = "SELECT id, images FROM gallery";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($images as $image) {
                echo '<div class="gallery-item">';
                echo '<img src="' . htmlspecialchars($image['images']) . '" alt="Gallery Image">';
                echo '<div class="action-buttons">';
                echo '<form method="POST" style="display:inline;">';
                echo '<input type="hidden" name="image_id" value="' . $image['id'] . '">';
                echo '<button type="submit" name="delete">Delete</button>';
                echo '</form>';
                echo '<form method="POST" enctype="multipart/form-data" style="display:inline; margin-left: 5px;">';
                echo '<input type="hidden" name="image_id" value="' . $image['id'] . '">';
                echo '<input type="file" name="new_image_url" required>';
                echo '<button type="submit" name="edit">Edit</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>
