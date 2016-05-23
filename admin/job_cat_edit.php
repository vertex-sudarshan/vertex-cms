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
                           <a href="job_cat.php"><button class="bbtn btn-success">Go Back <i class="fa fa-long-arrow-left"></i></button></a><center><b>JOB CATEGORY UPDATE</b></center>  
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                               
                                <div class="col-md-12">
                                    <div class="form_bg">
                                        <?php
                                            include("conn.php");                                      
                                            
                                            $cat_name = "";
                                            $cat_description = "";
                                             $status = "";
                                            
                                            if(isset($_POST['submit']))
                                            {

                                                @$cat_name = $_POST['cat_name'];
                                                @$cat_description = $_POST['cat_description'];
                                               @$status = $_POST['status'];
                                                              
                                                if($cat_name!="" )
                                                {
                                                    
                                                    $sql= "update job_category set cat_name='$cat_name', cat_description='$cat_description', status='$status' where cat_id=".$_REQUEST['id'] ;
                                                           
                                                            $result = $conn->query($sql);
                                                            if($result){
                                                               echo "<center><span class='sucess'>Updating Jobs Category Sucessfully</span></center>";

                                                            }else{
                                                                echo "<center><span class='error'>error to load</span></center>";

                                                            }   


                                                 
                                                    }                                         
                                                }  
                                                
                                                $sql="select * from job_category where cat_id=".$_REQUEST['id'];
                                                $jobs = $conn->query($sql);
                                                $rows = $jobs->fetch_assoc(); 
                                        ?>
                                         <form name="jobadd"  method="post" enctype="multipart/form-data">                         
                                            <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $rows['cat_id'] ?>">  
                                              
                                                <label for="exampleInputEmail1">Title:(<span style="color:red">*</span>)</label>
                                                <input  name="cat_name" required="" class="form-control" value="<?php echo $rows['cat_name'] ?>" id="exampleInputEmail1">
                                            </div>   
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description:(<span style="color:red">*</span>)</label>
                                                <textarea name="cat_description" class="form-control" rows="10"><?php echo $rows['cat_description']; ?></textarea>
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Status:</label>
                                                <label> <input type="radio" name="status" value="1"<?php if($rows['status']==1) echo 'checked' ?>>Publish</label>
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























