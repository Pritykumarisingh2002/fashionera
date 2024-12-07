<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionera Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container" id="container">
        <section>
            <?php
            $servername = "localhost";
            $dbname = "fm";
            $username = "root";
            $password = "";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $name = $_POST["name"];
                $username = $_POST["username"];
                $password = password_hash($_POST["password"], PASSWORD_BCRYPT);


                $sql = "INSERT into adminsignup(Name,Username,Password)values(:name,:username,:password)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":name", $name);
                $stmt->bindparam(":username", $username);
                $stmt->bindParam(":password", $password);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "error" . $e->getMessage();
            }
            ?>
            <div class="form-container sign-up-container">
                <form method="POST" action="">
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fa fa-facebook-square"></i></a>
                        <a href="#" class="social"><i class="fa fa-google-plus-square"></i></a>
                        <a href="#" class="social"><i class="fa fa-linkedin-square"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                    <input type="text" name="username" id="username" placeholder="Enter your email" required>
                    <input type="text" name="password" id="password" placeholder="Enter your password" required>
                    <button type="submit">Signup</button>
                </form>
            </div>
        </section>


        <section>
            <?php
            $servername = "localhost";
            $dbname = "fm";
            $dbusername = "root";
            $dbpassword = "";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                session_start();

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    $sql = "SELECT * FROM adminsignup WHERE Username = :username";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();

                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user && password_verify($password, $user['Password'])) {
                        $_SESSION['user'] = $user['Name'];
                        echo "Login successfully! Welcome, " . htmlspecialchars($_SESSION["user"]);
                        header("Location: admin.php");
                        exit();
                    } else {
                        echo "<p style='color:red;'>Incorrect username or password.</p>";
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
            <div class="form-container sign-in-container">
                <form method="POST" action="">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fa fa-facebook-square"></i></a>
                        <a href="#" class="social"><i class="fa fa-google-plus-square"></i></a>
                        <a href="#" class="social"><i class="fa fa-linkedin-square" aria-hidden="true"></i>
                    </div>
                    <span>or use your account</span>
                    <input type="text" name="username" id="username" placeholder="Enter your email" required>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    <input type="hidden" name="login" value="true">
                    <a href="#">Forgot your password?</a>
                    <button type="submit">Login</button>
                </form>
            </div>
        </section>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Read how I created this and how you can join the challenge
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
        </p>
    </footer>
    <script src="admin.js"></script>
</body>

</html>