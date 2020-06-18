<?php

namespace Tests;

use DateTimeImmutable;
use App\Cerveja;
use App\DataValidadeCervejaException;
use App\ValidadeCerveja;
use App\ValidadeException;
use PHPUnit\Framework\TestCase;

class CervejaTest extends TestCase
{
    public function testCervejaForaDaValidadeLancaExcecao()
    {
        $this->expectException(DataValidadeCervejaException::class);

        $validade = new ValidadeCerveja(new DateTimeImmutable('2005-12-25'));

        $cerveja = new Cerveja($validade);
    }
}
