<?php

namespace App\Http\Controllers\Customer;

use App\Models\Agendamento;
use App\Models\Customer;
use Illuminate\Http\Request;
use ICustomerService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use function response;

class AgendamentoController extends \App\Http\Controllers\Controller
{
    public function store(Request $request)
    {
        Log::info('===========================');
        Log::info($request->all());
        // Valide os dados aqui

        $autonomo = new Agendamento();

        $autonomo->id_cliente = $request->input('id_cliente');
        $autonomo->id_autonomo = $request->input('id_autonomo');
        $autonomo->data = $request->input('data');
        $autonomo->horario = $request->input('horario');
        $autonomo->descricao = $request->input('descricao');
        $autonomo->status = $request->input('status');
        $autonomo->servico_finalizado = $request->input('servico_finalizado');

        $autonomo->save();

        return response()->json(['success' => true, 'msg' => 'Salvo com sucesso.']);
    }

    public function getNotificacao(Request $request)
    {
        $autonomoId = $request->input('idAutonomo');

        $count = Agendamento::where('id_autonomo', $autonomoId)
            ->where('status', 'pendente')
            ->count();

        if ($count) {
            Log::info($count);
            return response()->json($count);
        } else {
            return response()->json(['error' => 'Profile data not found'], 404);
        }
    }

}
