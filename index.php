<?php
session_start();
 require('db.php');
 include('head.php');
 ?>
<body>
<div id="main">
    <div class="login">
        <?php require('login.php'); ?>
    </div>
    <div class="banner"></div>
    <div class="movies">
        <?php
            require('search.php');
        ?>
    </div>
</div>
</body>