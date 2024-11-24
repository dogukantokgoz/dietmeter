<?php 

namespace App\Http\Controllers\Program\Contracts;

interface ProgramInterface
{
    public function getProgramsById($id, array $columns = ['*']);

    public function store($request, $number_of_program, $user_id);

    public function getProgramByUserId($user_id, array $columns = ['*']);

    public function show($number_of_program);

    public function updateById($move);

    public function destroy($id);
}

