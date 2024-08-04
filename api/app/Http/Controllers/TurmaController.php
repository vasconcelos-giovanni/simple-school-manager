<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTurmaRequest;
use App\Http\Requests\UpdateTurmaRequest;
use App\Http\Resources\AlunoResource;
use App\Http\Resources\TurmaResource;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        return response()->json(TurmaResource::collection($turmas));
    }

    public function store(StoreTurmaRequest $request)
    {
        DB::transaction(function () use ($request) {
            $turma = Turma::create($request->validated());
            return response()->json(new TurmaResource($turma), Response::HTTP_CREATED);
        });
    }

    public function show(Turma $turma)
    {
        return response()->json(new TurmaResource($turma));
    }

    public function update(UpdateTurmaRequest $request, Turma $turma)
    {
        DB::transaction(function () use ($request, $turma) {
            $turma->update($request->validated());
            return response()->json(new TurmaResource($turma));
        });
    }

    public function destroy(Turma $turma)
    {
        DB::transaction(function () use ($turma) {
            $turma->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        });
    }

    public function alunos(Turma $turma)
    {
        $alunos = $turma->alunos;

        return response()->json(AlunoResource::collection($alunos));
    }
}
