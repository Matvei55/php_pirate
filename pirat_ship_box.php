<?php
include_once '/home/matvei/prolects_php/generator.php';

class Pirate {
    private $get_name = '';
    
    public function __construct(string $name) {
        $this->get_name = $name;
    }
    
    public function getName(): string {
        return $this->get_name;
    }
    
    public function setName(string $name): void {
        $this->get_name = $name;
    }
}

class Ship {
    private $get_weight;
    private $get_pirate;
    private $get_boxes = [];
    private $get_free_weight;

    public function __construct(float $weight, Pirate $pirate) {
        if ($weight >= 60) {
            throw new Exception("Слишком большой вес должно быть меньше 60 кг");
        }
        $this->get_weight = $weight;
        $this->get_free_weight = $weight;
        $this->get_pirate = $pirate;
    }

    
    public function getAddBox(Box $box): void {
        if ($box->getWeight() > $this->get_free_weight) {
            throw new Exception("Коробка слишком большая " . $box->getWeight());
        }
        $this->get_boxes[]=$box;
        $this->get_free_weight -= $box->getWeight();
    }

    public function getWeight(): float {
        return $this->get_weight;
    }

    public function getPirate(): Pirate {
        return $this->get_pirate;
    }

    public function getBoxes():array {
        return $this->get_boxes;
    }
    
    public function getFreeWeight(): float {
        return $this->get_free_weight;
    }
}


class Box {
    private $get_weight= null;
    private $get_content = null;
    private $get_count= null;

    
    public function __construct(float $weight, $content, int $count) {
        if ($weight < 4 || $weight > 10){
            throw new Exception("вес сундука должен быть от 4 до 10");
        }
        $this->get_weight = $weight;
        $this->get_content = $content;
        $this->get_count = $count;
    }

    public function getWeight(): float {
        return $this->get_weight;
    } 

    public function getContent() {
        return $this->get_content;
    }
    
     public function getCount(): int {
        return $this->get_count;
    }
    
    public function setWeight(float $weight):void {
        if ($weight < 4 || $weight > 10) {
            throw new Exception("вес должен быть от 4 до 10");
        }
        $this->get_weight= $weight;
    }

    public function setContent($content):void {
        $this->get_content=$content;
    }

    public function setCount(int $count):void {
        $this->get_count = $count;
    }
}
?>