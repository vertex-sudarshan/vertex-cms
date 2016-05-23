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
                            <a href="job_add.php" class="btn"><button class="btn btn-success">POST A JOB</button></a> 
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
                                      $sql =  "SELECT* FROM jobs order by id desc";
                                      $jobs = $conn->query($sql);
                                                  
                                      $counter=0; 
                                      while($row = $jobs->fetch_assoc()) {?>
                                        <?php
                                        $picture = urlencode($row['job_image']); ?>
                                        <tr>
                                         <td><?php echo ++$counter ?></td>
                                         <td><?php echo $row['job_title'] ?></td>
                                         <td><?php echo strip_tags( substr($row['Job_description'] ,0,200)) ?></td> 

                                         <td class="status"><?php if($row['status']==1){echo "<span class='fa fa-check check'></span>";}else{ echo "<span class='fa fa-times unchecked'><span>";}?></td>
                                         <td>
                                              
                                              <a href="edit_job.php?id=<?php echo $row['id'];?>"><i class='glyphicon glyphicon-edit'></i></a>
                                              
                                        <a href="#" onclick="return deleteJob('<?php echo $row['id'];?>')"  ><i class='glyphicon glyphicon-remove icon-spacer'></i></a></td>
                                        </tr>
                                     <?php  }
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

  function deleteJob(id){ 
      var text = confirm('Are you sure?'); 
      
      if(text == true){
           $.ajax({
              data:{ 'id':id, 'action':'delete_job'} ,
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

      function showJo(id){ 
     
           $.ajax({
              data:{ 'id':id} ,
              url: "ajax_show.php",
              type: "POST",
                 beforeSend: function(){
                     
                 },
              success:function(data){ 
                  alert('success');
                  window.location.reload();
              }
          });
          
    
      
      };



</script>     



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Job Details</h4>
      </div>
      <div class="modal-body">
        <p>Job Title: <b>First Job TItle</b></p>
        <p>Job Description: <b>
Why do we use it?
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).


</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>























