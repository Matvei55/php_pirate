<?php
require_once "./box.php";
require_once "./ship.php";
require_once "./pirat.php";

class Generatorr 
{
    private int $shipCount = 4;
    private int $pirateCount = 4;
    private int $startFrom = 1;
    private int $boxCount = 20;

    private string $shipTemplate = 'ship_%d';
    private string $piratTemplate = 'pirat_%d';
    private string $boxTemplate = 'box_%d';

    private array $boxCollection = [];
    private array $shipCollection = [];
    private array $pirateCollection = [];

    public function __construct() 
    {
        $this->getPirates();
    }

    public function getPirates(): array 
    {
        if (count($this->pirateCollection) == 0) {
            for ($i = $this->startFrom; $i < $this->startFrom + $this->pirateCount; $i++) {
                echo "введи имя пирата";
                $this->pirateCollection[sprintf($this->piratTemplate, $i)] = new Pirate(fgets(STDIN));
            }
        }
        return $this->pirateCollection;
    }

    public function getShips(): array 
    {
        if (count($this->shipCollection) == 0) {
            for ($i = $this->startFrom; $i < $this->startFrom + $this->shipCount; $i++) {
                echo "введи грузоподъемночть коробля";
                $this->shipCollection[sprintf($this->shipTemplate, $i)] = 
                    new Ship((int)trim(fgets(STDIN)), $this->getPirates()[sprintf($this->piratTemplate, $i)]);
            }
        }
        return $this->shipCollection;
    }

    public function getBoxes(): array 
    {
        if (count($this->boxCollection) == 0) {
            for ($i = $this->startFrom; $i <= $this->boxCount; $i++) {
                $weight = random_int(4, 10);
                $content = $this->getBoxContent();
                $count = $this->getBoxContentCount($content);
                $this->boxCollection[sprintf($this->boxTemplate, $i)] = new Box($weight, $content, $count);
            }
        }
        return $this->boxCollection;
    }

    public function getBoxContentCount(string $content): int 
    {
        if ($content == 'деньги') {
            $count = random_int(15, 100);
        } elseif ($content == 'проклятье') {
            $count = random_int(3, 10);
        } elseif ($content == 'пусто') { 
            $count = 0;
        }
        return $count;
    }

    public function getBoxHasItem(): bool
    {
        return random_int(0, 1) === 1;
    }

    public function getBoxContent(): string 
    {
        if ($this->getBoxHasItem()) {
        } elseif ($this->getBoxHasCash()) {
            return 'деньги';
        } elseif ($this->getBoxHasCurse()) {
            return 'проклятье';
        }
        return 'пусто';
    }

    public function getBoxHasCash(): bool 
    {
        return random_int(0, 1) === 1;
    }

    public function getBoxHasCurse(): bool 
    {
        return random_int(0, 1) === 1;
    }
}