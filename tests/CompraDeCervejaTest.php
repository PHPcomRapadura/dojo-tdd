<?php

namespace Tests;

use App\Cerveja;
use App\Cliente;
use App\CompraDeCerveja;
use App\Email;
use App\ValidadeCerveja;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class CompraDeCervejaTest extends TestCase
{
    public function testComDadosValidosDeveCriarCompra()
    {
        $cliente = new Cliente('Will Gostosão', new DateTimeImmutable('2000-01-01'), new Email('wilcorrea@gmail.com'));

        $compra = new CompraDeCerveja($cliente);
        $this->assertInstanceOf(CompraDeCerveja::class, $compra);
    }

    public function testComprarCerveja()
    {
        $cliente = new Cliente('Will Gostosão', new DateTimeImmutable('2000-01-01'), new Email('wilcorrea@gmail.com'));
        $cerveja = new Cerveja(new ValidadeCerveja(new \DateTimeImmutable('2040-12-01')), 'Stella');
        $cerveja2 = new Cerveja(new ValidadeCerveja(new \DateTimeImmutable('2040-11-01')), 'Stella');

        $compra = new CompraDeCerveja($cliente);
        $compra->adicionar($cerveja);
        $compra->adicionar($cerveja2);
        $this->assertInstanceOf(CompraDeCerveja::class, $compra);
        $this->assertSame(2, $compra->contaCervejas());
    }
    
    public function testDeveAplicarDezPorCentoDeDesconto()
    {
        $cliente = new Cliente('Vinicius Bolacha', new DateTimeImmutable('2000-01-01'), new Email('vini-bolacha@gmail.com'));
        $cerveja1 = new Cerveja(new ValidadeCerveja(new \DateTimeImmutable('2040-12-01')), 'Stella');
        $cerveja2 = new Cerveja(new ValidadeCerveja(new \DateTimeImmutable('2040-11-01')), 'Stella');
        $cerveja3 = new Cerveja(new ValidadeCerveja(new \DateTimeImmutable('2040-10-01')), 'Stella');
        $cerveja4 = new Cerveja(new ValidadeCerveja(new \DateTimeImmutable('2040-09-01')), 'Stella');

        $compraDeCerveja = new CompraDeCerveja($cliente);
        $compraDeCerveja->adicionar($cerveja1)
            ->adicionar($cerveja2)
            ->adicionar($cerveja3)
            ->adicionar($cerveja4);

        $valor = $compraDeCerveja->comprar();
        $this->assertEquals(1800, $valor);

    }
}
