<?php

namespace MiniRest\Http\Controllers;

use MiniRest\Actions\Products\CreateProductsAction;
use MiniRest\Actions\Products\DeleteProductsAction;
use MiniRest\Actions\Products\EditProductsAction;
use MiniRest\Actions\Products\GetAllProductsAction;
use MiniRest\Actions\Products\GetByIdProductsAction;
use MiniRest\Repositories\ProductsRepository;
use MiniRest\Requests\Products\CreateProductRequest;
use MiniRest\Requests\Products\EditProductRequest;
use MiniRestFramework\Http\Request\Request;
use MiniRestFramework\Http\Response\Response;

class ProductsController
{

    private ProductsRepository $productsRepository;

    public function __construct(
        ProductsRepository $productsRepository
    )
    {
        $this->productsRepository = $productsRepository;
    }

    public function get(GetAllProductsAction $action): Response
    {
        return $action->handle(
            request: null,
            repository: $this->productsRepository,
            id: null
        );
    }

    public function getById(string $id, Request $request, GetByIdProductsAction $action): Response
    {
        return $action->handle(
            request: null,
            repository: $this->productsRepository,
            id: $id
        );
    }

    public function create(CreateProductRequest $request, CreateProductsAction $action): Response
    {
        if ($request->fails()) {
            return Response::json($request->errors());
        }

        return $action->handle(
            $request,
            $this->productsRepository,
            null
        );
    }

    public function update(string $id, EditProductRequest $request, EditProductsAction $action): Response
    {
        if ($request->fails()) {
            return Response::json($request->errors());
        }

        return $action->handle(
            request: $request,
            repository: $this->productsRepository,
            id: $id
        );
    }

    public function delete(string $id, DeleteProductsAction $action): Response
    {
        return $action->handle(
            request: null,
            repository: $this->productsRepository,
            id: $id
        );
    }
}