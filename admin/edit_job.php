<?php include'includes/header.php';  ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <a href="job.php"><button class="bbtn btn-success">Go Back <i class="fa fa-long-arrow-left"></i></button></a>   <center><b>JOB UPDATE</b></center> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                               
                                <div class="col-md-12">
                                    <div class="form_bg">
                                        <?php
                                            include("conn.php");                                      
                                            @$old_img = $_POST['old_img'];
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
                                            $keywords = "";
                                            if(isset($_POST['submit']))
                                            {

                                                @$job_title = $_POST['job_title'];
                                                @$job_description = $_POST['job_description'];
                                                @$posted_by = $_POST['posted_by'];
                                                @$job_type = $_POST['job_type'];
                                                @$qualification = $_POST['qualification'];
                                                @$img=''; 
                                                @$job_cat = $_POST['job_cat'];
                                                @$date1 = $_POST['expiry_date'];
                                                @$expiry_date =  date("Y-m-d", strtotime($date1)); 
                                                @$no_of_openings = $_POST['no_of_openings'];
                                                @$sallery = $_POST['sallery'];
                                                @$sallery_rate = $_POST['sallery_rate'];

                                                
                                                @$city = $_POST['city'];
                                                @$company_name =$_POST['company_name'];
                                                @$keywords =  $_POST['keywords'];
                                                @$status = $_POST['status'];             
                                                if($job_title!="")
                                                {
                                                    

                                                   if(is_uploaded_file($_FILES['img']['tmp_name']))
                                                    {             
                                                        if(($_FILES['img']['type']=="image/jpeg") || ($_FILES['img']['type']=="image/png") || ($_FILES['img']['type']=="image/jpg") || ($_FILES['img']['type']=="image/pjpeg") || ($_FILES['img']['type']=="image/gif"))
                                                        {                                                
                                                            move_uploaded_file($_FILES['img']['tmp_name'],"../images/jobs/".$_FILES['img']['name']); 
                                                            $img = $_FILES['img']['name'];
                                                            if($old_img!="noImage.jpg"){
                                                                unlink("../images/jobs/$old_img");
                                                            }

                                                            


                                                            $sql= "update jobs set job_title='$job_title', cat_id='$job_cat', Job_description='$job_description',qualification='$qualification', job_image='$img', posted_by= '$posted_by', job_type = '$job_type', expiry_date='$expiry_date', no_of_openings='$no_of_openings', sallery='$sallery', sallery_rate='$sallery_rate', city='$city',company_name='$company_name', status='$status', keywords='$keywords'  where id=".$_REQUEST['id'] ;
                                                           
                                                            $result = $conn->query($sql);
                                                            if($result){
                                                                //for update keywords
                                                             
                                                              $sql = "DELETE FROM  keywords where job_id=".$_REQUEST['id'];
                                                              $conn->query($sql);
                                                               $single_keyword = explode(",", $keywords);
                                                               $id = $_REQUEST['id'];
                                                                foreach ($single_keyword as $kewyword) {
                                                                    $sql="insert into keywords (job_id, keywords) values('$id', '$kewyword')";
                                                                    $result1 = @mysqli_query($conn,$sql);
                                                                    
                                                                }
                                                               echo "<center><span class='sucess'>Updating Jobs  Sucessfully</span></center>";

                                                            }else{
                                                                echo "<center><span class='error'>error to load</span></center>";

                                                            }   
                                                        }else{
                                                            echo "<center><span class='error'>Please Enter a Valid Image Type</span></center>";
                                                        }
                                                    }else{
                                                         $sql= "update jobs set job_title='$job_title', cat_id='$job_cat', Job_description='$job_description',qualification='$qualification', job_image='$old_img', posted_by= '$posted_by', job_type = '$job_type', expiry_date='$expiry_date', no_of_openings='$no_of_openings', sallery='$sallery', sallery_rate='$sallery_rate', city='$city',company_name='$company_name', status='$status', keywords='$keywords'  where id=".$_REQUEST['id'] ;
                                                         
                                                        $result = $conn->query($sql);
                                                        if($result){
                                                            

                                                              echo "<center><span class='sucess'>Updating JObs Sucessfully</span></center>";
                                                        }else{
                                                            echo "<center><span class='error'>error to load</span></center>";
                                                        }
                                                    }                                         
                                                }  
                                                }
                                                $sql="select * from jobs where id=".$_REQUEST['id'];
                                                $jobs = $conn->query($sql);
                                                $rows = $jobs->fetch_assoc(); 
                                        ?>
                                         <form name="jobadd"  method="post" enctype="multipart/form-data">                         
                                            <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">  
                                            <input type="hidden" name="old_img" value="<?php echo $rows['job_image']; ?>">  
                                                <label for="exampleInputEmail1">Title:(<span style="color:red">*</span>)</label>
                                                <input  name="job_title" class="form-control" required="" value="<?php echo $rows['job_title'] ?>" id="exampleInputEmail1">
                                            </div>   
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Category:</label>
                                                <select class="form-control" name="job_cat">
                                                <option value="0" disabled="">Chose Job Category</option>
                                                    <?php
                                                      include("conn.php");
                                                      $sql =  "SELECT* FROM job_category order by cat_id desc";
                                                      $jobs = $conn->query($sql);
                                                                  
                                                      $counter=0; 
                                                      while($row = $jobs->fetch_assoc()) {?>
                                                      <option value="<?php echo $row['cat_id'] ?>" <?php if($row['cat_id']==$rows['cat_id']) echo 'selected'; ?>> <?php echo $row['cat_name'] ?></option>
                                                      <?php } ?>
                                                </select>
                                                
                                            </div>   
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description:(<span style="color:red">*</span>)</label>
                                                <textarea name="job_description" class="form-control" rows="10"><?php echo $rows['Job_description']; ?></textarea>
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Qualification:</label>
                                                <textarea name="qualification" class="form-control" rows="10"><?php echo $rows['qualification']; ?></textarea>
                                            </div>  
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Type:</label>
                                                <select class="form-control" name="job_type">
                                                <option value="0" disabled="">Chose Job Type</option>
                                                    <option value="Full Time" <?php if($rows['job_type']=='Full Time') echo 'selected'   ?> > Full Time</option>
                                                    <option value="Part Time" <?php if($rows['job_type']=='Part Time') echo 'selected'  ?> > Part Time</option>
                                                    <option value="Internship" <?php if($rows['job_type']=='Internship') echo 'selected'  ?> > Internship</option>
                                                </select>
                                                
                                            </div> 
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">No of Openings:</label>
                                                <input  name="no_of_openings" value="<?php echo $rows['no_of_openings']; ?>" class="form-control" id="exampleInputEmail1">
                                            </div>  
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Salary:</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input  name="sallery"  value="<?php echo $rows['sallery']; ?>" class="form-control" id="exampleInputEmail1">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="sallery_rate" class="form-control">
                                                            <option value="Per Hour" <?php if($rows['sallery_rate']=='Per Hour') echo 'selected'   ?>>Per Hour</option>
                                                            <option value="Per Week" <?php if($rows['sallery_rate']=='Per Week') echo 'selected'   ?>>Per Week</option>
                                                            <option value="Per Month"<?php if($rows['sallery_rate']=='Per Month') echo 'selected'   ?>>Per Month</option>
                                                            <option value="Per Day" <?php if($rows['sallery_rate']=='Per Day') echo 'selected'   ?>>Per Day</option>
                                                            <option value="Per Annum" <?php if($rows['sallery_rate']=='Per Day') echo 'selected'   ?>>Per Annum</option>
                                                              
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">City:</label>
                                                <input  name="city"  value="<?php echo $rows['city']; ?>" class="form-control" id="exampleInputEmail1">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Name:</label>
                                                <input  name="company_name"   value="<?php echo $rows['company_name']; ?>" class="form-control" id="exampleInputEmail1">
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Keywords</label>
                                                <input  name="keywords" class="form-control"  value="<?php echo $rows['keywords']; ?>" id="exampleInputEmail1">
                                            </div> 
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Designation:</label>
                                                <input  name="posted_by" value="<?php echo $rows['posted_by'] ?>" class="form-control" id="exampleInputEmail1">
                                            </div>    
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Expiry Date:</label>
                                                <input type="text"  name="expiry_date" value="<?php echo $rows['expiry_date'];  ?>" class="form-control datepicker1" >
                                            </div>    
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Company Logo:</label>
                                                <input type="file" name="img" />  
                                                <img src="../images/jobs/<?php echo $rows['job_image']; ?>" height="100" width="100">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Status:</label>
                                                <label> <input type="radio" name="status" value="1" <?php if($rows['status']==1) echo 'checked' ?>>Publish</label>
                                                <label> <input type="radio" name="status" value="0" <?php if($rows['status']==0) echo 'checked' ?>>Unpublish</label>
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























