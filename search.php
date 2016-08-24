<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="mainContent">
        <form class="form-horizontal form1" method="get" role="form">
            <div class="form-group">
                <div class="input-group col-sm-9">
                    <input class="form-control" id="tytul" name="tytul"
                    placeholder="Tytuł książki" type="text"> <select id=
                    "gatunek" name="gatunek">
                        <option>
                            Wybierz Gatunek
                        </option>
                        <option value="1">
                            Horror
                        </option>
                        <option value="2">
                            Kryminał
                        </option>
                        <option value="4">
                            Fikcja
                        </option>
                    </select> <span class="input-group-btn"><button class=
                    "btn btn-default btnSearchByName" type=
                    "button"><span class="input-group-btn"><span class=
                    "glyphicon glyphicon-search">Szukaj</span></span></button></span>
                </div>
            </div>
        </form>
        <div class="row">
            <table class="table" id="resultTable" style="display: none;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tytuł</th>
                        <th>Autor</th>
                        <th>Gatunek</th>
                        <th>Pobierz</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script src="js/jquery-1.10.2.js">
    </script> 
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.btnSearchByName').click(function(){
               
                makeAjaxRequest("tytul");
            });

            $('.form1').submit(function(e){
                e.preventDefault();
                validateData()
                makeAjaxRequest("tytul");
                return false;
            });
      
         

            function makeAjaxRequest(type) {
               
                    $.ajax({url: 'src/search.php',
                        type: 'get',
                        data: {tytul: $('input#tytul').val(),gatunek: $('select#gatunek').val()},
                        success: function(response) {
                            $('table#resultTable tbody').html(response);
                        }
                    });
            }
           
       
        });

        $(document).ready(
    function(){
        $(".input-group-btn").click(function () {
            $(".table").show("fast");
        });

    });
    </script>
</body>
</html>