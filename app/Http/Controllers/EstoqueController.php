<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estoque;
use App\Produto;

class EstoqueController extends Controller
{
       public function index(Request $request)
    {
           
      $filter = $request->pesquisar;
        
    
        
        $estoques = estoque::paginate(5);
        $tipo = auth()->user()->tipo;
    
        $total = estoque::all()->count();
        return view('estoque', compact('estoques', 'total','tipo'));
    }



 public function create() {
        $produtos = produto::all();
        return view('include-estoque', compact('produtos'));
    }

    public function store(Request $request) {
        $estoque = new estoque;
        $estoque->produtos_id = $request->id_produto;
        $estoque->quantidade = $request->qtd;
       
        $estoque->save();
        
            
        return redirect()->route('estoque.index')->with('message', 'Estoque criado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $estoques = estoque::findOrFail($id);
        $produtos = produto::all();
        return view('alter-estoque', compact('estoques','produtos'));
    }

    public function update(Request $request, $id) {
        $estoque = estoque::findOrFail($id); 
        $estoque->produtos_id = $request->id_produto;
        $estoque->quantidade = $request->qtd;
        
        $estoque->save();
        return redirect()->route('estoque.index')->with('message', 'Curso alterado com sucesso!');
    }

    public function destroy($id) {
        $estoque = estoque::findOrFail($id);
        $estoque->delete();
        return redirect()->route('estoque.index')->with('message', 'Curso excluído com sucesso!');
    }
}
