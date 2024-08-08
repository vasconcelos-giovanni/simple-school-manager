<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Http\Resources\AlunoResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $alunos = Aluno::all();
        return response()->json(AlunoResource::collection($alunos));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAlunoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAlunoRequest $request)
    {
        DB::transaction(function () use ($request) {
            $aluno = Aluno::create($request->validated());
            return response()->json(new AlunoResource($aluno), Response::HTTP_CREATED);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Aluno $aluno
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Aluno $aluno)
    {
        return response()->json(new AlunoResource($aluno));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAlunoRequest $request
     * @param \App\Models\Aluno $aluno
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAlunoRequest $request, Aluno $aluno)
    {
        DB::transaction(function () use ($request, $aluno) {
            $aluno->update($request->validated());
            return response()->json(new AlunoResource($aluno), Response::HTTP_OK);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Aluno $aluno
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Aluno $aluno)
    {
        DB::transaction(function () use ($aluno) {
            $aluno->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        });
    }
}
