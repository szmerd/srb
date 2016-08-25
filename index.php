<?php
session_start();
 require('db.php');
 include('head.php');
 require('class.php');
$n=new Database();
$n->connect();
$n->db();
 ?>
<body style="background: url(img/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<div class="container">
    <div class="login">
        <?php require('login.php'); ?>
    </div>
    <div class="banner"></div>
    <div class="search">
        <!-- <?php include('search.php');?> -->
       
    </div>
    <div class="movies col-md-12">
    <?php include('movie-list.php'); ?>
    </div> 

</div>
</body>