<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new \App\Models\Categoria(['categoria' => 'Geral']);
        $cat->save();

        $prod1 = new \App\Models\Produto(['nome' => 'produto1', 'valor' => 1000, 'foto' => 'images/produto1.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod1->save();

        $prod2 = new \App\Models\Produto(['nome' => 'produto2', 'valor' => 100, 'foto' => 'images/produto2.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produto(['nome' => 'produto3', 'valor' => 1000, 'foto' => 'images/produto3.webp', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome' => 'produto4', 'valor' => 100, 'foto' => 'images/produto4.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod4->save();

        $prod5 = new \App\Models\Produto(['nome' => 'produto5', 'valor' => 1000, 'foto' => 'images/produto5.webp', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod5->save();

        $prod6 = new \App\Models\Produto(['nome' => 'produto6', 'valor' => 10, 'foto' => 'images/produto6.webp', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod6->save();
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
