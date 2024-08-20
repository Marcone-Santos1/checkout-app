<?php

namespace MiniRest\Http\Controllers;

use MiniRest\Actions\Products\CreateProductsAction;
use MiniRest\Contracts\ICrudController;
use MiniRest\Contracts\IRequest;
use MiniRest\Requests\Products\CreateProductRequest;
use MiniRestFramework\Http\Request\Request;
use MiniRestFramework\Http\Response\Response;

class ProductsController
{
    public function get(Request $request): Response
    {
        return Response::json([]);
    }

    public function getById(int $id, Request $request): Response
    {
        return Response::json([]);
    }

    public function create(CreateProductRequest $request, CreateProductsAction $action): Response
    {
        if ($request->fails()) {
            return Response::json($request->errors());
        }

        $action->handle(
            request: $request
        );

        return Response::json([]);
    }

    public function update(int $id, Request $request): Response
    {
        return Response::json([]);
    }

    public function delete(int $id, Request $request): Response
    {
        return Response::json([]);
    }
}