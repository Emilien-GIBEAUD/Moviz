<?php

namespace App\Entity;

use App\Tools\StringTools;


class Entity
{

    public static function createAndHydrate(array $data): static
    {
        // Ici static fait référence à la classe de l'enfant, alors que self fait référence à la classe courante
        $entity = new static();
        $entity->hydrate($data);
        return $entity;
    }

    public function hydrate(array $data)
    {
        if (count($data) > 0) {
            // On parcourt le tableau de données
            foreach ($data as $key => $value) {
                // Pour chaque donnée, on appel le setter
                $methodName = 'set' . StringTools::toPascalCase($key);      // first_name => setFirstName
                if (method_exists($this, $methodName)) {
                    if ($key == 'duration') {
                        $value = $value ? new \DateTime($value) : null;
                    }
                    if ($key == 'date_review') {
                        $value = $value ? new \DateTime($value) : null;
                    }
                    $this->{$methodName}($value);                           // appel dynamique : $this->setFirstName($value);
                }
            }
        }
    }
}
