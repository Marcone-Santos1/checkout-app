<?php

namespace MiniRest\Contracts;

use MiniRestFramework\Http\Response\Response;

interface ICrudController
{
    public function get(IRequest $request): Response;

    public function getById(int $id, IRequest $request): Response;

    public function create(IRequest $request): Response;

    public function update(int $id, IRequest $request): Response;

    public function delete(int $id, IRequest $request): Response;
}