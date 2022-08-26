<?php

namespace App\Models;


class Endereco extends RModel
{
    protected $table = "enderecos";

    protected $fillable = ['lagradouro', 'complemento', 'numero', 'cep', 'cidade', 'estado'];
}
