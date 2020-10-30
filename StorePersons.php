<?php

class StorePersons
{
    private $resources;
    private array $persons;

    public function __construct()
    {
        $this->resources = fopen('Person.csv', 'rw+');
        $this->loadPersons();
    }

    public function savePerson($person): void
    {
        fputcsv($this->resources, $person->toArray());
    }

    private function loadPersons(): void
    {
        while (!feof($this->resources)) {

            $personsData = (array)fgetcsv($this->resources);
            $this->persons[] = new Person(
                (string)$personsData[0],
                (string)$personsData[1],
                (int)$personsData[2],
                (string)$personsData[3]
            );
        }
    }

    public function getByCode(string $searchForPerson): Person
    {
        foreach ($this->persons as $person) {
            /** @var Person $person */
            if ($person->getPersonalCode() === $searchForPerson) {
                return $person;
            }
        }
        return $person;
    }


}
