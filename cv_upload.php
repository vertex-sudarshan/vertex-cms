<?php
           include("admin/conn.php");
           $category = $_POST['category'];

               if(is_uploaded_file($_FILES['cv']['tmp_name']))
              {   //$_FILES['img']['type']=="image/jpeg") ||        
                  
                      $file = $_FILES['cv']['name'];
                      $FileType = pathinfo($file,PATHINFO_EXTENSION);
                      $fileName = rand(11111,99999).'.'.$file; // renameing image

                     if(move_uploaded_file($_FILES['cv']['tmp_name'],"images/uploadCV/".$fileName)){
                     $sql="insert into upload_cv (category, cv) values('$category','$fileName')";                                  
                      $result = @mysqli_query($conn,$sql);
                      ?>
                      <script type="text/javascript">
                      
                      window.location="http://vertex/ambiencecare";
                      alert('Thank You For Your Upload CV');
                      </script>
                      <?php 
                     }else{
                      echo 'error';
                      die();
                     }
                     
                 
               
                
              }else{
                echo 'file error';
                die();
              }
           echo '';
           ?>
