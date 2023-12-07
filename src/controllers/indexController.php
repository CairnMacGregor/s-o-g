<?php

include_once "./env.php";
include_once "./models/class.baseModel.php";
include_once "./models/core/class.Forest.php";
include_once "./models/core/class.Fire.php";

$perLoad = 100;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $perLoad;


$forests = (new Forest())->getUniqueForestNamesPaginated($start, $perLoad);
$total = (new Forest())->getTotalForests();
$pages = ceil($total / $perLoad);
$firstItemNumber = $start + 1;
$lastItemNumber = min($start + $perLoad, $total);