<?php

namespace MiniRest\Http\Controllers;

use MiniRest\Actions\Sales\CreateSaleAction;
use MiniRest\Actions\Sales\DeleteSaleAction;
use MiniRest\Actions\Sales\EditSaleAction;
use MiniRest\Actions\Sales\GetAllSalesAction;
use MiniRest\Actions\Sales\GetSaleByIdAction;
use MiniRest\Repositories\SalesRepository;
use MiniRest\Requests\Sales\CreateSaleRequest;
use MiniRest\Requests\Sales\EditSaleRequest;
use MiniRestFramework\Http\Request\Request;
use MiniRestFramework\Http\Response\Response;

class SalesController
{

    private SalesRepository $salesRepository;

    public function __construct(
        SalesRepository $salesRepository
    )
    {
        $this->salesRepository = $salesRepository;
    }

    public function get(GetAllSalesAction $action): Response
    {
        return $action->handle(
            request: null,
            repository: $this->salesRepository,
            id: null
        );
    }

    public function getById(string $id, Request $request, GetSaleByIdAction $action): Response
    {
        return $action->handle(
            request: null,
            repository: $this->salesRepository,
            id: $id
        );
    }

    public function create(CreateSaleRequest $request, CreateSaleAction $action): Response
    {
        if ($request->fails()) {
            return Response::json($request->errors());
        }

        return $action->handle(
            $request,
            $this->salesRepository,
            null
        );
    }

    public function update(string $id, EditSaleRequest $request, EditSaleAction $action): Response
    {
        if ($request->fails()) {
            return Response::json($request->errors());
        }

        return $action->handle(
            request: $request,
            repository: $this->salesRepository,
            id: $id
        );
    }

    public function delete(string $id, DeleteSaleAction $action): Response
    {
        return $action->handle(
            request: null,
            repository: $this->salesRepository,
            id: $id
        );
    }
}