<?php

class FilhosService
{
    /**
     * @var array
     */
    private $filhos = [];

    /**
     * Avos constructor.
     */
    public function __construct()
    {
        $this->filhos = [
            ['id' => 10, 'nome' => "Flavia"],
            ['id' => 5, 'nome' => "Georgia"],
            ['id' => 3, 'nome' => "Marcia"],
            ['id' => 14, 'nome' => "Marta"],
            ['id' => 13, 'nome' => "Mario"],
            ['id' => 15, 'nome' => "Joana"],
            ['id' => 9, 'nome' => "Jose"],
            ['id' => 7, 'nome' => "Julia"]
        ];
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->filhos;
    }

    /**
     * @param array $paisIds
     * @return array
     */
    public function getByPais(array $paisIds)
    {
        if (empty($paisIds) or count($paisIds) != 2) {
            throw new InvalidArgumentException();
        }

        $somaIds = array_sum($paisIds);

        return array_filter($this->filhos, function ($item) use ($somaIds) {
            return $item['id'] == $somaIds;
        });
    }
}