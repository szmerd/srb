<?php
session_start();
 require('db.php');
 include('head.php');
 require('class.php');
 ?>
<body>
<div class="container">
    <div class="login">
        <?php require('login.php'); ?>
    </div>
    <div class="banner"></div>
    <div class="search">
        <?php include('search.php');?>
       
    </div>
    <div class="col-md-10">
    <?php include('movie-list.php'); ?>
    </div> 
</div>
</body>