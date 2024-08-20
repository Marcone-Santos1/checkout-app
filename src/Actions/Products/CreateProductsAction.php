<?php

namespace MiniRest\Actions\Products;

use MiniRest\Contracts\IAction;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;

class CreateProductsAction implements IAction
{

    public function handle(IRequest $request, ?IRepository $repository = null): void
    {
        dd($request->name);
    }

}