<?php


class Ship  {
    private  $weight=null;
    private $pirate=null;
    private array $boxes = [];
    private  $free_weight=null;

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
?>