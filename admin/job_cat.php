<?php include'includes/header.php';  ?>

        <div id="page-wrapper">
            <div class="row">
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="job_cat_add.php" class="btn"><button class="btn btn-success">POST A JOB CATEGORY</button></a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                    <tr>
                                      <th>#</th> 
                                        <th>TItle</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                  <tbody>
                                    <?php
                                      include("conn.php");
                                      $sql =  "SELECT* FROM job_category order by cat_id desc";
                                      $jobs_cat = $conn->query($sql);
                                                  
                                      $counter=0; 
                                      while($row = $jobs_cat->fetch_assoc()) {?>
                                        <?php
                                      
                                        echo "<tr>";
                                        echo"<td>".++$counter."</td>";
                                        echo"<td>".$row['cat_name']."</td>";
                                        echo"<td>".strip_tags( substr($row['cat_description'] ,0,200))."</td>"; 

                                        ?>
                                        <td><?php if($row['status']==1){echo "<span class='publish'>Publish</span>";}else{ echo "<span class='unpublish'>UnPublish<span>";}?></td>
                                        <td>
                                              
                                              <a href="job_cat_edit.php?id=<?php echo $row['cat_id'];?>"><i class='glyphicon glyphicon-edit'></i></a>
                                              
                                        <a href="#" onclick="return deleteJobCat('<?php echo $row['cat_id'];?>')"  ><i class='glyphicon glyphicon-remove icon-spacer'></i></a></td>
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


<script>
  var id;

  function deleteJobCat(id){ 
      var text = confirm('Are you sure?'); 
      
      if(text == true){
           $.ajax({
              data:{ 'id':id, 'action':'delete_job_cat'} ,
              url: "ajax_delete.php",
              type: "POST",
                 beforeSend: function(){
                     
                 },
              success:function(data){ 
                  alert('success');
                  window.location.reload();
              }
          });
          
      };
      return text;
      };

</script>     


























