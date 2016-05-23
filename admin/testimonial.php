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
                            <a href="testimonial_add.php" class="btn"><button class="btn btn-success">ADD</button></a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                    <tr>
                                      <th>#</th> 
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                  <tbody>
                                    <?php
                                      include("conn.php");
                                      $sql =  "SELECT* FROM testimonials order by id desc";
                                      $testimonials = $conn->query($sql);
                                                  
                                      $counter=0; 
                                      while($row = $testimonials->fetch_assoc()) {?>
                                        <?php
                                      
                                        echo "<tr>";
                                        echo"<td>".++$counter."</td>";
                                        echo"<td>".$row['name']."</td>";
                                        echo"<td>".strip_tags( substr($row['description'] ,0,200))."</td>"; 

                                        ?>
                                        <td>
                                              
                                              <a href="testimonial_edit.php?id=<?php echo $row['id'];?>"><i class='glyphicon glyphicon-edit'></i></a>
                                              
                                        <a href="#" onclick="return deleteTestomonial('<?php echo $row['id'];?>')"  ><i class='glyphicon glyphicon-remove icon-spacer'></i></a></td>
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

  function deleteTestomonial(id){ 
      var text = confirm('Are you sure?'); 
      
      if(text == true){
           $.ajax({
              data:{ 'id':id, 'action':'delete_testomonials'} ,
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


























