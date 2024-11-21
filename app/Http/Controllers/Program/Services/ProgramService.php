<?php 

namespace App\Http\Controllers\Program\Services;

use App\Http\Controllers\Program\Contracts\ProgramInterface;
use App\Enumerations\Program\ProgramReturnMessageEnum;

class ProgramService
{
    public function index()
    {
        $user = auth()->user();
        $get_programs = app()->make(ProgramInterface::class)->getPrograms($user->id);

        if ($get_programs->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => ProgramReturnMessageEnum::NOT_FOUND
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $get_programs            
        ]);
    }
}
