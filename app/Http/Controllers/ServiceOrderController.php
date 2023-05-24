<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use Illuminate\Validation\ValidationException;


class ServiceOrderController extends Controller
{
    public function create(Request $request)
    {
        try {

            // Validação dos parâmetros de entrada no formato json
            $validatedData = $request->validate([
                'vehiclePlate' => 'required|string|max:7',
                'entryDateTime' => 'required|date',
                'exitDateTime' => 'nullable|date',
                'priceType' => 'nullable|string',
                'price' => 'nullable|numeric',
                'userId' => 'required|exists:users,id'
            ]);

            // Criação da ordem de serviço
            $serviceOrder = ServiceOrder::create($validatedData);

            // Retorne uma resposta adequada, como um JSON com a ordem de serviço criada
            return response()->json($serviceOrder, 201);
        } catch (ValidationException $e) {

            // A validação falhou
            $errors = $e->validator->errors()->all();

            // Retorne uma resposta JSON com as mensagens de erro e o código de status 422 (Unprocessable Entity)
            return response()->json(['errors' => $errors], 422);
        }
    }
    public function consult(Request $request)
    {
        // Aplicar filtro por placa de veículo, se fornecido
        $vehiclePlate = $request->query('vehiclePlate');

        // Cria uma instância de uma consulta ao banco de dados
        $query = ServiceOrder::query();

        // Verifica se o valor $vehiclePlate existe, é adicionada uma cláusula 'where'
        if ($vehiclePlate) {
            $query->where('vehiclePlate', 'like', '%' . $vehiclePlate . '%');
        }

        // Incluir a relação com o usuário e selecionar o campo "name"
        $query->with('user:id,name');

        // Paginação com 5 itens por página
        $serviceOrders = $query->paginate(5);

        // Verificar se houve resultados encontrados
        if ($serviceOrders->isEmpty()) {
            return response()->json(['message' => 'NOT FOUND'], 404);
        }

        // Construir a estrutura de resposta
        $response = [
            'current_page' => $serviceOrders->currentPage(),
            'total_pages' => $serviceOrders->lastPage(),
            'data' => [],
        ];

        // Adicionar os dados de cada ordem de serviço à estrutura de resposta
        foreach ($serviceOrders as $serviceOrder) {
            $rowData = [
                'ID' => $serviceOrder->id,
                'Vehicle Plate' => $serviceOrder->vehiclePlate,
                'Entry Date Time' => $serviceOrder->entryDateTime,
                'Exit Date Time' => $serviceOrder->exitDateTime,
                'Price Type' => $serviceOrder->priceType,
                'Price' => $serviceOrder->price,
                'User ID' => $serviceOrder->user->id,
                'User Name' => $serviceOrder->user->name,
            ];

            $response['data'][] = $rowData;
        }

        // Retorne uma resposta adequada, como um JSON com as informações da página e os dados da consulta
        return response()->json($response, 200, [], JSON_PRETTY_PRINT);
    }
}
