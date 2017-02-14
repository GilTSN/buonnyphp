<?php

class AvosService
{
    /**
     * @var array
     */
    private $avos = [];

    /**
     * Avos constructor.
     */
    public function __construct()
    {
        $this->avos = [
            ['id' => 1, 'nome' => 'Anselmo'],
            ['id' => 2, 'nome' => 'Joao'],
            ['id' => 3, 'nome' => 'Antonio']
        ];
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->avos;
    }
}