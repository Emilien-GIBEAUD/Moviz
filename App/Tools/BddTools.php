<?php

namespace App\Tools;

use App\Db\Mysql;

class BddTools
{

    public static function valueExists(Mysql $mysql, string $table, string $colonne, mixed $valeur): bool {
        $pdo = $mysql->getPDO();
        $sql = "SELECT 1 FROM $table WHERE $colonne = :valeur";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['valeur' => $valeur]);
        return $stmt->fetchColumn() !== false;
    }

}