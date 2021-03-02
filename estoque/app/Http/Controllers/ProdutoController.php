<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use Illuminate\Support\Facades\Validator;
use App\Models\Marca;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function lista() {
        $produtos = Produto::paginate(30);
        
        if(view()->exists('produtos')){
            return view('produtos')->with('produtos', $produtos);
        }
        //return view('produtos', ['produtos' => $produtos]);
        // view('produtos')->with('produtos', $produtos);
        // view('produtos')->withProdutos($produtos);
    }
    
    public function mostra($id) {
        //$id = $request->route('id'); //Recuperando parâmetros da URL
        $resposta = Produto::find($id);

        if(empty($resposta)){
            return 'Esse produto não existe!';
        }

        return view('detalhes')->with('p', $resposta);
    }

    public function novo() {
        $marcas = Marca::all();
        return view('produtos.formulario', compact('marcas') );
    }

    public function adiciona(Request $request) {
        // Pegando requisição
        $params = $request->all();

        // Validator
        $validator = Validator::make($params, [
            'title' => 'required|string',
            'price' => 'required|string|max:6',
            'quantidade' => 'required|numeric',
            'marca_id' => 'required'
        ]);
        if($validator->fails()){
            return redirect()->route('novo')->withErrors($validator);
        }

        //Crinado novo produto 
        $produto = new Produto($params);

        // salvar no banco de dados
        $produto->save();

        // retornar alguma view
        return redirect('/produtos')->withInput( $request->only('title') );
        
    }

    public function listaJson() {
        $produtos  = Produto::all();
        return response()->json($produtos);
    }

    public function edit($id) {
        $produtos = Produto::find($id);
        $marca = Marca::all();
        return view('produtos.edit', compact('marca'))->with('data', $produtos);
    }

    public function save(Request $request) {
        $data = $request->all();
        $id = $data['id'];
        
        // Validator
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'price' => 'required|string|max:6',
            'quantidade' => 'required|numeric',
            'marca_id' => 'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        
        $find = Produto::findOrFail($id);
        $find->fill(request()->only(['title', 'price', 'quantidade', 'marca_id']));
        $find->save();
        return redirect()->route('listagem');

    }

    public function remove($id) {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->route('listagem');
    }
}
