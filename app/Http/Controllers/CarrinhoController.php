<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    //
    public function carrinhoLista()
    {

        $items = \Cart::getContent();
        return view('site.carrinho', compact('items'));
    }

    public function adcionaCarrinho(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->qnt,
            'attributes' => array(
                'image' => $request->img
            )

        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso!');
    }
    public function removeCarrinho(Request $request)
    {
        \Cart::remove([
            'id' => $request->id

        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido no carrinho com sucesso!');
    }
    public function atualizaCarrinho(Request $request)
    {
        \Cart::update( $request->id, [
            'quantity' => [
                'relative' => false,
               'value'  => $request->quantity
            ]

        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado no carrinho com sucesso!');
    }

    public function limparCarrinho(){

        \Cart::clear();
        return redirect()->route('site.carrinho')->with('sucesso', 'Carrinho limpo com sucesso!');
    }
}