<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Produto;
use App\User;

class VendaController extends Controller
{
       public function index(Request $request)
    {
        
   

   
        
        $vendas = venda::paginate(5);
        $tipo = auth()->user()->tipo;
    
        $total = venda::all()->count();
        return view('venda', compact('vendas', 'total','tipo'));
    }



 public function create() {
        $produtos = produto::all();
        $users = user::all();
        return view('include-venda', compact('produtos','users'));
    }

    public function store(Request $request) {
        $venda = new venda;
        $venda->produto_id = $request->id_produto;
        $venda->valor_venda = $request->valor;
        $venda->user_id = $request->vendedor;
        $venda->dt_venda = $request->dt_venda;
        $venda->save();
        
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
     
        return redirect()->route('venda.index')->with('message', 'Produto criado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $vendas = venda::findOrFail($id);
        $produtos = produto::all();
        $users = user::all();
        return view('alter-venda', compact('vendas','produtos','users'));
    }

    public function update(Request $request, $id) {
        $venda = venda::findOrFail($id); 
        $venda->produto_id = $request->id_produto;
        $venda->valor_venda = $request->valor;
        $venda->user_id = $request->vendedor;
        $venda->dt_venda = $request->dt_venda;
        
        $venda->save();
        return redirect()->route('venda.index')->with('message', 'Curso alterado com sucesso!');
    }

    public function destroy($id) {
        $venda = venda::findOrFail($id);
        $venda->delete();
        return redirect()->route('venda.index')->with('message', 'Curso excluído com sucesso!');
    }
}
