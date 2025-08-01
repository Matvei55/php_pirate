<?php
include_once '/home/matvei/prolects_php/generator.php';

class Pirate {
    private $name = '';
    
    public function __construct(string $name) {
        $this->name = $name;
    }
    
    public function getName(): string {
        return $this->name;
    }
    
    public function setName(string $name): void {
        $this->name = $name;
    }
}

class Ship {
    private $weight;
    private $pirate;
    private $boxes = [];
    private $free_weight;

    public function __construct(float $weight, Pirate $pirate) {
        if ($weight >= 60) {
            throw new Exception("Слишком большой вес должно быть меньше 60 кг");
        }
        $this->weight = $weight;
        $this->free_weight = $weight;
        $this->pirate = $pirate;
    }

    
    public function addBox(Box $box): void {
        if ($box->getWeight() > $this->free_weight) {
            throw new Exception("Коробка слишком большая " . $box->getWeight());
        }
        $this->boxes[]=$box;
        $this->free_weight -= $box->getWeight();
    }

    public function getWeight(): float {
        return $this->weight;
    }

    public function getPirate(): Pirate {
        return $this->pirate;
    }

    public function getBoxes():array {
        return $this->boxes;
    }
    
    public function getFreeWeight(): float {
        return $this->free_weight;
    }
}


class Box {
    private $weight= null;
    private $content = null;
    private $count= null;

    
    public function __construct(float $weight, $content, int $count) {
        if ($weight < 4 || $weight > 10){
            throw new Exception("вес сундука должен быть от 4 до 10");
        }
        $this->weight = $weight;
        $this->content = $content;
        $this->count = $count;
    }

    public function getWeight(): float {
        return $this->weight;
    } 

    public function getContent() {
        return $this->content;
    }
    
     public function getCount(): int {
        return $this->count;
    }
    
    public function setWeight(float $weight):void {
        if ($weight < 4 || $weight > 10) {
            throw new Exception("вес должен быть от 4 до 10");
        }
        $this->weight= $weight;
    }

    public function setContent($content):void {
        $this->content=$content;
    }

    public function setCount(int $count):void {
        $this->count = $count;
    }
}
//rerer
?>