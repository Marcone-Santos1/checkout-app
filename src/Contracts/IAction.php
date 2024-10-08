<?php

namespace MiniRest\Contracts;

interface IAction
{
    public function handle(?IRequest $request, ?IRepository $repository, ?string $id): mixed;
}