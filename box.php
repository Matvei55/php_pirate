<?php

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

?>