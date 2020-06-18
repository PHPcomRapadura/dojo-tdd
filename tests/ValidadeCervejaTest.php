<?php

namespace Tests;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use App\DataValidadeCervejaException;
use App\ValidadeCerveja;

class ValidadeCervejaTest extends TestCase
{
    public function testDataVencimentoNaoEValida()
    {
        $this->expectException(DataValidadeCervejaException::class);

        $dataVencimento = new DateTimeImmutable('2005-01-01');
        $validadeCerveja = new ValidadeCerveja($dataVencimento);
    }

    /**
     * @test
     */
    public function dataVencimentoEValida()
    {
        $dataVencimento = new DateTimeImmutable('2030-01-01');
        $validadeCerveja = new ValidadeCerveja($dataVencimento);
        $this->assertInstanceOf(ValidadeCerveja::class, $validadeCerveja);
    }
}