<?php 
include('includes/header.php');
$keyword = $_GET['keyword'];

include("admin/conn.php"); ?>


   <section id="job_section">
    	<div class="container">
      <div class="row">
        <div class="col-md-9 all-jobs">
    		<h2>Jobs Search Of Keyword : <?php echo $keyword; ?></h2>
          <?php 
           $sql =  "SELECT jobs.*
  			           ,job_category.*

  			 FROM jobs,job_category where jobs.cat_id = job_category.cat_id and jobs.status=1  and   jobs.job_title LIKE '%$keyword%' OR jobs.keywords LIKE '%$keyword%' ";
			  $jobs = $conn->query($sql);
			              
			  $counter=0; 

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
        
      </div>
    	</div>
      <div class="top30">
       
      </div>
    </section>



   <?php include('includes/footer.php');?>