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
        $validatedData = $request->validate([
            'id_cliente' => 'required',
            'id_autonomo' => 'required',
            'data' => 'required',
            'horario' => 'required',
            'descricao' => 'required',
            'status' => 'required',
            'servico_finalizado' => 'required',
        ]);

        // Crie o agendamento
        $agendamento = Agendamento::create($validatedData);

        return response()->json(['message' => 'Agendamento criado com sucesso', 'agendamento' => $agendamento], 201);
    }

}
