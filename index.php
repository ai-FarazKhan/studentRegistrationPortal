<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PIAIC</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/piaic_logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">



  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>


  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <style>

@media (max-width: 575.98px) {
  #piaic_logo_id{
    height: 120px;
    width: 60px;
  }
}

@media (min-width: 576px) and (max-width: 767.98px) {
  #piaic_logo_id{
    height: 140px;
    width: 80px;
  }
}

@media (min-width: 768px) and (max-width: 991.98px) {
  #piaic_logo_id{
    height: 160px;
    width: 140px;
  }
}
  </style>


</head>

<body>

<script>
  $( document ).ready(function() {
    $('#notification_modal').modal('show');
});
</script>

<?php
  $server_Name = 'localhost';
  $user_Name = 'root';
  $user_Pass = '';
  $db_name = 'piaic_db';

  $setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

  $query_for_notifications = "SELECT * FROM notifications ORDER BY id DESC";
  $running_notification_query = mysqli_query($setting_connection, $query_for_notifications);

?>

<!-- Modal -->
<div class="modal fade" id="notification_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle" style="color:#1f3a93;">Notifications</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php 
        while($row = $running_notification_query->fetch_array()):
      ?>
      <div class="modal-body">
        <p><span style="color:#f15a22;">Notify By: </span><?php echo $row['notify_by']; echo '<br>'; echo '<br>'; echo '<span style="color:#f15a22;">Message: </span>'; echo $row['notifiy_content']; echo '<br>'; echo '<br>'; echo '<span style="color:#f15a22;">Posted At: </span>'; echo date("d-m-Y, g:i a", strtotime($row['time']));?></p>
      </div>
      <hr class="divider" style="background-color: white; width: 400px;">
        <?php endwhile;?>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-lg" data-dismiss="modal">Ok, Got It !!</button>
      </div>
    </div>
  </div>
</div>



  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
         <a href="index.php"><img id="piaic_logo_id" src="img/piaic_logo.png" height="150px" width="150px" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About President</a></li>
          <li class="menu-has-children"><a href="#available_programs">Available Programs</a>
            <ul>
            <li><a href="#">Aritificial Intelligence</a></li>
              <li><a href="#">Cloud Computing</a></li>
              <li><a href="#">Block Chain</a></li>
            </ul>
          </li>
          <li><a href="#registered_users">Registries</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#apply_form">Apply</a></li>
          <!-- <li><a href="Insert_Id_Card.php">Already Applied ?</a></li> -->
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="img/presidential_initiative_2.png" alt=""></div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/piaic.e572d21e.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>President Launching the PIAIC website.</h2>
                <p>President Dr. Arif Alvi launchig the official website of the PIAIC on December 9, 2018. From left to right. MR. Adil Altaf(Director Panacloud), Mr. Zia Ullah Khan (CEO Panacloud), Mr. Hunaid Lakhan (Chancellor Iqra University), President Dr. Arif Alvi, Mr. Sulaiman S. Mehdi(Chairman Pakistan Stock Exchange), Mr. Zeeshan Hanif (CTO Panacloud), Maulana Bashir Farooqui (Founder Saylani Welfare Trust), Mr. Yousuf Lakhani(President Saylani Welfare Trust).</p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/Launching-site-image1.2f88fa1a.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>First meeting with the President.</h2>
                <p>First official PIAIC meeting on November 1st, 2018. From left to right: Mr. Zia Ullah Khan (CEO Panacloud), Mr. Kazi Rahat Ali (General Secretary PIAIC), President Dr. Arif Alvi, Mr Yousuf Lakhani (President Saylani Welfare Trust, Mr Muhammad Ghazzai (COO Saylani Welfare Trust)).</p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/Launching-site-image3.d4d5dfcb.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Meeting with Cheif Secretary Sindh.</h2>
                <p>Meeting with Cheif Secretary of Sindh, Mr. Mumtaz Ali Shah on December 28th, where he assured the PIAIC management team of his full support for the national cause and offered space at all the public universities in Sindh.</p>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">


    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About President</h3>
            <img src="img/president_img.jpg" style="height: 200px; width: 190px; margin: 0 auto;" class="rounded-circle mx-auto d-block" alt="">          
          <p>Dr. Arif Alvi was sworn in as the 13th President of Islamic Republic of Pakistan on 9th September 2018. <br>

Dr. Arif Alvi was born in 1949 and completed his early education in Karachi. He did his Bachelor of Dental Surgery (BDS) from De’ Montmorency College of Dentistry, Lahore where he was declared the “Best Graduate”. He completed his Masters of Science in the field of Prosthodontics from University of Michigan (1975) and in Orthodontics from University of Pacific, San Francisco (1982). He was awarded fellowship ‘Diplomatic American Board of Orthodontists (1995)’. <br>

President Dr. Arif Alvi has been a renowned professional and has held many important positions in the field of Dentistry. He remained Dean of Orthodontics, College of Physicians and Surgeons of Pakistan, President, Pakistan Dental Association (1997-2001), Pakistan Association of Orthodontists (2005), Asia Pacific Dental Federation (2006-07) and Councilor of the World Dental Federation (2007-2013). Through his sheer hard work in the World Dental Federation, he was able to get the declaration of 20th March as World Oral Health Day. He is also an author of a book, theses, and many articles.<br>

Dr. Arif Alvi’s political career commenced with his pro-democracy struggle against the dictatorship of General Ayub Khan. He is a founding member of Pakistan Tehreek-e-Insaf (PTI) that came into being in 1996. He remained a member of the PTI’s Central Executive Committee since its inception and has held the offices of PTI President of Sindh (1997-2001), Central Vice President (2001-2006) and Secretary General (2006-2013). In line with Constitution of Pakistan, he resigned from all the positions of PTI before assuming the prestigious office of the President.<br>

During his tenure as the Secretary General of the party, Dr. Arif Alvi introduced social media platform in the politics of Pakistan. He was instrumental in holding intra-party election (2012-2013) and enabled millions of party members to digitally participate in the election process. He was elected as member of National Assembly from Karachi in 2013 and 2018 and was instrumental in drafting and the passage of many bills including one on Alternate Dispute Resolution. He also chaired the sub-committee of EVM’s, Digital Identification of voters and voting of overseas Pakistanis. The latter has finally come to fruition. Dr. Arif Alvi has keen interest in education and health sectors. Provision of basic facilities to the common man and uplifting the country’s image are very close to his heart. He considers people of Pakistan as the most precious asset and, therefore, accords special focus to human resource development in the country. He is happily married and has four children.</p>
        </header>


      <div class="container" id="available_programs" class="section-bg wow fadeInUp"s>

        <div class="position-relative"><h1 style="text-align: center; color: orange;">Available Programs.</h1></div>

<div class="card-group">

<div class="card" style="width: 18rem; background-color: #013243; margin-right: 20px;">
  <div class="card-body">
    <img class="card-img-top rounded-circle" src="img\Ai_image_png.png" alt="Card image cap">
    <h3 class="card-title" style="color: white;">Artificial Intelligence</h3>
    <p class="card-text" style="color: white;">Artificial intelligence (AI) is an area of computer science that emphasizes the creation of intelligent machines that work and react like humans. Some of the activities computers with artificial intelligence are designed for include: Speech recognition.</p>
  </div>
</div>

<div class="card" style="width: 18rem; background-color: #8c14fc; margin-right: 20px;">
  <div class="card-body">
        <img class="card-img-top rounded-circle" src="img\Cloud-technology.jpg" alt="Card image cap">
    <h3 class="card-title" style="color: white;">Cloud Native Computing Specialist</h3>
    <p class="card-text" style="color: white;">Cloud computing is shared pools of configurable computer system resources and higher-level services that can be rapidly provisioned with minimal management effort, often over the Internet. Cloud computing relies on sharing of resources to achieve coherence and economies of scale, similar to a public utility.</p>
  </div>
</div>

<div class="card" style="width: 18rem; background-color: #ffcb05; margin-right: 20px;">
  <div class="card-body">
    <img class="card-img-top rounded-circle" src="img\block_chain.jpeg" alt="Card image cap">
    <h3 class="card-title" style="color: black;">BLOCKCHAIN SPECIALIST</h3>
    <p class="card-text" style="color: black;">A blockchain, originally block chain, is a growing list of records, called blocks, which are linked using cryptography. Each block contains a cryptographic hash of the previous block, a timestamp, and transaction data. By design, a blockchain is resistant to modification of the data.</p>
  </div>
</div>

</div>

      </div>

      </div>
    </section><!-- #about -->



    <?php
    $server_Name = 'localhost';
    $user_Name = 'root';
    $user_Pass = '';
    $db_name = 'piaic_db';
  
    $setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);
  
    $query1 = "SELECT COUNT(*) FROM std_registrations";
    $running_query1 = mysqli_query($setting_connection,$query1);
    $fetchingData1 = mysqli_fetch_array($running_query1);
    ?>



    <section id="facts"  class="wow fadeIn">
      <div class="container" id="registered_users">

        <header class="section-header">
          <h3>Total Number of Registered Students</h3>
        </header>

        <div class="row counters">

  				<div class="col-lg-3 col-6 text-center" style="margin: 0 auto;">
            <span data-toggle="counter-up" ><?php echo $fetchingData1[0];?></span>
            <h2 class="upper-case">Students</h2>
  				</div>
      </div>
    </section><!-- #facts -->


    <section id="testimonials" class="section-bg wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Programs in Development</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <img src="img/iot_image.png" style="height: 150px; width: 180px; margin: 0 auto;" class="rounded-circle" alt="">
            <h3>Internet Of things</h3>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              The Internet of things is the network of devices such as vehicles, and home appliances that contain electronics, software, actuators, and connectivity which allows these things to connect, interact and exchange data.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/sdn_image.png" style="height: 150px; width: 180px; margin: 0 auto;" class="rounded-circle" alt="">
            <h3>SDN/NFV for 5g</h3>
           <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              NFV is a key enabler of the coming 5G infrastructure, helping to virtualize all the various appliances in the network. In 5G, NFV will enable network slicing—a virtual network architecture aspect that allows multiple virtual networks to be created atop a shared physical infrastructure.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/enterpenuership_img.png" style="height: 150px; width: 180px; margin: 0 auto;" class="rounded-circle" alt="">
            <h3>Entrepreneurship</h3>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Entrepreneurship is the process of designing, launching and running a new business, which is often initially a small business. The people who create these businesses are called entrepreneurs.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/ios_img.png" style="height: 150px; width: 180px; margin: 0 auto;" class="rounded-circle" alt="">
            <h3>IoS Development</h3>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              An iOS developer is responsible for developing applications for mobile devices powered by Apple's iOS operating system. Ideally, a good iOS developer is proficient with one of the two programming languages for this platform: Objective-C or Swift.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/andriod_img.png" style="height: 150px; width: 180px; margin: 0 auto;" class="rounded-circle" alt="">
            <h3>Andriod Development</h3>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Android software development is the process by which new applications are created for devices running the Android operating system. Google states that "Android apps can be written using Kotlin, Java, and C++ languages" using the Android software development kit, while using other languages is also possible.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/augmented_realitiy_img.png" style="height: 150px; width: 180px; margin: 0 auto;" class="rounded-circle" alt="">
            <h3>Augmented Reality</h3>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Augmented reality is an interactive experience of a real-world environment where the objects that reside in the real-world are "augmented" by computer-generated perceptual information, sometimes across multiple sensory modalities, including visual, auditory, haptic, somatosensory, and olfactory.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/mobile_specialist_img.png" style="height: 150px; width: 180px; margin: 0 auto;" class="rounded-circle" alt="">
            <h3>Mobile Web Specialist</h3>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Google has launched a certification program for mobile web developers. Those that successfully pass the Mobile Web Specialist exam and interview earn a badge, which they can display on their website and resume. They are also entered into a registry, which employers can check against.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>


        </div>

      </div>
    </section><!-- #testimonials -->



    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Strategic Partners</h3>
        </header>

        <div class="owl-carousel clients-carousel">
          <img src="img/iqraLogo2.3a6cdbb4.jpeg" alt="">
          <img src="img/panacloudfootericon.130c4779.png" alt="">
          <img src="img/psx2.c50b5ae4.png" alt="">
          <img src="img/saylaniLogo.c2a52d0a.png" alt="">
 
        </div>

      </div>
    </section><!-- #clients -->

    <!--==========================
      Clients Section
    ============================-->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Developers Team.</h3>
        </div>

        <div class="row">

        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/my_Pic.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Faraz Khan</h4>
                  <span>Aritifical Intelligence Architect / <br>Open Minded R, Python and Java guru.</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/ebad_img2.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Ebad Sheikh</h4>
                  <span>Front End Designer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="img/huzaifa_img.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>SM Huzaifa</h4>
                  <span>Front End Developer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="img/muzamil img_3.png" height="29" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Muzammil</h4>
                  <span>C# Developer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

<br><br>


<!-- apply section 
  ------------------------
-->

<section id="apply_form">

<div class="col-xs-1 text-center" id="apply_div">

<br>
  <h2 id="apply_now_Heading" class="text-uppercase font-weight-bold">Apply Now</h2>

  <hr class="divider" style="background-color: white; width: 500px;">

  <form id="centering_form" action="" method="POST" enctype="multipart/form-data">

<?php

  $server_Name = 'localhost';
  $user_Name = 'root';
  $user_Pass = '';
  $db_name = 'piaic_db';

  $setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

  $query = "SELECT * FROM student_gender";
  $running_query = mysqli_query($setting_connection,$query);

  $query2 = "SELECT * FROM available_programs";
  $running_query2 = mysqli_query($setting_connection,$query2);

  $query3 = "SELECT * FROM distance_learning";
  $running_query3 = mysqli_query($setting_connection,$query3);

  $test_timing_query_for_Notice = "SELECT * FROM test_timings";
  $runnig_timing_query = mysqli_query($setting_connection,$test_timing_query_for_Notice);

?>


      <br>

      <label style="color: white;">Name</label>
      <input type="text" name="student_name" class="form-control" placeholder="Name" size=60 required>

      <br>

      <label style="color: white;">Fathar Name</label>
      <input type="text" name="father_name" class="form-control" placeholder="Father Name" required>
      <br>

      <label style="color: white;">Pick Your Gender</label>
      <select id="inputState" name="gender_name" class="form-control form-control-lg" required>
        <option selected="true" disabled="true">Choose...</option>
          <?php
            while ($row = $running_query->fetch_array()) :
          ?>
        <option><?php echo $row['std_Gender']; ?></option>
          <?php endwhile;?> 
      </select>   
      <br>

    <label style="color: white;">Address</label>
    <input type="text" name="student_address" class="form-control" placeholder="Gulsahan-e-Iqbal.... etc" required>

    <br>

    <label style="color: white;">City</label>
    <input type="text" name="student_city" class="form-control" placeholder="City Name" required>    


    <br>

    <label style="color: white;">Mobile No</label>
    <input type="text" name="student_number" class="form-control" placeholder="030302... etc" pattern="[0-9]{11}" required>

    <br>

    <label style="color: white;">Your CNIC no</label>
    <input type="text" name="student_CNIC" class="form-control" pattern="[0-9]{11}" placeholder="CNIC number without - only insert numeric values" required>

    <br>

      <label style="color: white;">Test Timings must be in between these given days.</label>

      <div class="list-group">
      <?php while($row = $runnig_timing_query->fetch_array()) :
      ?>
        <p class="list-group-item list-group-item-action list-group-item-primary"><?php echo $row['timings'];?></p>
      <?php endwhile; ?>  
      </div>
      <br>
      <label style="color: white;">Pick Timings Here</label>
      <input type="date" name="select_timings" class="form-control" required>

      <br>

      <label style="color: white;">Select Your Program</label>
      <select id="inputState" name="program_name" class="form-control form-control-lg" required>
        <option selected="true" disabled="true">Choose...</option>
          <?php
            while ($row = $running_query2->fetch_array()) :
          ?>        
        <option><?php echo $row['program'];?></option>
          <?php endwhile; ?> 
      </select>

      <br>

      <label style="color: white;">Distance Learning(Select Yes if you live far distance.)</label>
      <select id="inputState" name="dis_Learning" class="form-control form-control-lg" required>
        <option selected="true" disabled="true">Choose...</option>
          <?php
            while ($row = $running_query3->fetch_array()) :
          ?>        
        <option><?php echo $row['dist_learning'];?></option>
          <?php endwhile; ?> 
      </select>


      <br>

      <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required>

<br>
<br>

  <button type="submit" class="btn btn-outline-danger btn-block btn-lg" name="submit">Submit</button><br>

</form>

<?php 

$server_Name = 'localhost';
$user_Name = 'root';
$user_Pass = '';
$db_name = 'piaic_db';

$setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);


if(isset($_POST['submit']))
{
  $input_std_name = $_POST['student_name'];
  $input_std_father_name = $_POST['father_name'];
  $input_std_gender = $_POST['gender_name'];
  $input_std_address = $_POST['student_address'];
  $input_std_city = $_POST['student_city'];
  $input_std_mobile_no = $_POST['student_number'];
  $input_std_cnic_no = $_POST['student_CNIC'];
  $input_std_timings = $_POST['select_timings'];
  $input_std_program = $_POST['program_name'];
  $input_std_distance_Learning = $_POST['dis_Learning'];

  $getting_test_timings_query = "SELECT timings from test_timings WHERE timings = '$input_std_timings'";
  $running_test_timings_query = mysqli_query($setting_connection,$getting_test_timings_query);

  if($running_test_timings_query->num_rows > 0){

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTempName = $file['tmp_name'];
    $fileSize = $file['size'];
  
    $fileSepExt = explode('.', $fileName);
    $fileActualExtension = strtolower(end($fileSepExt));
  
    $allowingFiles = array('jpg','jpeg','png');
  
    if (in_array($fileActualExtension, $allowingFiles)) {
      if ($fileSize <= 50000000) {
        $fileNewName = uniqid('',true).'.'.$fileActualExtension;
        $fileDestination = 'Uploads/'.$fileNewName;
  
          $query4 = "INSERT INTO std_registrations (std_Name,std_Father_Name,std_gender,std_address,std_city,std_Mobile_Num,std_Cnic_No,std_test_Timings,std_Program,distance_Learning,std_image) VALUES ('$input_std_name','$input_std_father_name','$input_std_gender','$input_std_address','$input_std_city','$input_std_mobile_no','$input_std_cnic_no','$input_std_timings','$input_std_program','$input_std_distance_Learning','$fileDestination')";
  
          $running_query4 =  mysqli_query($setting_connection,$query4);
          move_uploaded_file($fileTempName, $fileDestination);
          echo "<script>window.top.location='index.php'</script>";
      }
      else{
        echo "File Size is greater";
      }
    }
    else{
      echo "Can not upload this type of file!!";
    }

  }

  else{
     echo "<script> alert('Please Insert Correct Test Timings'); window.location = index.php</script>";
  }

}

?>


</div>






</section>  <!-- apply section -->


    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp" >
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Near Bahadurabad Chorangi, Saylani Head Office, Karachi Pakistan.</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">saylani@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="POST" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="feedbacker_name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:10" data-msg="Please enter at least 4 chars"  required/>
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="feedbacker_email" id="email" placeholder="Your Email" required/>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="feedbacker_subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="feedbacker_message" rows="2" required data-msg="Please write something for us" placeholder="Message" required></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" name="feedbacker_submit">Send Message</button></div>
          </form>

         <?php

          $server_Name = 'localhost';
          $user_Name = 'root';
          $user_Pass = '';
          $db_name = 'piaic_db';
          
          $setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

          if(isset($_POST['feedbacker_submit'])){
            
            $input_feedback_name = $_POST['feedbacker_name'];
            $input_feedback_email = $_POST['feedbacker_email'];
            $input_feedback_subject = $_POST['feedbacker_subject'];
            $input_feedback_message = $_POST['feedbacker_message'];

            $now_feedback_query = "INSERT INTO feedback (name,email,subject,message) VALUES ('$input_feedback_name','$input_feedback_email','$input_feedback_subject','$input_feedback_message')";
            $running_feedback_query = mysqli_query($setting_connection,$now_feedback_query);

            echo "<script>window.location = index.php</script>";
          }

         ?> 



        </div>

      </div>
    </section><!-- #contact -->


  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>PIAIC</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">PanaCloud.ai</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <!-- <script src="contactform/contactform.js"></script> -->

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>


</body>
</html>
