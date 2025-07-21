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

              <h2 class="page-title" >Player Details</h2>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong style="padding-right:1000px" class="card-title"></strong>
                  <a href="player_list.php" class="btn mb-2 btn-secondary"><span class="fe fe-eye fe-12 mr-2"></span>View Player</a>
                </div>
                <div class="card-body">
                <?php
                    
                    $sno=1;
    // LOOP TILL END OF DATA
    $sql = " SELECT * FROM player WHERE id='$sid'";
$result =mysqli_query($conn, $sql);
$wz1=mysqli_fetch_array($result);

?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="simpleinput">Player Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $wz1['name'];?>" required class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="example-email">Country Name</label>
                        <select name="country" id="country" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM teams order by country asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['country']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['country'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                      </div>
                     
                      <div class="form-group mb-3">
                        <label for="example-palaceholder">Colour</label>
                         <select name="color" id="color" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM teams order by color asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['color']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                        
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput">Jersey No</label>
                        <input type="text" id="no" name="no" value="<?php echo $wz1['no'];?>" required class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="simpleinput">Age</label>
                        <input type="text" id="age" name="age" value="<?php echo $wz1['age'];?>" required class="form-control">
                      </div>
                    </div> <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <label for="example-textarea">Add Notes</label>
                        <textarea class="form-control" id="descr" name="descr"  rows="4"><?php echo $wz1['descr'];?></textarea>
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
$name=$_POST['name'];
$no=$_POST['no'];
$age=$_POST['age'];
$country=$_POST['country'];
$color=$_POST['color'];
$descr=$_POST['descr'];



    $sql2="UPDATE player SET name='$name',country='$country',color='$color',descr='$descr',no='$no',age='$age' WHERE id='$sid'"; 
    $res2=mysqli_query($conn, $sql2);


if($res2) { 
 
 echo "<script>alert('Player Data Updated Successfully');window.location='player_list.php';</script>";
 
}

else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}
}
?>  