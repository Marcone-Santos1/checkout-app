<?php

namespace MiniRest\Traits;

use InvalidArgumentException;

trait RequestTrait
{
    private array $data = [];

    /**
     * Inicializa o objeto e popula os dados.
     */
    public function __construct()
    {
        $this->data = array_merge($this->getJsonData() ?? [], $this->getRouteParams() ?? []);
        $this->populateProperties();
        $this->isValid();
    }

    /**
     * Popula as propriedades do modelo. Deve ser implementado pelas classes que usam este trait.
     */
    protected function populateProperties(): void
    {
        foreach ($this->getValidationRules() as $property => $rule) {
            if (array_key_exists($property, $this->data)) {
                $this->$property = $this->data[$property];
            }
        }
    }

    /**
     * Obtém o valor de uma propriedade.
     *
     * @param string $name
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new InvalidArgumentException("Property {$name} does not exist.");
    }

    /**
     * Valida os dados com base nas regras definidas.
     *
     * @throws \Exception
     */
    public function isValid(): bool
    {
        return !$this->rules($this->getValidationRules())->validate()->fails();
    }

    /**
     * Obtém as regras de validação para a requisição. Deve ser implementado pelas classes que usam este trait.
     *
     * @return array
     */
    abstract protected function getValidationRules(): array;

    /**
     * Converte os dados da requisição em um array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_intersect_key($this->data, array_flip(array_keys($this->getValidationRules())));
    }
}