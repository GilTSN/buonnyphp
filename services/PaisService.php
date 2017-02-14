<?php

class PaisService
{
    /**
     * @var array
     */
    private $pais = [];

    /**
     * Avos constructor.
     */
    public function __construct()
    {
        $this->pais = [
            ['id' => 7, 'nome' => 'Flavio', 'avo_id' => 2],
            ['id' => 2, 'nome' => 'George', 'avo_id' => 1],
            ['id' => 3, 'nome' => 'Marcio', 'avo_id' => 1],
            ['id' => 1, 'nome' => 'Marcos', 'avo_id' => 1],
            ['id' => 4, 'nome' => 'Maria', 'avo_id' => 2],
            ['id' => 6, 'nome' => 'Joao', 'avo_id' => 2],
            ['id' => 5, 'nome' => 'Jose', 'avo_id' => 2],
            ['id' => 8, 'nome' => 'Julia', 'avo_id' => 3]
        ];
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->pais;
    }

    /**
     * @param $avoId
     * @return array
     */
    public function getByAvo($avoId)
    {
        if (!$avoId) {
            throw new InvalidArgumentException();
        }

        return array_filter($this->pais, function ($item) use ($avoId) {
            return $item['avo_id'] == $avoId;
        });
    }
}