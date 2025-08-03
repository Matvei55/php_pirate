<?php
require_once "./generator.php";
require_once "./result.php";

try {
    // 1. Исправляем имена классов
    $gen = new Generatorr();
    $res = new Resultt($gen->getBoxes(), $gen->getShips());
    echo $res->getDisplayBoxCountByPirate(); 
    echo $res->displayMaxGoldByPirate(); 
    echo $res->displayMaxCurseByPirate();
    echo $res->displayMaxEmptyByPirate();
    
} catch (Exception $e) {
    echo "Произошла ошибка: " . $e->getMessage();
}
?>