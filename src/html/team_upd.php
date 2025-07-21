<?php include 'config.php';?>
<!doctype html>
<html lang="en">
    
<?php include 'head.php'; ?>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
    <?php include 'sidebar.php'; ?>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <div style="padding-left:280px"><?php include 'header.php'; ?></div>
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <br>
        <br>
        <br>
        <br>
        <br>
        <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
      <!--  Header Start -->
      <!--  Header End -->
      <div class="row ">
            <div class="col-12">
            <form action="" method="post" enctype="multipart/form-data" >

              <h2 class="page-title" >Team Details</h2>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong style="padding-right:1000px" class="card-title"></strong>
                  <a href="team.php" class="btn mb-2 btn-secondary"><span class="fe fe-eye fe-12 mr-2"></span>View Teams</a>
                </div>
                <div class="card-body">
                <?php
                    
                    $sno=1;
    // LOOP TILL END OF DATA
    $sql = " SELECT * FROM teams WHERE id='$sid'";
$result =mysqli_query($conn, $sql);
$rows=mysqli_fetch_array($result);

?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="simpleinput">Team Name</label>
                        <input type="text" id="teams" name="teams" value="<?php echo $rows['teams'];?>" required class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="example-email">Country Name</label>
                        <input type="text" id="country" name="country" class="form-control" value="<?php echo $rows['country'];?>">
                      </div>
                     
                      <div class="form-group mb-3">
                        <label for="example-palaceholder">Colour</label>
                        <input type="text" id="color" name="color" class="form-control" value="<?php echo $rows['color'];?>">
                      </div>
                    </div> <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <label for="example-textarea">Add Notes</label>
                        <textarea class="form-control" id="descr" name="descr"  rows="4"><?php echo $rows['descr'];?></textarea>
                      </div>
                      
                    </div>
                    <div style="padding-left:15px">
                    <a href="team.php" class="btn mb-2 btn-dark">Cancel</a>
                    <button type="submit" name="submit" value="submit" class="btn mb-2 btn-success">Submit</button>
                  </div>
                  </div>
</form>
                </div>
              </div> <!-- / .card -->
               <!-- end section -->
            </div> <!-- .col-12 -->
          </div> 
                 
                </div>
    </div>
  </div>
  
</body>

</html>
<div style="margin-top:370px;padding-left:100px"><?php include 'footer.php';?></div>

<?php
if(isset($_POST['submit']))
{
$teams=$_POST['teams'];
$country=$_POST['country'];
$color=$_POST['color'];
$descr=$_POST['descr'];



    $sql2="UPDATE teams SET teams='$teams',country='$country',color='$color',descr='$descr' WHERE id='$sid'"; 
    $res2=mysqli_query($conn, $sql2);


if($res2) { 
 
 echo "<script>alert('Team Data Updated Successfully');window.location='team.php';</script>";
 
}

else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}
}
?>  