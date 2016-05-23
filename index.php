<?php include('includes/header.php');?>
    <section class="full-slider">
      <div class="full-width-slider">
        <div class="slider-content">
          <img src="assets/images/slider1.jpg" alt="Slider 1">
          <span class="caption-head">Welcome to Ambience</span>
          <span class="caption-content"><a href="#">Slider Bottom</a></span>
        </div>
        <div class="slider-content">
          <img src="assets/images/slider2.jpg" alt="Slider 2">
          <span class="caption-head">Welcome to Ambience</span>
          <span class="caption-content"><a href="#">Slider Bottom</a></span>
        </div>
        <div class="slider-content">
          <img src="assets/images/slider3.jpg" alt="Slider 3">
          <span class="caption-head">Welcome to Ambience</span>
          <span class="caption-content"><a href="#">Slider Bottom</a></span>
        </div>
        <div class="slider-content">
          <img src="assets/images/slider4.jpg" alt="Slider 4">
          <span class="caption-head">Welcome to Ambience</span>
          <span class="caption-content"><a href="#">Slider Bottom</a></span>
        </div>
      </div>
    </section>
    <section class="welcome-text">
      <div class="container">
        <h1>Welcome to Ambience</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique dictum magna nec eleifend. Aliquam at pulvinar ligula. Quisque at orci sit amet velit mattis facilisis ut luctus lacus. Fusce congue porta dapibus. Mauris ultrices, erat sit amet suscipit rutrum, ex eros lacinia erat, vitae ultrices ex dui eget odio. Aenean ac eros vel odio pellentesque pulvinar sed ut purus. Etiam euismod velit sit amet felis efficitur lacinia ac sit amet turpis. Donec vulputate nisl sit amet augue suscipit eleifend a eget ante. Pellentesque ultrices imperdiet libero, non dapibus ex posuere euismod. Maecenas congue neque nec felis pharetra dignissim. </p>        
      </div>
    </section>
    <section id="job_section">
    	<div class="container">
      <div class="row">
        <div class="col-md-9 all-jobs">
    		<h2>Latest Vacancies <a class="pull-right view-all" href="#">View All </a></h2>
          <?php 
          $sql =  "SELECT* FROM jobs WHERE status=1 order by id desc limit 5";
          $jobs = $conn->query($sql);

          while($row = $jobs->fetch_assoc()) {

            $now = time(); // or your date as well
           $your_date = strtotime($row['expiry_date']);
           $datediff =  $your_date - $now;
           $days =  floor($datediff/(60*60*24));
         ?>
         <a href="#" class="job-list">
           <div class="row">
              <div class="col-md-2">
                
                <img src="images/jobs/<?php echo $row['job_image']; ?>">
              </div>
        			<div class="col-md-5">
                <div class="front-job">
                  <h3><?php echo $row['job_title'] ?></h3>
                <p><?php echo $row['posted_by']; ?>  </p>
                 </div>
              </div>
              <div class="col-md-3">
                <p><i class="fa fa-map-marker"></i> <?php echo $row['city']; ?></p>
              </div>

              <div class="col-md-2 text-center">
                <p><?php echo $row['sallery']; ?> <?php echo $row['sallery_rate']; ?></p>

                  <span class="job_type"><?php echo $row['job_type']; ?></span>
              </div>
            </div>
          </a>
    		<?php } ?>
        </div>
        <div class="col-md-3">
        <div class="upload_cv">
          <h4>Upload Your CV</h4>
            <form method="POST" action="cv_upload.php" enctype="multipart/form-data">
              <select name="category">
                <option value="">Professions</option>
                <option value="Assistant">Assistant</option>
                <option value="A&E Doctor (Emergency Medicine)">A&E Doctor (Emergency Medicine)</option>
                <option value="Detention Nurse">Detention Nurse</option>
                <option value="General Medicine">General Medicine</option>
                <option value="Healthcare Assistan">Healthcare Assistan</option>
                <option value="Practice Nurse">Practice Nurse</option>
                <option value="Project Worker">Project Worker</option>
                <option value="Psychiatric Doctor">Psychiatric Doctor</option>
                <option value="Registered General Nurse">Registered General Nurse</option>
                <option value="Registered Learning Disability Nurse">Registered Learning Disability Nurse</option>
                <option value="Registered Mental Health Nurse">Registered Mental Health Nurse</option>
                <option value="Registered Substance Misuse Nurse">Registered Substance Misuse Nurse</option>
                <option value="School Nurse">School Nurse</option>
                <option value="Senior Health Care Assistant">Senior Health Care Assistant</option>
                <option value="Support Worker">Support Worker</option>
                <option value="Other">Other</option>
              </select>
              <div class="file-input">
                <span class="input-btn"><i class="fa fa-upload"></i> Choose CV...</span>
                <input type="file" name="cv" required="">  
              </div>
              <input type="submit" value="Submit">          
            </form>
          </div>
          <div class="upload_cv category">
          <h4>Job Category</h4>
          <ul class="job-category">
              <?php
          $sql = "SELECT * FROM job_category where status=1 order by cat_id desc limit 6";
           $jobs_cat = $conn->query($sql);

            while($row = $jobs_cat->fetch_assoc()) {

           ?>

          <li><a href="job_cat.php?id=<?php echo $row['cat_id']; ?>"> <?php echo $row['cat_name']; ?></a></li>

         <?php } ?>
            
          </ul>
          </div>
          
        </div>
      </div>
    	</div>
      <div class="top30"></div>
    </section>
     <section class="testimonial full-slider">
      <div class="container">
        <h2>Client Reviews</h2>
        <div class="testimonial-slider">
           <?php 
          $sql =  "SELECT* FROM testimonials order by id desc";
          $test = $conn->query($sql);
                      
           
          while($row = $test->fetch_assoc()) {?>
            <div>
              <div class="review-content">
                <h4><?php echo $row['name']  ?></h4>
                <p><?php echo $row['description']; ?></p>
              </div>
            </div>
          <?php }?>
          
         
        </div>
      </div>
     </section>

   <?php include('includes/footer.php');?>