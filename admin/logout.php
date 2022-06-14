<?php
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
echo"<script>
alert('You are logged out');
window.location.href='../index.php';
</script>";
?>