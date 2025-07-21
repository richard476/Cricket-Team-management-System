<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    $id= $_GET['id'];
    
    $sql = "DELETE FROM player WHERE id = '$id'";
    $result=mysqli_query($conn ,$sql);
    
    if($result){
       
        $data['sts'] = 'ok';
       
    } 
    
    
    //returns data as JSON format
    echo json_encode($data);
}
?>