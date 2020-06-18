<?php

namespace App;

use DateTimeInterface;

class Cerveja
{
    private ValidadeCerveja $dataValidade;
    private ?string $descricao;

    public function __construct(ValidadeCerveja $dataValidade, ?string $descricao = '')
    {
        $this->dataValidade = $dataValidade;
        $this->descricao = $descricao;
    }

    public function __toString()
    {
        return (string)$this->descricao;
    }
}
