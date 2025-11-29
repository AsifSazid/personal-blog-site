<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $model;

    public function index()
    {
        return $this->model::all();
    }

    public function store(Request $request)
    {
        return $this->model::create($request->all());
    }

    public function show($id)
    {
        return $this->model::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->update($request->all());
        return $data;
    }

    public function destroy($id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
