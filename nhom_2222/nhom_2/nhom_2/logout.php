<?php
session_start();
session_destroy();
header('location: index.php?act=dang_nhap');
die;
?>