
<?php include'includes/header.php';  ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Password</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Password Change
                    </div>
                    <div class="panel-body">
                        <?php
                            include("conn.php");
                            $username = $_SESSION['username'];
                            $sql="select * from user where username='$username'";                             
                            $user_details = $conn->query($sql);
                            $row = $user_details->fetch_assoc();

                            $album=" ";

                            if(isset ($_POST['submit'])){

                               $password = $_POST['password'];
                               $password = md5($password);
                                $npassword = $_POST['npassword'];
                                $cpassword = $_POST['cpassword'];
                                if( $password!=="" && $npassword!=="" && $cpassword!==""){
                                if($npassword == $cpassword){
                                    if($password == $row['password']){
                                            
                                            
                            $sql= "update user set  password = '$npassword' where username='$username'";
                            $result = $conn->query($sql);
                                if($result){
                                        echo"<center><span class='sucess'>Password Update  Sucesfully!</span></center>";
                                }   
                                }else{
                                    echo"<center><span class='error'>Old Password Not Match</span></center>";
                                    }
                                    
                                    
                            }else{
                                echo"<center><span class='error'>Password Not Match</span></center>";
                                
                                }
                                
                                }else{
                                echo"<center><span class='error'><b>All field Need</span></center>";
                                }
    
                            }

                        ?>
                    </div>
                    <div class="row">    
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form_bg">
                                <div class="head">
                                    
                                </div>    
                                <form name="eventaddd"  method="post" enctype="multipart/form-data">                         
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" >Current Password:(<span style="color:red">*</span>)</label>
                                        <input  name="password" class="form-control" id="exampleInputEmail1">
                                    </div>   
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" >New Password:(<span style="color:red">*</span>)</label>
                                        <input  name="npassword" class="form-control" id="exampleInputEmail1">
                                    </div>   
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" >Re Type Password:(<span style="color:red">*</span>)</label>
                                        <input  name="cpassword" class="form-control" id="exampleInputEmail1">
                                    </div>   
                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                               </form>
                            </div>
                        </div>  
                    </div>                            
                    <!-- /.row -->
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












