<?php include'includes/header.php';  ?>

        <div id="page-wrapper">
            <div class="row">
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <h4>Applicant</h4>
                        <div class="panel-body">
                            <div class="row">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                    <tr>
                                      <th>#</th> 
                                        <th>Job Title</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>contact</th>
                                        <th>Source</th>
                                        <th>CV</th>
                                        
                                       
                                    </tr>
                                </thead>
                                  <tbody>
                                    <?php
                                      include("conn.php");
                                      $sql =  "SELECT* FROM applicant order by id desc";
                                      $up_cv = $conn->query($sql);
                                                  
                                      $counter=0; 
                                      while($row = $up_cv->fetch_assoc()) {?>
                                        <tr>
                                          <td><?php echo $counter; ?> </td>
                                          <td><?php echo $row['job_title']; ?> </td>
                                          <td><?php echo $row['name']; ?> </td>
                                          <td><?php echo $row['address']; ?> </td>
                                          <td><?php echo $row['email']; ?> </td>
                                          <td><?php echo $row['contact']; ?> </td>
                                          <td><?php echo $row['how_to_here']; ?> </td>
                                          <td><a href="../images/applicant/<?php echo $row['cv'];?>">Download CV</td>

                                        </tr>
                                      <?php }
                                    ?> 
                                  </tbody>
                              </table>
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

























