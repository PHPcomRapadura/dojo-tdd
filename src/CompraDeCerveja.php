<?php

namespace App;

class CompraDeCerveja
{
    private Cliente $cliente;
    private array $cervejas;

    public function __construct(Cliente $cliente)
    {
        $this->client = $cliente;
    }

    public function adicionar(Cerveja $cerveja)
    {
        $this->cervejas[] = $cerveja;
        return $this;
    }
    
    public function contaCervejas(): int
    {
        return count($this->cervejas);
    }

    public function comprar(){
        $valor = array_reduce($this->cervejas, fn($total, $cerveja) => $total + 500, 0);

        if($this->contaCervejas() >=4)
        {
            $valor = $valor - ($valor * 0.1);
        }

        return $valor;
    }
}
