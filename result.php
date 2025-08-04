<?php
require_once "./pirat.php";
require_once "./ship.php";
require_once "./box.php";
require_once "./generator.php";

class Resultt 
{
    private array $boxCollection = [];
    private array $shipCollection = [];
    private array $boxesByPirateCollection = [];

    public function __construct($boxCollection, $shipCollection)
    {
        $this->shipCollection = $shipCollection;
        $this->boxCollection = $boxCollection;
        $this->setFillShips();
    }

    public function getDisplayBoxCountByPirate(): void 
    {
        $resultate = '';
        foreach ($this->shipCollection as $shipKey => $ship) {
            $namePirate = $ship->getPirate()->getName();
            $countBox = $ship->getCount();
        }
        printf('пират %s взял %d сундуков', $namePirate, $countBox);
    }

    public function setFillShips(): void 
    {
        foreach ($this->shipCollection as $shipKey => $ship) {
            $gold = 0;
            $curse = 0;
            $empty = 0;
            foreach ($this->boxCollection as $boxKey => $box) {
                if ($ship->setCanAddBox($box)) {
                    $ship->setAddBox($box);
                    unset($this->boxCollection[$boxKey]);
                    if ($box->getContent() == 'пусто') {
                        $empty += 1;
                    } elseif ($box->getContent() == 'деньги') {
                        $gold += 1;
                    } elseif ($box->getContent() == 'проклятье') {
                        $curse += 1;
                    }
                }
                $this->boxesByPirateCollection[$ship->getPirate()->getName()] = [
                    'gold' => $gold,
                    'curse' => $curse,
                    'empty' => $empty,
                    'name' => $ship->getPirate()->getName()
                ];
            }
        }
    }

    public function getDisplayMaxGoldByPirate(): string 
    {
        if (empty($this->boxesByPirateCollection)) {
            return "Нет данных о пиратах";
        }
        uasort($this->boxesByPirateCollection, function($a, $b) {
            return $b['gold'] <=> $a['gold'];
        });
        $topPirate = reset($this->boxesByPirateCollection);
        return sprintf(
            'Пират %s взял больше всего золота: %d', 
            $topPirate['name'],
            $topPirate['gold']
        );
    }

    public function getDisplayMaxEmptyByPirate(): string 
    {
        if (empty($this->boxesByPirateCollection)) {
            return "Нет данных о пиратах";
        }
        uasort($this->boxesByPirateCollection, function($a, $b) {
            return $b['empty'] <=> $a['empty'];
        });
        $topPirate = reset($this->boxesByPirateCollection);
        return sprintf(
            'Пират %s взял больше всего пустых сундуков: %d', 
            $topPirate['name'],
            $topPirate['empty']
        );
    }

    public function getDisplayMaxCurseByPirate(): string 
    {
        if (empty($this->boxesByPirateCollection)) {
            return "Нет данных о пиратах";
        }
        uasort($this->boxesByPirateCollection, function($a, $b) {
            return $b['curse'] <=> $a['curse'];
        });
        $topPirate = reset($this->boxesByPirateCollection);
        return sprintf(
            'Пират %s взял больше всего сундуков c проклятьем: %d', 
            $topPirate['name'],
            $topPirate['curse']
        );
    }

    public function sortByKey(array $data, string $nestedKey, bool $reverse = false): array 
    { 
        $keys = array_keys($data);
        
        usort($keys, function($a, $b) use ($data, $nestedKey, $reverse) {
            $valueA = $data[$a][$nestedKey] ?? 0;
            $valueB = $data[$b][$nestedKey] ?? 0;
            
            $comparison = $valueA <=> $valueB;
            return $reverse ? -$comparison : $comparison;
        });
        
        return $keys;
    }
}
