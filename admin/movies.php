<?php
pokaz_filmy();

 ?>

<div id="wrapper">

</div>

<script type="text/javascript">
$(function () {
var opt = {
    autoOpen: false,
    title: 'Dodaj film',
    position: 'center' ,
    width : 800,
    height : 200, 
    resizable : false,
    modal : true,
};
$('.opener').click(function() {
  
        $("#wrapper").html("<iframe width='100%' height='200px' frameborder='0' scrolling='yes' marginheight='0' marginwidth='0' src='admin/add_movie.php''></iframe>");  

        $("#wrapper").dialog(opt).dialog("open");

});
});
</script>