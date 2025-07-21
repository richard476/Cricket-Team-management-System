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

                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="simpleinput">Player Name</label>
                        <input type="text" id="name" name="name" value="" required class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label for="example-email">Country Name</label>
                        <select id="country" name="country" class="form-select" value="">
                            <option value="">--SELECT--</option>
                            <?php 
			          	$sql1 = "SELECT * FROM teams order by teams asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['teams'];?>
						 </option>
					<?php } ?>
                    </select>
                      </div>
                     
                      <div class="form-group mb-3">
                        <label for="example-palaceholder">Colour</label>
                      <select id="color" name="color" class="form-select" value="">
                            <option value="">--SELECT--</option>
                            <?php 
			          	$sql1 = "SELECT * FROM teams order by color asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?>
						 </option>
					<?php } ?>
                    </select>
                      </div>
                    
                      <div class="form-group mb-3">
                        <label for="example-palaceholder">Jersey No</label>
                        <input type="text" id="no" name="no" class="form-control" value="">
                      </div>
                      <div class="form-group mb-3">
                        <label for="example-palaceholder">Age</label>
                        <input type="text" id="age" name="age" class="form-control" value="">
                      </div>
                    </div> 
                       </div>
                    </div>
                    <div style="padding-left:15px">
                    <a href="player_list.php" class="btn mb-2 btn-dark">Cancel</a>
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
<div style="margin-top:0px;padding-left:100px"><?php include 'footer.php';?></div>

<?php
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$country=$_POST['country'];
$color=$_POST['color'];
$age=$_POST['age'];
$no=$_POST['no'];



    $sql2="insert into player  (name,country,color,age,no) VALUES ('$name','$country','$color','$age','$no')"; 
    $res2=mysqli_query($conn, $sql2);


if($res2) { 
 
 echo "<script>alert('Player Data Entered Successfully');window.location='player.php';</script>";
 
}

else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}
}
?>  