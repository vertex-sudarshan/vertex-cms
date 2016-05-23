<?php include'includes/header.php';  ?>

        <div id="page-wrapper">
            <div class="row">
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <h4>Uploaded CV</h4>
                        <div class="panel-body">
                            <div class="row">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                    <tr>
                                      <th>#</th> 
                                        <th>Category</th>
                                        <th>CV</th>
                                        
                                       
                                    </tr>
                                </thead>
                                  <tbody>
                                    <?php
                                      include("conn.php");
                                      $sql =  "SELECT* FROM upload_cv order by id desc";
                                      $up_cv = $conn->query($sql);
                                                  
                                      $counter=0; 
                                      while($row = $up_cv->fetch_assoc()) {?>
                                        <?php
                                      
                                        echo "<tr>";
                                        echo"<td>".++$counter."</td>";
                                        echo"<td>".$row['category']."</td>";
                                       

                                        ?>
                                       <td><a href="../images/uploadCV/<?php echo $row['cv']; ?>">Download CV</td>
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

























