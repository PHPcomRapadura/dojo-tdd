<?php

namespace App;

use DateTimeInterface;
use App\DataValidadeCervejaException;

class ValidadeCerveja
{
    private DateTimeInterface $dataVencimento;

    public function __construct(DateTimeInterface $dataVencimento)
    {
        $this->defineDataValidade($dataVencimento);
    }

    private function defineDataValidade(DateTimeInterface $dataVencimento): void
    {
        $hoje = new \DateTimeImmutable();
        if ($dataVencimento < $hoje)
        {
            throw new DataValidadeCervejaException();
        }

        $this->dataVencimento = $dataVencimento;
    }
}
