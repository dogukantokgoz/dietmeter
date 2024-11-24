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

    public function getProgramsById($id, array $columns = ['*'])
    {
        return $this->program
            ->orderBy('id', 'asc')
            ->select($columns)
            ->where('user_id', $id)
            ->get();
    }

    public function store($request, $number_of_program, $user_id)
    {
        return $this->program->create([
            'category' => $request['category'],
            'move' => $request['move'],
            'move_amount' => $request['move_amount'],
            'set_amount' => $request['set_amount'],
            'number_of_program' => $number_of_program,
            'user_id' => $user_id
        ]);
    }

    public function getProgramByUserId($user_id, array $columns = ['*'])
    {
        return $this->program
            ->orderBy('id', 'desc')
            ->select($columns)
            ->where('user_id', $user_id)
            ->first();
    }

    public function show($number_of_program, array $columns = ['*'])
    {
        return $this->program
            ->orderBy('id', 'desc')
            ->select($columns)
            ->where('number_of_program', $number_of_program)
            ->get();
    }

    public function updateById($move)
    {
        return $this->program
            ->where('id', $move['id'])
            ->update($move);
    }

    public function destroy($id)
    {
        return $this->program->destroy($id);
    }
}
