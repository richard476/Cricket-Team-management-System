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
      <div class="card">
               <div 
                      class="card-header sticky-element bg-label-success d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" >TEAMS LIST</h5>
                      <div class="action-btns">
                        
                        <div
                          class="offcanvas offcanvas-end"
                          tabindex="-1"
                          id="offcanvasEnd"
                          aria-labelledby="offcanvasEndLabel">
                          <div class="offcanvas-header">
                            <h5 id="offcanvasEndLabel" class="offcanvas-title">Enter Team Details</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"></button>
                          </div>
                          <form action="" method="post" enctype="multipart/form-data">
                          <div class="modal-body" style="padding-top:50px">
                          <div  hidden class="col-md-11" style="padding-left:20px">
                                <label  hidden class="form-label" style="width:" for="formtabs-country">ID</label>
                                <input
                          type="text"
                          class="form-control"
                          id="id" hidden
                          placeholder="CSK..."
                          name="id"
                          aria-label="John Doe" />
                                </div><br>
                          <div class="col-md-11" style="padding-left:20px">
                                <label class="form-label" style="width:" for="formtabs-country">Team</label>
                                <input
                          type="text"
                          class="form-control"
                          id="teams"
                          placeholder="CSK..."
                          name="teams"
                          aria-label="John Doe" />
                                </div><br>
                          <div class="col-md-11" style="padding-left:20px">
                                <label class="form-label" style="width:" for="formtabs-country">Country</label>
                                <input
                          type="text"
                          class="form-control"
                          id="country"
                          placeholder="India"
                          name="country"
                          aria-label="John Doe" />
                                </div>
                                <br>
                          <div class="col-md-11" style="padding-left:20px">
                                <label class="form-label" style="width:" for="formtabs-country">Colour</label>
                                <input
                          type="text"
                          class="form-control"
                          id="color"
                          placeholder="Yellow Jersey"
                          name="color"
                          aria-label="John Doe" />
                                </div>
                                <br>
                           <button type="submit" name="submit" value="submit" onSubmit="return true" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
                            <button
                              type="button"
                              class="btn btn-label-dark d-grid w-100"
                              data-bs-dismiss="offcanvas">
                              Cancel
                            </button>
                         </form>
                          </div>
                          </div>
                        </div>
                     
                      <!-- <button
                        type="button"
                        class="btn btn-icon btn-warning"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Print">
                        <span class="ti ti-printer"></span>
                      </button>
                    
                      &nbsp;  <button type="button" 
                class="btn btn-icon btn-secondary"
                data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="PDF">
                  <span class="ti ti-file"></span>
                   </button> -->
               &nbsp;   <button class="btn btn-secondary add-new btn-primary" tabindex="0" onclick="addParty();" 
              
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEnd"
                          aria-controls="offcanvasEnd"><span>
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Add New Team</span></span></button>
                      </div>
                    </div>
                <table class="table table-hover">
                    <thead>
                      <tr>
                      <th><div align="center">S.No</div></th>   
                      <th>TEAM NAME</th>
                      <th>COUNTRY NAME</th>
                        <th>JERSEY COLOUR</th>
                        <th style="padding-left:80px">ACTION</td>
                       </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                                      
                  
                  
                                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM teams order by id desc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                    
                  ?>
                    <td hidden><input type="text" name="cid" hidden id ="cid<?php echo $sno;?>" value="<?php echo $rows['id'];?>"></td>
                  <tr>
                      <!-- FETCHING DATA FROM EACH
                          ROW OF EVERY COLUMN -->
                       <td align="center"><?php echo $sno;?></td>
                      <td><?php echo $rows['teams'];?></td>
                      <td><?php echo $rows['country'];?></td>
                      <td><?php echo $rows['color'];?></td>
                      <td>
                      <a href="team_upd.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </a>
                          <a  href="ajax/delteam.php?cid=<?php echo base64_encode($rows['id']);?>"
                             type="button" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="del(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>


                 
                                          </td>
                      </tr>
                      <?php 
                  $sno++;
                      }
                    
                    }
                 else{  ?>
               <tr><td colspan="7" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?> 
                    </tbody>
                                    </table>
                 
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


if($teams!=""){
 $sql3="insert into teams(teams,country,color) 
 values('$teams','$country','$color')"; 
$res1=mysqli_query($conn, $sql3);
}
if($res1) { 
 
  echo "<script>alert('Team Data Entered Successfully');window.location='team.php';</script>";
 
}

else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}
}
?>  


<script>
function del(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
  // alert(c);
  var cid=document.getElementById('cid'+c).value;
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='team.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delteam.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>