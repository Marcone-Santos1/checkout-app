<?php

namespace MiniRest\Contracts;

interface IRepository
{
    public function get(?IRequest $request);

    public function getById(int|string $id);

    public function create(IRequest $request);

    public function update(int|string $id, IRequest $request);

    public function delete(int|string $id);
}