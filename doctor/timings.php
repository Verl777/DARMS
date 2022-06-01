<?php include "../includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php";


if(isset($_POST['submit']))
{
    if(isset($_GET['user_id']))
    {
    $query ="UPDATE timings SET doctor_id='$_POST[user_role]',start_time='$_POST[starttime]',end_time='$_POST[endtime]',status='$_POST[status]'  WHERE timing_id='$_GET[user_id]'";
        if($results = mysqli_query($connection,$results))
        {
?>

         <div class="popup popup--icon -success js_success-popup popup--visible">
          <div class="popup__background"></div>
          <div class="popup__content">
            <h3 class="popup__content__title">
              Success 
            </h3>
            <p>Doctor Timings record updated successfully.</p>
            <p>
             <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
             <?php echo "<script>setTimeout(\"location.href = 'view-visiting-hour.php';\",1500);</script>"; ?>
            </p>
          </div>
        </div>
<?php
            //echo "<script>alert('Doctor Timings record updated successfully...');</script>";
            //echo "<script>window.location = 'view-visiting-hour.php';</script>";
        }
        else
        {
            echo mysqli_error($connection);
        }   
    }
    else
    {
    $query ="INSERT INTO timings(doctor_id,start_time,end_time,status) values('$_POST[selectdoctor]','$_POST[start_time]','$_POST[end_time]','$_POST[status]')";
    if($results = mysqli_query($connection,$query))
    {
?>
         <div class="popup popup--icon -success js_success-popup popup--visible">
          <div class="popup__background"></div>
          <div class="popup__content">
            <h3 class="popup__content__title">
              Success 
            </h3>
            <p>Doctor Timings record inserted successfully.</p>
            <p>
             <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
             <?php echo "<script>setTimeout(\"location.href = 'visiting-hours.php';\",1500);</script>"; ?>
            </p>
          </div>
        </div>
<?php
        //echo "<script>alert('Doctor Timings record inserted successfully...');</script>";
        //echo "<script>window.location = 'view-visiting-hour.php';</script>";
    }
    else
    {
        echo mysqli_error($connection);
    }
}
}
if(isset($_GET['editid']))
{
    $query="SELECT * FROM timings WHERE timing_id='$_GET[editid]' ";
    $results = mysqli_query($connection,$query);
    $rsedit = mysqli_fetch_array($results);
    
}
?>

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
<!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
</div>
</div>
</div>
</div>
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<!-- <h5>Basic Inputs Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
</div>
<div class="card-block">
<form id="main" method="post" action="timings.php" enctype="multipart/form-data">
    <?php
        if(isset($_SESSION['doctor_id']))
        {
            echo "<input class='form-control'  type='hidden' name='select2' value='$_SESSION[doctor_id]' >";
        }
        else
        {
        ?> 
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Doctor</label>
            <div class="col-sm-8">
                <select class="text-input"  name="selectdoctor" id="selectdoctor">
                   <option value="">Select</option>
                   <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'darms');
                    $query = "SELECT * FROM users WHERE user_role='doctor' AND status='active' ";
                    $select_all_doctors = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_doctor)) {

                        $user_id = $row['user_id'];

                        $fullname = $row['fullname'];
                    ?>
                        <option value="<?php $user_id; ?>"><?php echo $fullname; ?></option>
                    <?php } ?>

                  </select>
                <span class="messages"></span>
            </div>
        </div>
    <?php } ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">From</label>
        <div class="col-sm-8">
            <input class="form-control"  type="time" name="starttime" id="starttime" value="<?php echo $rsedit['start_time']; ?>"></td>
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">To</label>
        <div class="col-sm-8">
            <input  class="form-control" type="time" name="endtime" id="endtime"  value="<?php echo $rsedit['end_time']; ?>" >
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-8">
            <select name="status" id="status" class="form-control" required="">
                <option value="">-- Select One -- </option>
                <option value="Active" <?php if(isset($_GET['editid']))
        { if($rsedit['status'] == 'Active') { echo 'selected'; } } ?>>Active</option>
                <option value="Inactive" <?php if(isset($_GET['editid']))
        { if($rsedit['status'] == 'Inactive') { echo 'selected'; } } ?>>Inactive</option>
            </select>
            <span class="messages"></span>
        </div>        
    </div>


    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button type="submit" name="submit" class="btn">Submit</button>
        </div>
    </div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include "includes/footer.php"; ?>