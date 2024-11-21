<?php

namespace App\Http\Controllers\Program\Repositories;

use App\Http\Controllers\Program\Contracts\ProgramInterface;
use App\Models\Program;

class ProgramRepository implements ProgramInterface
{

    private $Program;

    public function __construct(Program $Program)
    {
        $this->program = $Program;
    }

    public function getPrograms($id, array $columns = ['*'])
    {
        return $this->program
            ->orderBy('id', 'asc')
            ->select($columns)
            ->where('user_id', $id)
            ->get();
    }
}
