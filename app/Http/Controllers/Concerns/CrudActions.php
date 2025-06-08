<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;

trait CrudActions
{
    protected string $model;

    protected function modelQuery()
    {
        $model = $this->model;
        return $model::query();
    }

    public function index()
    {
        return response()->json($this->modelQuery()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $model = new $this->model;
        $model->forceFill($data);
        $model->save();
        return response()->json($model, 201);
    }

    public function show($id)
    {
        $model = $this->findModel($id);
        return response()->json($model);
    }

    public function update(Request $request, $id)
    {
        $model = $this->findModel($id);
        $data = $request->validate($this->rules($model->id));
        $model->forceFill($data);
        $model->save();
        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return response()->json(['message' => 'Deleted']);
    }

    protected function findModel($id)
    {
        $model = $this->model;
        return $model::findOrFail($id);
    }

    protected function rules($id = null)
    {
        return [];
    }
}
