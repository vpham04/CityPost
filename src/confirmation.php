<?php
session_start();
echo "Password changed";
header("refresh:1;url=" . $_SESSION['returnpage']);
