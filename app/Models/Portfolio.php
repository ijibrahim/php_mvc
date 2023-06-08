<?php

namespace App\Models;

use App\Base\Model;

class Portfolio extends Model
{
    protected string $tableName = 'Portfolios';

    /**
     * Get portfolios by status
     * 
     * @param int $status, defaul is 1, values: 1, 0, -1
     * 
     * @return array
     */
    public function get(int $status = 1): array|false
    {
        $sql = "SELECT * FROM {$this->tableName}";
        if($status !== -1)
        {
            $sql .= " WHERE status = ?";
        }

        return $this->fetchAll($sql, [$status]);
    }

    public function findById(int $id)
    {
        # code...
    }
}
