<?php

class Box
{
    private int $weight;
    private string $content;
    private int $count;

    public function __construct(int $weight, string $content, int $count) 
    {
        if ($weight < 4 || $weight > 10) {
            throw new Exception("Вес сундука должен быть от 4 до 10");
        }
        $this->weight = $weight;
        $this->content = $content;
        $this->count = $count;
    }

    public function getWeight(): int 
    {
        return $this->weight;
    }

    public function getContent(): string 
    {
        return $this->content;
    }
    
    public function getCount(): int 
    {
        return $this->count;
    }
    
    public function setWeight(int $weight): void 
    {
        if ($weight < 4 || $weight > 10) {
            throw new Exception("Вес должен быть от 4 до 10");
        }
        $this->weight = $weight;
    }

    public function setContent(string $content): void 
    {
        $this->content = $content;
    }

    public function setCount(int $count): void 
    {
        $this->count = $count;
    }
}