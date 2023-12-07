<?php 
    include_once "./env.php";
    include_once "./models/class.baseModel.php";
    include_once "./models/core/class.Forest.php";
    include_once "./models/core/class.Fire.php";

    // Get the name of the forest from the URL parameter
    $forestName = urldecode($_GET['name']);
    $forestFires = [];
    $perLoad = 100;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $perLoad;

    if($forestName && $forestName != ""){
        // Get the forest fires for the specified forest
        $forest = (new Forest())->getForestByName($forestName);
        $total = (new Fire())->getTotalFiresByForestName($forestName);
        $forestFires = (new Fire())->getFiresByForestName($forestName, $start, $perLoad);
        $pages = ceil($total / $perLoad);
        $firstItemNumber = $start + 1;
        $lastItemNumber = min($start + $perLoad, $total);
    }
