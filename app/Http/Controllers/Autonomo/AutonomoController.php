<?php

namespace App\Http\Controllers\Autonomo;

use App\Models\Autonomo;
use App\Models\Customer;
use Illuminate\Http\Request;
use ICustomerService;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Log;
use function response;

class AutonomoController extends \App\Http\Controllers\Controller
{
    public function store(Request $request)
    {
        Log::info($request->all());

        $autonomo = new Autonomo();

        if ($request->id) {
            $autonomo = Autonomo::find($request->id);
        }

        $autonomo->id_usuario = $request->input('id_usuario');
        $autonomo->nome_completo = $request->input('nome_completo');
        $autonomo->idade = $request->input('idade');
        $autonomo->profissao = $request->input('profissao');
        $autonomo->genero = $request->input('genero');
        $autonomo->telefone = $request->input('telefone');
        $autonomo->estado = $request->input('estado');
        $autonomo->cidade = $request->input('cidade');
        $autonomo->descricao = $request->input('descricao');
        $autonomo->foto = $request->input('foto');

        $autonomo->save();

        return response()->json(['success' => true, 'msg' => 'Salvo com sucesso.']);

    }

    public function getAutonomo()
    {
        $autonomos = Autonomo::leftJoin('avaliacao as av', 'autonomo.id', '=', 'av.id_autonomo')
            ->select('autonomo.*', DB::raw('AVG(av.avaliacao) as media_avaliacao'))
            ->groupBy('autonomo.id')
            ->get();

        return response()->json($autonomos);
    }
}
