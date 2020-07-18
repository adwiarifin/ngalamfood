<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function all()
    {
        return Person::all();
    }

    public function show($id)
    {
        $person = Person::find($id);
        if ($person == null) return response()->json(['message' => 'Person Not Found!'], 404);
        return $person;
    }

    public function store(Request $request)
    {
        return Person::create($request->all());
    }

    public function update($id, Request $request)
    {
        $person = Person::find($id);
        if ($person == null) return response()->json(['message' => 'Person Not Found!'], 404);
        $person->update($request->all());
        return $person;
    }

    public function delete($id)
    {
        $person = Person::find($id);
        if ($person == null) return response()->json(['message' => 'Person Not Found!'], 404);
        $person->delete();
        return response()->noContent();
    }
}
