    <?php include "includes/header.php"; ?>
    <?php include "includes/navigation.php"; ?>
    <?php include "includes/sidebar.php"; ?>
    <!-- content area -->
    <div class="article">
        <style>
            .article {
                background-image: url(therapist.jpg);
                background-size: cover;

            }
        </style>
         <!-- A notification message displays when you login -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
        <marquee behavior="alternate" direction="left|right">
            <h1>Welcome to the Therapist Dashboard</h1>
        </marquee>
    </div>
    <?php include "includes/footer.php"; ?>