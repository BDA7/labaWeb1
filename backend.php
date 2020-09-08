<?php
header("Location:" . $_SERVER['HTTP_REFERER']);
session_start();
$Destroy = $_GET['destroy'];
if ($Destroy == "очистить сессию") {
    session_destroy();
}
$start_work = microtime();
date_default_timezone_set('Europe/Moscow');
$time = date('Y-m-d H:i:s A');
$X = $_GET['X'];
$Y = $_GET['y'];
$R = $_GET['R'];
$say = "точка не входит в область";
if (!preg_match("/^[a-zA-Zа-яА-ЯёЁ\._\- ]+$/", $Y)) {
    $Y = floatval($Y);
    if ($Y > -3 && $Y < 5) {
        if (in_array($X, array(-3, -2, -1, 0, 1, 2, 3, 4, 5)) && in_array($R, array(1, 2, 3, 4, 5))) {
            if ($X >= 0 && $Y >= 0) {
                if ($Y <= -2 * $X + $R) {
                    $say = "точка входит в область";
                } else
                    $say = "точка не входит в область";
            }

            if ($X >= 0 && $Y <= 0) {
                if (pow($X, 2) + pow($Y, 2) <= pow($R, 2)) {
                    $say = "точка входит в область";
                } else
                    $say = "точка не входит в область";
            }

            if ($X <= 0 && $Y >= 0) {
                $say = "точка не входит в область";
            }

            if ($X <= 0 && $Y <= 0) {
                if ($X >= -$R && $Y >= -$R / 2) {
                    $say = "точка входит в область";
                } else
                    $say = "точка не входит в область";
            }
        } else return;
    }else return;
    $finish_work = microtime();
    $work_time = $finish_work - $start_work;
    if (!isset($_SESSION["db"])) {
        $_SESSION["db"] = array();
    }

    $str_result = "<tr>
                        <td>$time</td>
                        <td>$work_time</td>
                        <td>$X</td>
                        <td>$Y</td>
                        <td>$R</td>
                        <td>$say</td>
                    </tr>";
} else return;

array_push($_SESSION["db"], $str_result);
if (count($_SESSION["db"]) > 8) {
    session_destroy();
}
