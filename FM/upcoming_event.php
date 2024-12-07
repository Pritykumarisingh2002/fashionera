<?php
// $servername = "localhost";
// $dbname = "mydata";
// $username = "root";
// $password = "";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // Insert Event
//     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_event'])) {
//         $date = $_POST["date"];
//         $stime = $_POST["stime"];
//         $etime = $_POST["etime"];
//         $location = $_POST["location"];

//         $sql = "INSERT INTO upcoming_events (date, stime, etime, location) VALUES (:date, :stime, :etime, :location)";
//         $stmt = $conn->prepare($sql);
//         $stmt->bindParam(":date", $date);
//         $stmt->bindParam(":stime", $stime);
//         $stmt->bindParam(":etime", $etime);
//         $stmt->bindParam(":location", $location);
//         $stmt->execute();

//         header("location:index.php#events");
//         exit();
//     }

//     // Update Event
//     if (isset($_POST['update_event'])) {
//         $id = $_POST['event_id'];
//         $date = $_POST['date'];
//         $stime = $_POST['stime'];
//         $etime = $_POST['etime'];
//         $location = $_POST['location'];

//         $sql = "UPDATE upcoming_events SET date = :date, stime = :stime, etime = :etime, location = :location WHERE id = :id";
//         $stmt = $conn->prepare($sql);
//         $stmt->bindParam(":id", $id);
//         $stmt->bindParam(":date", $date);
//         $stmt->bindParam(":stime", $stime);
//         $stmt->bindParam(":etime", $etime);
//         $stmt->bindParam(":location", $location);
//         $stmt->execute();

//         header("location:index.php#events");
//         exit();
//     }

//     // Delete Event
//     if (isset($_GET['delete_event_id'])) {
//         $id = $_GET['delete_event_id'];
//         $sql = "DELETE FROM upcoming_events WHERE id = :id";
//         $stmt = $conn->prepare($sql);
//         $stmt->bindParam(":id", $id);
//         $stmt->execute();

//         header("location:index.php#events");
//         exit();
//     }
//     $events = $conn->query("SELECT * FROM upcoming_events ORDER BY date ASC")->fetchAll(PDO::FETCH_ASSOC);

// } catch (PDOException $e) {
//     echo "Database Error: " . $e->getMessage();
// } catch (Exception $e) {
//     echo "Error: " . $e->getMessage();
// }
// ?>

<!-- // <h1>Upcoming Events</h1>
// <form action="" method="POST">
//     <input type="date" name="date" required>
//     <input type="time" name="stime" required>
//     <input type="time" name="etime" required>
//     <input type="text" name="location" placeholder="Event Location" required>
//     <input type="submit" name="add_event" value="Add Event">
// </form>

// <h2>Event List</h2>
// <table border="1">
//     <tr>
//         <th>Date</th>
//         <th>Start Time</th>
//         <th>End Time</th>
//         <th>Location</th>
//         <th>Actions</th>
//     </tr>
//     <?php foreach ($events as $event): ?>
//         <tr>
//             <td><?php echo $event['date']; ?></td>
//             <td><?php echo $event['stime']; ?></td>
//             <td><?php echo $event['etime']; ?></td>
//             <td><?php echo $event['location']; ?></td>
//             <td>
//                 <a href="?edit_event_id=<?php echo $event['id']; ?>">Edit</a> |
//                 <a href="?delete_event_id=<?php echo $event['id']; ?>" onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
//             </td>
//         </tr>
//     <?php endforeach; ?>
// </table> -->

// <!-- Edit Event Form -->
<!-- // <?php if (isset($_GET['edit_event_id'])): ?>
//     <?php -->
//         $id = $_GET['edit_event_id'];
//         $stmt = $conn->prepare("SELECT * FROM upcoming_events WHERE id = :id");
//         $stmt->bindParam(":id", $id);
//         $stmt->execute();
//         $event = $stmt->fetch(PDO::FETCH_ASSOC);
    // ?>
    <!-- <h3>Edit Event</h3>
    <form action="" method="POST">
        <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
        <input type="date" name="date" value="<?php echo $event['date']; ?>" required>
        <input type="time" name="stime" value="<?php echo $event['stime']; ?>" required>
        <input type="time" name="etime" value="<?php echo $event['etime']; ?>" required>
        <input type="text" name="location" value="<?php echo $event['location']; ?>" required>
        <input type="submit" name="update_event" value="Update Event">
    </form> -->
<!-- <?php endif; ?> -->
