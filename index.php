<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Laba 1 Web</title>

    <script type="text/javascript">
        function validate(form){
            var Y = form.y.value;
            if (Y === "" || Y === null || Y === " "){
                alert("Введите число");
                return false;
            }
            if (Y<-3 || Y>5){
                alert('Введите число соответствующее диапазону');
                return false;
            }
            if (!Y.match(/[0-9]+/)){
                alert("Введите число");
                return false;
            }


        }
    </script>
</head>
    <body class="body">
        <header class="bord">
            <font face="serif">
                <div class="Emblem" id="Emblem">
                    <img src="Ebml.png" height="100px" width="200px">
                    Лабораторная работа №1 Вариант 2102 Бондаренко Данила
                </div>
            </font>
        </header>



            <div class="row mb-2">
                <div><img src="Lab.png" height="300px" width="400"></div>
                <div><table class="table table-striped table-sm" border="3px">
                    <tr>
                        <th>Дата и время запроса</th>
                        <th>Время выполнения работы</th>
                        <th>Координата X</th>
                        <th>Координата Y</th>
                        <th>R</th>
                        <th>Результат</th>
                    </tr>
                    <?php
                    if (isset($_SESSION["db"]))
                        foreach ($_SESSION["db"] as $item)
                            print $item
                    ?>
                    </table>
                </div>
            </div>


            <center>
                 <form name="form" onsubmit="return validate(this)" action="backend.php" method="get" id="form">
                    <p>
                        <select class="custom-select d-block w-100" required name="X">
                            <option value>Выберите Х</option>
                            <option value="-3" id="X-3">-3</option>
                            <option value="-2" id="X-2">-2</option>
                            <option value="-1" id="X-1">-1</option>
                            <option value="0" id="X0">0</option>
                            <option value="1" id="X1">1</option>
                            <option value="2" id="X2">2</option>
                            <option value="3" id="X3">3</option>
                            <option value="4" id="X4">4</option>
                            <option value="5" id="X5">5</option>
                        </select>
                    </p>

                    <p><input name="y" type="text" class="form-control" placeholder="Введите Y в диапазоне (-3; 5):" required></p>

                    <p>
                        <select class="custom-select d-block w-100" required name="R">
                            <option value>Выберите R</option>
                            <option value="1" id="R1">1</option>
                            <option value="2" id="R2">2</option>
                            <option value="3" id="R3">3</option>
                            <option value="4" id="R4">4</option>
                            <option value="5" id="R5">5</option>
                        </select>
                    </p>
                    <input type="submit" class="btn btn-danger" name="submit" value="Отправить">

                </form><br>

                <form name="destroyed"  action="backend.php">
                    <input type="submit" class="button-destroy" name="destroy" value="очистить сессию"><label for="destroy"></label>
                </form>
            </center>



    </body>
</html>

