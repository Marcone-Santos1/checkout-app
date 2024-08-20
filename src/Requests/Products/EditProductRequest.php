<?php

namespace MiniRest\Requests\Products;

use MiniRest\Contracts\IAction;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;

class EditProductRequest implements IAction
{

    public function handle(IRequest $request, IRepository $repository): void
    {
        // TODO: Implement handle() method.
    }

}