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
                           <center><b> TESTIMONIALS UPDATE </b></center>  
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                <a href="testimonial.php">Go To Testimonials</a>
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
                                                    
                                                    $sql= "update testimonials set name='$name', description='$description' where id=".$_REQUEST['id'] ;
                                                           
                                                            $result = $conn->query($sql);
                                                            if($result){
                                                               echo "<center><span class='sucess'>Updating Testimonials Sucessfully</span></center>";

                                                            }else{
                                                                echo "<center><span class='error'>error to load</span></center>";

                                                            }   


                                                 
                                                    }                                         
                                                }  
                                                
                                                $sql="select * from testimonials where id=".$_REQUEST['id'];
                                                $test = $conn->query($sql);
                                                $rows = $test->fetch_assoc(); 
                                        ?>
                                         <form name="jobadd"  method="post" enctype="multipart/form-data">                         
                                            <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">  
                                              
                                                <label for="exampleInputEmail1">Title:(<span style="color:red">*</span>)</label>
                                                <input  name="name" required="" class="form-control" value="<?php echo $rows['name'] ?>" id="exampleInputEmail1">
                                            </div>   
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description:(<span style="color:red">*</span>)</label>
                                                <textarea name="description" class="form-control" rows="10"><?php echo $rows['description']; ?></textarea>
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























