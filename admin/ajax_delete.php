<?php 
$id =  $_POST['id'];
//$image = $_POST['img'];
	 @include("conn.php");


    if($_POST['action']=='delete_job'){
        
        $sql =  "DELETE FROM  jobs where id=$id";
        $jobs = $conn->query($sql);
        return $jobs;
        
    }elseif($_POST['action']=='delete_job_cat'){
        
       
        $sql =  "DELETE FROM  job_category where cat_id=$id";
        $jobs = $conn->query($sql);
        return $jobs;
    }elseif($_POST['action']=='delete_testomonials'){
        $sql =  "DELETE FROM  testimonials where id=$id";
        $jobs = $conn->query($sql);
        return $jobs;
    }

