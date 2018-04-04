<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
       public function index(Request $request)
    {
        
    $filter = $request->pesquisar;
   

       
        
        $produtos = produto::paginate(5);
        $tipo = auth()->user()->tipo;
    
        $total = produto::all()->count();
        return view('produto', compact('produtos', 'total','tipo'));
    }



 public function create() {
        $produtos = produto::all();
        return view('include-produto', compact('produtos'));
    }

    public function store(Request $request) {
        $produto = new produto;
        $produto->nome = $request->nome_produto;
        $produto->dt_entrada = $request->dt_entrada;
        $produto->valor_compra = $request->valor;
        $produto->descricao = $request->descricao;
        $produto->imagem = $request->imagem;
        $produto->save();
        
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
         
        // Define um aleatório para o arquivo baseado no timestamps atual
        $name = Produto::all()->max('id');
 
        // Recupera a extensão do arquivo
        $extension = $request->imagem->extension();
 
        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";
 
        // Faz o upload:
        $upload = $request->imagem->storeAs('categories', $nameFile);
  
        if ( !$upload )
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
 
    }
     
        return redirect()->route('produto.index')->with('message', 'Produto criado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $produto = produto::findOrFail($id);
        return view('alter-produto', compact('produto'));
    }

    public function update(Request $request, $id) {
        $produto = produto::findOrFail($id); 
        $produto->nome = $request->nome_produto;
        $produto->dt_entrada = $request->dt_entrada;
        $produto->valor_compra = $request->valor;
        $produto->descricao = $request->descricao;
        $produto->imagem = $request->imagem;
        
        $produto->save();
        return redirect()->route('produto.index')->with('message', 'Curso alterado com sucesso!');
    }

    public function destroy($id) {
        $produto = produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produto.index')->with('message', 'Curso excluído com sucesso!');
    }
}
