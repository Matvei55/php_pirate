<?php
require_once "./generator.php";
require_once "./result.php";

try {
    $gen = new Generatorr();
    $res = new Resultt($gen->getBoxes(), $gen->getShips());
    
    echo $res->getDisplayBoxCountByPirate(); 
    echo $res->getDisplayMaxGoldByPirate(); 
    echo $res->getDisplayMaxCurseByPirate();
    echo $res->getDisplayMaxEmptyByPirate();
    
} catch (Exception $e) {
    echo "Произошла ошибка: " . $e->getMessage();
}