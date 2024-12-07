<!DOCTYPE html>
<html lang="en">
<!--Created by Prity-->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FASHIONERA</title>

  <!--swiper css-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!--font awesome-->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

  <!--css file-->
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- header section starts  -->
  <header class="header">
    <a href="#" class="logo"><span>FASHION</span>ERA</a>

    <nav class="navbar">
      <a href="#home">Home</a>
      <a href="#events">Events</a>
      <a href="#service">Service</a>
      <a href="#about">About</a>
      <a href="#gallery">Gallery</a>
      <a href="#price">Price</a>
      <a href="#careers">Career</a>
      <a href="#review">Review</a>
      <a href="#contact">Contact</a>
    </nav>

    <div id="menu-bars" class="fas fa-bars"></div>
  </header>

  <!-- home section starts  -->
  <section class="home" id="home">
    <div class="content">
      <h3>
        Where Your Ideas Take Off
        <span> FASHIONERA Events </span>
      </h3>
      <a href="#" class="btn">Get Quote</a>
      <div class="box"></div>
      <i class="fas fa-dropdown"></i>
    </div>
    </div>

    <div class="swiper-container home-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/home1.jpg" alt="" />
        </div>
        <div class="swiper-slide">
          <img src="images/home2.jpg" alt="" />
        </div>
        <div class="swiper-slide">
          <img src="images/home3.jpg" alt="" />
        </div>
        <div class="swiper-slide">
          <img src="images/home4.jpg" alt="" />
        </div>
        <div class="swiper-slide">
          <img src="images/home5.jpg" alt="" />
        </div>
        <div class="swiper-slide">
          <img src="images/home6.jpg" alt="" />
        </div>
      </div>
    </div>
  </section>

  <!-- Upcoming Events starts  -->

  <?php
$servername = "localhost";
$dbname = "mydata";
$username = "root";
$password = "";

// Start the connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to fetch upcoming events
    $sql = "SELECT * FROM upcoming_events ORDER BY date ASC";  // Order events by date
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch all events
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
?>

<section class="events" id="events">
    <h1 class="heading">Upcoming <span>Events</span></h1>
    <div class="box-container">

    <?php
    if ($events) {
        foreach ($events as $event) {
            $formattedDate = date("d-m-Y", strtotime($event['date']));
            $formattedStime = date("g:i A", strtotime($event['stime']));
            $formattedEtime = date("g:i A", strtotime($event['etime']));
            ?>
            <div class="box">
                <i class="fas fa-calendar"></i>
                <h3><?php echo htmlspecialchars($event['location']); ?></h3>
                <p><?php echo $formattedDate; ?></p>
                <p><?php echo $formattedStime . " - " . $formattedEtime; ?></p>
                <p><?php echo htmlspecialchars($event['location']); ?></p>
            </div>
            <?php
        }
    } else {
        echo "<p>No upcoming events available.</p>";
    }
    ?>

    </div>
</section>


  <!-- Our Services starts  -->
  <section class="service" id="service">
    <h1 class="heading">our <span>services</span></h1>

    <div class="box-container">
      <div class="box">
        <i class="fas fa-envelope"></i>
        <h3>Invitation</h3>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro,
          suscipit.
        </p>
      </div>

      <div class="box">
        <i class="fas fa-photo-video"></i>
        <h3>Photos and Videos</h3>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro,
          suscipit.
        </p>
      </div>

      <div class="box">
        <i class="fas fa-music"></i>
        <h3>Entertainment</h3>
        <a type="submit" href="entertainment.php">Entertainment</a>
        <!-- <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro,
          suscipit.
        </p> -->
      </div>

      <div class="box">
        <i class="fas fa-car"></i>
        <h3>Event Vehicles</h3>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro,
          suscipit.
        </p>
      </div>

      <div class="box">
        <i class="fas fa-map-marker-alt"></i>
        <h3>Event Venue</h3>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro,
          suscipit.
        </p>
      </div>

      <div class="box">
        <i class="fas fa-birthday-cake"></i>
        <h3>Celebrations</h3>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro,
          suscipit.
        </p>
      </div>
    </div>
  </section>

  <!-- about section starts  -->
  <section class="about" id="about">
    <h1 class="heading"><span>about</span> us</h1>

    <div class="row">
      <div class="image">
        <img src="images/about.jpg" alt="" />
      </div>

      <div class="content">
        <h3>We don't do fashion. We are fashion.</h3>
        <p>
          All About Eve brings together businesses, brands, and artists in an inspiring environment for women. Style, substance, thought-provoking conversations, and constant motivation to live a more creative, fulfilling life – that’s what we’re all about.
        </p>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat
          vero expedita incidunt provident quibusdam aut odit, numquam
          nesciunt similique nisi.
        </p>
        <a href="#" class="btn">reach us</a>
      </div>
    </div>
  </section>

  <!-- gallery section starts  -->

  <section class="gallery" id="gallery">
    <h1 class="heading">our <span>gallery</span></h1>

    <div class="box-container">
      <?php
        $servername = "localhost";
        $dbname = "mydata";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT images FROM gallery";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($images as $image) {
                $imageSrc = htmlspecialchars($image['images']);
                // echo $imageSrc;
                echo '
                <div class="box">
                    <img src="Adminpanel/' . $imageSrc . '" alt="Gallery Image">
                    <h3 class="title">best events</h3>
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="https://www.whatsapp.com" class="fas fa-share"></a>
                        <a href="' . $imageSrc . '" class="fas fa-eye"></a>
                    </div>
                </div>';
            }
        } catch (Exception $e) {
            echo '<p style="color: red;">Error fetching images: ' . htmlspecialchars($e->getMessage()) . '</p>';
        }
      ?>
    </div>
    
    <!-- <a href="index1.php" style="text-align: center;" class="btn">View More</a> -->
</section>


  <!-- price section starts  -->
  <section class="price" id="price">
    <h1 class="heading">our <span>pricing</span></h1>

    <div class="box-container">
      <div class="box">
        <h3 class="title">basic</h3>
        <h3 class="amount">$879.00</h3>
        <ul>
          <li><i class="fas fa-check"></i>full services</li>
          <li><i class="fas fa-check"></i> decorations</li>
          <li><i class="fas fa-check"></i> music and photos</li>
          <li><i class="fas fa-check"></i> food and drinks</li>
          <li><i class="fas fa-check"></i> invitation card</li>
        </ul>
        <a href="payment.php" class="btn">check out</a>
      </div>

      <div class="box">
        <h3 class="title">prime</h3>
        <h3 class="amount">$799.00</h3>
        <ul>
          <li><i class="fas fa-check"></i>full services</li>
          <li><i class="fas fa-check"></i> decorations</li>
          <li><i class="fas fa-check"></i> music and photos</li>
          <li><i class="fas fa-check"></i> food and drinks</li>
          <li><i class="fas fa-check"></i> invitation card</li>
        </ul>
        <a href="#" class="btn">check out</a>
      </div>

      <div class="box">
        <h3 class="title">luxury</h3>
        <h3 class="amount">$379.00</h3>
        <ul>
          <li><i class="fas fa-check"></i>full services</li>
          <li><i class="fas fa-check"></i> decorations</li>
          <li><i class="fas fa-check"></i> music and photos</li>
          <li><i class="fas fa-check"></i> food and drinks</li>
          <li><i class="fas fa-check"></i> invitation card</li>
        </ul>
        <a href="#" class="btn">check out</a>
      </div>

      <div class="box">
        <h3 class="title">ultra</h3>
        <h3 class="amount">$920.00</h3>
        <ul>
          <li><i class="fas fa-check"></i>full services</li>
          <li><i class="fas fa-check"></i> decorations</li>
          <li><i class="fas fa-check"></i> music and photos</li>
          <li><i class="fas fa-check"></i> food and drinks</li>
          <li><i class="fas fa-check"></i> invitation card</li>
        </ul>
        <a href="#" class="btn">check out</a>
      </div>
    </div>
  </section>

  <section class="careers" id="careers">
    <h1 class="heading"><span>Car</span>eers</h1>

    <div class="row">
      <div class="image">
        <img src="images/careers.jpg" alt="" />
      </div>

      <div class="content">
        <h3>Dream. Discover. Explore. Inspire. With iAspire.</h3>
        <p>
          Are you passionate about technology and innovation? Start your career with Fashionera and own your career journey by bringing your skills, curiosity and best true self to work.
        </p>
        <a href="openings.php" class="btn">Join Us</a>
      </div>
    </div>
  </section>

  <!-- review section starts  -->
  <section class="reivew" id="review">
    <h1 class="heading">client's <span>review</span></h1>

    <div class="review-slider swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide box">
          <i class="fas fa-quote-right"></i>
          <div class="user">
            <img src="images/img1.jpg" alt="" />
            <div class="user-info">
              <h3>nayana</h3>
              <span>happy customer</span>
            </div>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
            dolor dicta cum. Eos beatae eligendi, magni numquam nemo sed ut
            corrupti, ipsam iure nisi unde et assumenda perspiciatis
            voluptatibus nihil.
          </p>
        </div>

        <div class="swiper-slide box">
          <i class="fas fa-quote-right"></i>
          <div class="user">
            <img src="images/img2.jpg" alt="" />
            <div class="user-info">
              <h3>lisa</h3>
              <span>happy customer</span>
            </div>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
            dolor dicta cum. Eos beatae eligendi, magni numquam nemo sed ut
            corrupti, ipsam iure nisi unde et assumenda perspiciatis
            voluptatibus nihil.
          </p>
        </div>

        <div class="swiper-slide box">
          <i class="fas fa-quote-right"></i>
          <div class="user">
            <img src="images/img3.jpg" alt="" />
            <div class="user-info">
              <h3>mary</h3>
              <span>happy customer</span>
            </div>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
            dolor dicta cum. Eos beatae eligendi, magni numquam nemo sed ut
            corrupti, ipsam iure nisi unde et assumenda perspiciatis
            voluptatibus nihil.
          </p>
        </div>

        <div class="swiper-slide box">
          <i class="fas fa-quote-right"></i>
          <div class="user">
            <img src="images/img4.jpg" alt="" />
            <div class="user-info">
              <h3>rose</h3>
              <span>Happy Customer</span>
            </div>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
            dolor dicta cum. Eos beatae eligendi, magni numquam nemo sed ut
            corrupti, ipsam iure nisi unde et assumenda perspiciatis
            voluptatibus nihil.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- contact section starts  -->
  <section class="contact" id="contact">
    <h1 class="heading"><span>Contact</span> us</h1>
    <form action="https://formsubmit.co/10318e35cb9df7ab9d2b8766f99a247e" method="POST">
      <div class="inputBox">
        <input type="text" placeholder="Name" name="name" />
        <input type="email" placeholder="Email" name="email" />
      </div>
      <div class="inputBox">
        <input type="tel" placeholder="Number" name="number" />
        <input type="text" placeholder="Subject" name="subject" />
      </div>
      <textarea
        name="message"
        placeholder="Message"
        id=""
        cols="30"
        rows="10"></textarea>
      <input type="hidden" name="_captcha" value="false">
      <input type="hidden" name="_next" value="https://yourdomain.co/thanks.html">
      <input type="hidden" name="_template" value="table">
      <input type="submit" value="send message" class="btn" />
    </form>
  </section>

  <!-- footer section starts  -->
  <section class="footer">
    <div class="box-container">
      <div class="box">
        <h3>Upcoming Events Venue</h3>
        <!-- <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62205.06282797165!2d77.43531882167969!3d12.983590300000023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3d633dfd8241%3A0x6569c9f14e0fbce3!2sYS%20INTERNATIONAL%20FASHION%20WEEK!5e0!3m2!1sen!2sin!4v1732171769063!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">Bangalore</iframe></p> -->
        <a href="https://maps.app.goo.gl/PAtSHMrtXbTXPe3v7"> <i class="fas fa-map-marker-alt"></i> bangalore </a>
        <a href="https://maps.app.goo.gl/oeP7kTJyDVbjkVMW8"> <i class="fas fa-map-marker-alt"></i> hyderabad </a>
        <a href="https://maps.app.goo.gl/dcmXfYg9hBaSTxC7A"> <i class="fas fa-map-marker-alt"></i> delhi </a>
        <a href="https://maps.app.goo.gl/gmZGGbR9X8SM5CjT8"> <i class="fas fa-map-marker-alt"></i> kolkata </a>
        <a href="https://maps.app.goo.gl/MSG9NJPCX2CdDVrz7"> <i class="fas fa-map-marker-alt"></i> chennai </a>
      </div>

      <div class="box">
        <h3>quick links</h3>
        <a href="#home"> <i class="fas fa-arrow-right"></i> Home </a>
        <a href="#service"> <i class="fas fa-arrow-right"></i> Service </a>
        <a href="#about"> <i class="fas fa-arrow-right"></i> About </a>
        <a href="#gallery"> <i class="fas fa-arrow-right"></i> Gallery </a>
        <a href="#price"> <i class="fas fa-arrow-right"></i> Price </a>
        <a href="#career"> <i class="fas fa-arrow-right"></i> Career </a>
        <a href="#review"> <i class="fas fa-arrow-right"></i> Reivew </a>
        <a href="#contact"> <i class="fas fa-arrow-right"></i> Contact </a>
      </div>

      <div class="box">
        <h3>contact info</h3>
        <a href="tel:8434661464" class="button">Connect With Me</a>
        <a href="tel:8434661464"> <i class="fas fa-phone"></i> +91 8434661464 </a>
        <a href="tel:9525231788"> <i class="fas fa-phone"></i> +91 9525231788 </a>
        <a href="mailto:fashionera@gmail.com"> <i class="fas fa-envelope"></i> fashionera@gmail.com </a>
        <a href="mailto:pritykumarisingh0018@gmail.com"> <i class="fas fa-envelope"></i> pritysingh@gmail.com </a>
        <a href="https://maps.app.goo.gl/PAtSHMrtXbTXPe3v7">
          <i class="fas fa-map-marker-alt"></i> bangalore, india - 560054
        </a>
      </div>

      <div class="box">
        <h3>follow us</h3>
        <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="http"> <i class="fab fa-instagram"></i> instagram </a>
        <a href="https://www.linkedin.com/in/prity-kumari-singh-6a6b9523a/"> <i class="fab fa-linkedin-in"></i> linkedin </a>
      </div>
    </div>

    <div class="credit">
      created by <span>Prity Singh</span> | all rights reserved
    </div>
  </section>

  <!-- theme toggler  -->
  <div class="theme-toggler">
    <div class="toggle-btn">
      <i class="fas fa-cog"></i>
    </div>

    <h3>choose color</h3>

    <div class="buttons">
      <div class="theme-btn" style="background: #ccff33"></div>
      <div class="theme-btn" style="background: #d35400"></div>
      <div class="theme-btn" style="background: #f39c12"></div>
      <div class="theme-btn" style="background: #1abc9c"></div>
      <div class="theme-btn" style="background: #3498db"></div>
      <div class="theme-btn" style="background: #9b59b6"></div>
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script>


  <!--JS file-->
  <script src="app.js"></script>
</body>

</html>