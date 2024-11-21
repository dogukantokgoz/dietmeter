<?php 

namespace App\Http\Controllers\Program\Contracts;

interface ProgramInterface
{
    public function getPrograms($id, array $columns = ['*']);
}

