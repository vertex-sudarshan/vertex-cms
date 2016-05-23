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
                             <a href="testimonial.php"><button class="bbtn btn-success">Go Back <i class="fa fa-long-arrow-left"></i></button></a>   <center><b>NEW TESTIMONIALS</b></center> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                 
                               
                                <div class="col-md-12">
                                    <div class="form_bg">
                                        <?php
                                            include("conn.php");
                                            
                                            $name = "";
                                            $description = "";
                                           
                                            if(isset($_POST['submit']))
                                            {

                                                @$name = $_POST['name'];
                                                @$description = $_POST['description'];
                                                            
                                                if($name!="" && $description!="")
                                                {
                                                    $sql = "SELECT * FROM testimonials WHERE name='$name'";
                                                    $count = @$conn->query($sql,$conn);
                                                    $r = @mysql_num_rows($count,$conn);
                                                    if($count>0)
                                                    {
                                                      echo "<center><span class='error'>This Jobs Title Has been Already Postd Post new Job Category</span></center>"; 
                                                    }else{
                                                       $sql="insert into testimonials (name, description) values('$name', '$description')";
                                                        $result = @mysqli_query($conn,$sql);

                                                        
                                                            
                                                        if($result){
                                                            echo "<center><span class='sucess'>Testomonials Added </span></center>";
                                                        }else{
                                                            echo "<center><span class='error'>error  Please Check Below</span></center>";
                                                        }  
                                                    }                                     
                                                }else{
                                                    echo "<center><span class='error'>Please Input all Field with Proper data</span></center>";                  
                                                }                                                     
                                            }
                                        ?>
                                        <form name="jobcategoryadd"  method="post" enctype="multipart/form-data">                         
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name:(<span style="color:red">*</span>)</label>
                                                <input  name="name" class="form-control" id="exampleInputEmail1">
                                            </div>   
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description:(<span style="color:red">*</span>)</label>
                                                <textarea name="description" class="form-control" rows="10"></textarea>
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










































