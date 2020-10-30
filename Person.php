<?php

class Person
{
    private string $name;
    private string $surname;
    private int $personalCode;
    private string $address;

    public function __construct(string $name, string $surname, int $personalCode, string $address)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personalCode = $personalCode;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPersonalCode(): string
    {
        return $this->personalCode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'personalcode' => $this->getPersonalCode(),
            'address' => $this->getAddress()
        ];
    }
}