<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorsRequest;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use App\Http\Resources\AuthorsResource;
use Faker\Factory;
use Illuminate\Http\Request;


class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AuthorsResource::collection(Author::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorsRequest $request)
    {

        $faker = Factory::create(1);
        $author = Author::create([
            'name' => $faker->name
        ]);

        return new AuthorsResource($author);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return new AuthorsResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorsRequest $request, Author $author)
    {
        $author->update([
            'name' => $request->input('name')
        ]);
        return new AuthorsResource($author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Author $author)
    {
        $author->delete();
        return response(null, 204);
    }
}
