<?php include'includes/header.php';  ?>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <a href="job.php"><button class="bbtn btn-success">Go Back <i class="fa fa-long-arrow-left"></i></button></a>   <center><b>POST A JOB</b></center> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                               
                                <div class="col-md-12">
                                    <div class="form_bg">
                                        <?php
                                            include("conn.php");
                                            $img;
                                            $job_title = "";
                                            $job_cat = "";
                                            $job_description = "";
                                            $posted_by = "";
                                            $job_type = "";
                                            $qualification = "";
                                            $expiry_date = "";
                                            $no_of_openings = "";
                                            $sallery = "";
                                            $sallery_rate = "";
                                            $city = "";
                                            $company_name = "";
                                            $keywords ="";
                                            $status = "";

                                            if(isset($_POST['submit']))
                                            {

                                                @$job_title = $_POST['job_title'];
                                                @$job_description = $_POST['job_description'];
                                                @$job_cat = $_POST['job_cat'];
                                                @$posted_by = $_POST['posted_by'];
                                                @$job_type = $_POST['job_type'];
                                                @$qualification = $_POST['qualification'];
                                                @$date1 = $_POST['expiry_date'];
                                                @$expiry_date =  date("Y-m-d", strtotime($date1));

                                                @$no_of_openings = $_POST['no_of_openings'];
                                                @$sallery = $_POST['sallery'];
                                                @$sallery_rate = $_POST['sallery_rate'];

                                                
                                                @$city = $_POST['city'];
                                                @$company_name =$_POST['company_name'];
                                                @$keywords =  $_POST['keywords'];
                                                @$status = $_POST['status'];
                                                
                                                @$img='';                 
                                                if($job_title!="")
                                                {
                                                    $sql = "SELECT * FROM jobs WHERE job_title='$job_title'";
                                                    $count = @$conn->query($sql,$conn);
                                                    $r = @mysql_num_rows($count,$conn);
                                                    if($count>0)
                                                    {
                                                      echo "<center><span class='error'>This Jobs Has been Already Postd Post new JObs</span></center>"; 
                                                    }else{
                                                        if(is_uploaded_file($_FILES['img']['tmp_name']))
                                                        {             
                                                            if(($_FILES['img']['type']=="image/jpeg") || ($_FILES['img']['type']=="image/png") || ($_FILES['img']['type']=="image/jpg") || ($_FILES['img']['type']=="image/pjpeg") || ($_FILES['img']['type']=="image/gif"))
                                                            {   
                                                                $img = $_FILES['img']['name'];
                                                                $imageFileType = pathinfo($img,PATHINFO_EXTENSION);
                                                                $fileName = rand(11111,99999).'.'.$imageFileType; // renameing image

                                                                move_uploaded_file($_FILES['img']['tmp_name'],"../images/jobs/".$fileName); 
                                                               
                                                           
                                                                
                                                            }else{
                                                                echo "<center><span class='error'>Please Enter a Valid Image Type</span></center>";
                                                            }
                                                          
                                                        }else{
                                                            $fileName = 'noImage.jpg';
                                                        }
                                                        $sql="insert into jobs (job_title, cat_id, Job_description,qualification, job_image, posted_by, job_type, expiry_date, no_of_openings, sallery,sallery_rate, city, company_name,status,keywords) values('$job_title', '$job_cat', '$job_description','$qualification', '$fileName', '$posted_by', '$job_type','$expiry_date', '$no_of_openings', '$sallery','$sallery_rate', '$city', '$company_name','$status','$keywords')";
                                                        
                                                        $result = @mysqli_query($conn,$sql);
                                                       
                                                        if($result){
                                                            echo "<center><span class='sucess'>Job Posted </span></center>";
                                                        }else{
                                                            echo "<center><span class='error'>error Post Job Please Check Below</span></center>";
                                                        } 
                                                    }                                     
                                                }else{
                                                    echo "<center><span class='error'>Please Input all Field with Proper data</span></center>";                  
                                                }                                                     
                                            }
                                        ?>
                                        <form name="jobadd"  method="post" enctype="multipart/form-data">                         
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title:(<span style="color:red">*</span>)</label>
                                                <input  name="job_title"  class="form-control" id="exampleInputEmail1" required="Title Field is required">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category:</label>
                                                <select class="form-control" name="job_cat">
                                                <option value="0" disabled="">Chose Job Type</option>
                                                    <?php
                                                      include("conn.php");
                                                      $sql =  "SELECT* FROM job_category WHERE status=1 order by cat_id desc";
                                                      $jobs = $conn->query($sql);
                                                                  
                                                      $counter=0; 
                                                      while($row = $jobs->fetch_assoc()) {?>
                                                      <option value="<?php echo $row['cat_id'] ?>"> <?php echo $row['cat_name'] ?></option>
                                                      <?php } ?>
                                                </select>
                                                
                                            </div>   
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description:</label>
                                                <textarea name="job_description" class="form-control" rows="10"></textarea>
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Qualification</label>
                                                <textarea name="qualification" class="form-control" rows="10"></textarea>
                                            </div>  
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Type:</label>
                                                <select class="form-control" name="job_type">
                                                <option value="0" disabled="">Chose Job Type</option>
                                                    <option value="Full Time"> Full Time</option>
                                                    <option value="Full Time"> Part Time</option>
                                                    <option value="Internship"> Internship</option>
                                                </select>
                                                
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No of Openings:</label>
                                                <input  name="no_of_openings" class="form-control" id="exampleInputEmail1">
                                            </div>  
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Salary:</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input  name="sallery" class="form-control" id="exampleInputEmail1">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="sallery_rate" class="form-control">
                                                            <option value="Per Hour">Per Hour</option>
                                                            <option value="Per Week">Per Week</option>
                                                            <option value="Per Month">Per Month</option>
                                                            <option value="Per Day">Per Day</option>
                                                            <option value="Per Annum">Per Annum</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">City:</label>
                                                <input  name="city" class="form-control" id="exampleInputEmail1">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Name:</label>
                                                <input  name="company_name" class="form-control" id="exampleInputEmail1">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Keywords</label>
                                                <input  name="keywords" class="form-control" id="exampleInputEmail1">
                                            </div> 
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Designation:</label>
                                                <input  name="posted_by" class="form-control" id="exampleInputEmail1">
                                            </div>    
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Expiry Date:</label>
                                                <input type="text" name="expiry_date" class="form-control datepicker1" >
                                            </div>    
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Company Logo:</label>
                                                <input type="file" name="img" />  
                                            </div>   
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Status:</label>
                                                <label> <input type="radio" name="status" value="1" checked="">Publish</label>
                                                <label> <input type="radio" name="status" value="0">Unpublish</label>
                                                
                                            </div>              
                                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        </form>    
                                    </div>
                                </div>  
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php include'includes/footer.php'; ?>










































