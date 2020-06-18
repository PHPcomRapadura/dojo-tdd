<?php

namespace Tests;

use App\NomeIncompletoException;
use App\ClienteDeMenorException;
use PHPUnit\Framework\TestCase;
use App\Cliente;
use App\Email;
use DateTimeImmutable;

class ClienteTest extends TestCase
{
    public function testClienteComApenasUmNome()
    {
        $this->expectException(NomeIncompletoException::class);

        $email = new Email('email@example.com');
        $dataNascimento = new DateTimeImmutable('2020-06-17');
        $cliente = new Cliente('Will', $dataNascimento, $email);
    }

    public function testClienteComNomeCompleto()
    {
        // Arrange
        $email = new Email('email@example.com');
        $dataNascimento = new DateTimeImmutable('1984-08-27');
        $cliente = new Cliente('Vinicius Dias', $dataNascimento, $email);
        $this->assertInstanceOf(Cliente::class, $cliente);
    }

    public function testClienteMenorDeIdade()
    {
        $this->expectException(ClienteDeMenorException::class);

        // Arrange
        $dataNascimento = new DateTimeImmutable('2020-06-17');
        $email = new Email('email@example.com');
        $cliente = new Cliente('Vinicius Dias', $dataNascimento, $email);
    }
}
