<?php

namespace MiniRest\Http\Controllers;

use MiniRest\Contracts\ICrudController;
use MiniRestFramework\Http\Request\Request;
use MiniRestFramework\Http\Response\Response;

class SalesController implements ICrudController
{
    public function get(Request $request): Response
    {
        return Response::json([]);
    }

    public function getById(int $id, Request $request): Response
    {
        return Response::json([]);
    }

    public function create(Request $request): Response
    {
        return Response::json([]);
    }

    public function update(int $id, Request $request): Response
    {
        return Response::json([]);
    }

    public function delete(int $id): Response
    {
        return Response::json([]);
    }
}