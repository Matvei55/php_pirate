<?php
require_once "./box.php";

class Ship
{
    private int $weight;
    private Pirate $pirate;
    private array $boxes = [];
    private int $free_weight;

    public function __construct(float $weight, Pirate $pirate)
    {
        if ($weight >= 60) {
            throw new Exception("Слишком большой вес, должно быть меньше 60 кг");
        }
        $this->weight = $weight;
        $this->free_weight = $weight;
        $this->pirate = $pirate;
    }

    public function setAddBox(Box $box): void
    {
        if ($box->getWeight() > $this->free_weight) {
            throw new Exception("Коробка слишком большая " . $box->getWeight());
        }
        $this->boxes[] = $box;
        $this->free_weight -= $box->getWeight();
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function getPirate(): Pirate
    {
        return $this->pirate;
    }

    public function getBoxes(): array
    {
        return $this->boxes;
    }
    
    public function getFreeWeight(): float
    {
        return $this->free_weight;
    }

    public function setCanAddBox(Box $box): bool
    {
        return $this->free_weight >= $box->getWeight();
    }
    
    public function getCount(): int
    {
        return count($this->boxes);
    }
}