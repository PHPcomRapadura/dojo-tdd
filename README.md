# Cervejaria PHPinga

Funcionalidade: Cadastrar cliente
    Regras:
    - Cliente tem nome, email e data de nascimento
    - Cliente precisa ser maior de idade
    - Cliente precisa informar pelo menos 2 nomes
    - E-mail deve estar em formato válido

    Cenário: Nome simples
        Quando eu crio um cliente com nome "Maria"
        Então devo receber um erro "Precisa informar pelo menos 2 nomes"

    Cenário: Menor de idade
        Quando eu crio um cliente com a data de nascimento "2002-01-01"
        Então devo receber um erro "Apenas maiores de idade permitidos"

    Cenário: E-mail inválido
        Quando eu crio um cliente com o e-mail "teste"
        Então devo receber um erro "E-mail inválido"

Funcionalidade: Comprar uma cerveja
    Regras:
    - Cerveja deve ter data de validade e descrição

    Cenário: Dados válidos
        Dado que eu tenho um item (cerveja) válido
        E tenho um cliente válido
        Quando tento comprar uma cerveja
        Devo ter as informações da compra

    Cenário: Atacado
        Dado que tenho um cliente válido
        E um item (cerveja) válido
        Quando compro 4 cervejas
        Devo ter 10% de desconto na compra

    Cenário: Muitas cervejas
        Dado que tenho um cliente válido
        E um item (cerveja) válido
        Quando tento adicionar mais de 6 cervejas
        Devo receber um erro "Compra máxima de 6 cervejas"

https://www.youtube.com/watch?v=JsLqAvZpmEU