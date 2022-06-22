<?php include "includes/therapist_functions.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php"; ?>



<div class="card-block">
    <style>
        form {
            margin-left: 300px;
        }

        .timings {
            margin-bottom: 20px;
        }

        .details input,
        select {
            width: 50%;
            height: 30px;
        }

        .details input:hover {
            background-color: aqua;
        }

        .details select:hover {
            background-color: aqua;
        }

        .label1 {
            font-size: 18px;
            font-weight: bold;

        }

        .submit {
            margin-left: 450px;
        }

        .submit button {
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
            background-color: darkcyan;
            border-radius: 10px;
        }

        .submit button:hover {
            background-color: blueviolet;

        }
    </style>
    <form id="main" method="post" action="t_timings.php">

        <div class="timings">
            <label class="label1">Therapist</label>
            <div class="details">
                <select class="text-input" name="selecttherapist" id="selecttherapist">
                    <option value="">Select</option>
                    <?php
                    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                    $query = "SELECT * FROM users WHERE user_role='therapist' AND status='active' ";
                    $select_all_therapists = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_therapists)) {

                        $user_id = $row['user_id'];

                        $fullname = $row['fullname'];
                    ?>
                        <option value="<?php echo $user_id; ?>"><?php echo $fullname; ?></option>
                    <?php } ?>

                </select>
            </div>
        </div>
        <div class="timings">
            <label class="label1">From</label>
            <div class="details">
                <input class="form-control" type="text" name="starttime" id="starttime"></td>
            </div>
        </div>

        <div class="timings">
            <label class="label1">To</label>
            <div class="details">
                <input class="form-control" type="text" name="endtime" id="endtime">
            </div>
        </div>
        <div class="timings">
            <label class="label1">Day available</label>
            <div class="details">
                <select class="day" name="day" id="day">
                    <option value="">Day of the week</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                </select>
            </div>
        </div>

        <div class="timings">
            <label class="label1">Status</label>
            <div class="details">
                <select name="status" id="status" class="form-control">
                    <option value="">-- Select One -- </option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
        </div>


        <div class="timings">
            <label class="label1"></label>
            <div class="submit">
                <button type="submit" name="timingsubmit" class="btn">Submit</button>
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