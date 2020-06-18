<?php

namespace App;

use DateTimeImmutable;
use DateTimeInterface;

class Cliente
{
    private string $nome;
    private DateTimeInterface $dataNascimento;
    private Email $email;

    public function __construct(string $nome, DateTimeInterface $dataNascimento, Email $email)
    {
        $this->defineNome($nome);
        $this->defineDataNascimento($dataNascimento);
        $this->email = $email;
    }

    private function defineNome(string $nome): void
    {
        if (count(explode(' ', $nome)) < 2) {
            throw new NomeIncompletoException();
        }

        $this->nome = $nome;
    }

    private function defineDataNascimento(DateTimeInterface $dataNascimento)
    {

        $idade = $this->calculaIdade($dataNascimento);
        $this->eMenorDeIdade($idade);

        $this->dataNascimento = $dataNascimento;
    }

    private function eMenorDeIdade($idade){
         if ($idade < 18) {
            throw new ClienteDeMenorException();
        }
    }

    private function calculaIdade(DateTimeInterface $dataNascimento)
    {
        $hoje = new DateTimeImmutable();
        return $dataNascimento->diff($hoje)->y;
    }
}
