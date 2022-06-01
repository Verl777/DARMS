
<?php include "../includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php";
if(isset($_GET['id']))
{
  $query="UPDATE timings SET delete_status='1' WHERE timing_id='$_GET[id]'";
  $results=mysqli_query($connection,$query);
  if(mysqli_affected_rows($connection) == 1)
  {
?>
         <div class="popup popup--icon -success js_success-popup popup--visible">
          <div class="popup__background"></div>
          <div class="popup__content">
            <h3 class="popup__content__title">
              Success 
            </h3>
            <p>Visiting Hour record deleted successfully.</p>
            <p>
             <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
             <?php echo "<script>setTimeout(\"location.href = 'visiting-hours.php';\",1500);</script>"; ?>
            </p>
          </div>
        </div>
     <?php
    //echo "<script>alert('Visiting Hour record deleted successfully..');</script>";
    //echo "<script>window.location='view-visiting-hour.php';</script>";
  }
}
?>
<?php
if(isset($_GET['delid']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Are You Sure To Delete This Record?</p>
    <p>
      <a href="visiting-hours.php?id=<?php echo $_GET['delid']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="visiting-hours.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Visiting Hour</h4>

</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Visiting Hour</a>
</li>
<li class="breadcrumb-item"><a href="#">Visiting Hour</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-header">
    <div class="col-sm-10">
    </div>
<!-- <h5>DOM/Jquery</h5>
<span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span> -->
</div>
<div class="card-block">
<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
<tr>
    <th>Doctor</th>
    <th>Timings available</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php
    $query ="SELECT * FROM timings where doctor_id='$_SESSION[user_id]' and delete_status='0'";
    $results = mysqli_query($connection,$query);
    while($rs = mysqli_fetch_array($results))
    {
      $querydoctor = "SELECT * FROM users WHERE doctor_id='$rs[doctor_id]'";
      $results_doctor = mysqli_query($connection,$querydoctor);
      $rsdoctor = mysqli_fetch_array($results_doctor);
      
      $querydoct = "SELECT * FROM timings WHERE timing_id='$rs[timing_id]'";
      $results_doct = mysqli_query($connection,$querydoct);
      $rsdoct = mysqli_fetch_array($results_doct);
      
        echo "<tr>
          <td>&nbsp;$rsdoctor[fullname]</td>
          <td>&nbsp;$rsdoct[start_time] - $rsdoct[end_time]</td>
          <td>&nbsp;$rs[status]</td>
          <td width='250'>&nbsp;<a href='visiting-hour.php?editid=$rs[timing_id]' class='btn btn-primary'>Edit</a>  <a href='visiting-hours.php?delid=$rs[timing_id]' class='btn btn-danger'>Delete</a> </td>
        </tr>";
    }
    ?>
          
        </tbody>
<tfoot>
<tr>
    <th>Doctor</th>
    <th>Timings available</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</tfoot>
</table>
</div>
</div>
</div>




</div>

</div>
</div>

<div id="#">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('footer.php');?>
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
     <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
      <!-- <button class="button button--success" data-for="js_success-popup">Close</button> -->
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
     <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
     <!--  <button class="button button--error" data-for="js_error-popup">Close</button> -->
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>