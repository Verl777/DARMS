    <!-- sidebar area -->
    <div class="aside">
        <style>
            summary {
                font-size: 20px;
                color: #fff;
                margin: 8px;
            }
        </style>
        <ul class="links">
            <li style="border:2px solid white;text-align:center;border-radius:10px;margin-right:10px;"><a href="dashboard.php" class="aside_links">Dashboard</a></li>
            <!-- <li>Appointment
                <ul>
                    <li><a href="appointments.php" class="aside_links">View Appointments</a></li>
                    <li><a href="#" class="aside_links">Approve Appointments</a></li>
                </ul>
            </li> -->
            <details class="app">
                <summary>Appointments</summary>
                <ul>
                    <li><a href="appointments.php" class="aside_links">View Appointments</a></li>
                    <li><a href="approve.php" class="aside_links">Approve Appointments</a></li>
                </ul>
            </details>
            <!-- <li>Visiting hours
                <ul>
                    <li><a href="visiting-hours.php" class="aside_links">View Visiting Hours</a></li>
                    <li><a href="timings.php" class="aside_links">New Visiting Hours</a></li>
                </ul>
            </li> -->
            <details class="visit">
                <summary>Visiting Hours</summary>
                <ul>
                    <li><a href="visiting-hours.php" class="aside_links">View Visiting Hours</a></li>
                    <li><a href="timings.php" class="aside_links">New Visiting Hours</a></li>
                </ul>
            </details>
            <!-- <li>Prescription
                <ul>
                    <li><a href="prescription.php" class="aside_links">Add Prescription</a></li>
                    <li><a href="viewprescription.php" class="aside_links">View</a></li>
                </ul>
            </li> -->
            <details class="visit">
                <summary>Prescription</summary>
                <ul>
                    <li><a href="prescription.php" class="aside_links">Add Prescription</a></li>
                    <li><a href="viewprescription.php" class="aside_links">View</a></li>
                </ul>
            </details>
            <li><a href="#" class="aside_links">View Seen Patients</a></li>
            <li style="border:2px solid white;margin-left:20px;margin-right:80px;text-align:center;border-radius:10px;"><a href="logout.php" class="aside_links">Logout</a></li>
        </ul>
    </div>
    <script>
        const detailsElement = document.querySelector('.app');
        const detailsElement = document.querySelector('.visit');

        detailsElement.addEventListener('toggle', event => {
            if (event.target.open) {
                console.log('open');
            } else {
                console.log('closed');
            }
        });
    </script>