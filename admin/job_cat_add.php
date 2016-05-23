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
                        <a href="job_cat.php"><button class="bbtn btn-success">Go Back <i class="fa fa-long-arrow-left"></i></button></a>   <center><b>NEW JOB CATEGORY</b></center> 
                           
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
                                                            
                                                if($cat_name!="")
                                                {
                                                    $sql = "SELECT * FROM job_category WHERE cat_name='$cat_name'";
                                                    $count = @$conn->query($sql,$conn);
                                                    $r = @mysql_num_rows($count,$conn);
                                                    if($count>0)
                                                    {
                                                      echo "<center><span class='error'>This Jobs Title Has been Already Postd Post new Job Category</span></center>"; 
                                                    }else{
                                                       $sql="insert into job_category (cat_name, cat_description,status) values('$cat_name', '$cat_description','$status')";
                                                        $result = @mysqli_query($conn,$sql);

                                                        
                                                           
                                                        if($result){
                                                             echo "<center><span class='sucess'>Job Category Added </span></center>";
                                                        }else{
                                                            echo "<center><span class='error'>error Post Job Please Check Below</span></center>";
                                                        }  
                                                    }                                     
                                                }else{
                                                    echo "<center><span class='error'>Please Input all Field with Proper data</span></center>";                  
                                                }                                                     
                                            }
                                        ?>
                                        <form name="jobcategoryadd"  method="post" enctype="multipart/form-data">                         
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title:(<span style="color:red">*</span>)</label>
                                                <input  name="cat_name" required="" class="form-control" id="exampleInputEmail1">
                                            </div>   
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description:(<span style="color:red">*</span>)</label>
                                                <textarea name="cat_description" class="form-control" rows="10"></textarea>
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










































