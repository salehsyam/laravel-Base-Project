<?php

namespace App\Http\Controllers;

use App\Models\Pepole;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PepoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pepoles = Pepole::all();
        return response()->view('pepoles.index', ['pepoles' => $pepoles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('pepoles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $table->string('name');
        // $table->string('mobaile');
        // $table->string('phone');
        // $table->string('identification_number');
        // $table->integer('apartment_number');
        // $table->integer('floor_number');
        // $table->integer('family_members');
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'mobaile' => 'required|numeric',
            'phone' => 'required|numeric',
            'identification_number' => 'required|numeric',
            'apartment_number' => 'required|numeric',
            'floor_number' => 'required|numeric',
            'family_members' => 'required|numeric',
        ])->validate();

        $pepole = new Pepole();
        $pepole->name = $request->input('name');
        $pepole->mobaile = $request->input('mobaile');
        $pepole->phone = $request->input('phone');
        $pepole->identification_number = $request->input('identification_number');
        $pepole->apartment_number = $request->input('apartment_number');
        $pepole->floor_number = $request->input('floor_number');
        $pepole->family_members = $request->input('family_members');

        $isSaved = $pepole->save();

        return response()->json(
            ['message' => $isSaved ? __('User created successfully') : __('Create failed!')],
            $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pepole  $pepole
     * @return \Illuminate\Http\Response
     */
    public function show(Pepole $pepole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pepole  $pepole
     * @return \Illuminate\Http\Response
     */
    public function edit(Pepole $pepole)
    {
        //

        return response()->view('pepoles.edit', [
            'pepole' => $pepole,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pepole  $pepole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pepole $pepole)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'mobaile' => 'required|numeric',
            'phone' => 'required|numeric',
            'identification_number' => 'required|numeric',
            'apartment_number' => 'required|numeric',
            'floor_number' => 'required|numeric',
            'family_members' => 'required|numeric',
        ])->validate();


        $pepole->name = $request->input('name');
        $pepole->mobaile = $request->input('mobaile');
        $pepole->phone = $request->input('phone');
        $pepole->identification_number = $request->input('identification_number');
        $pepole->apartment_number = $request->input('apartment_number');
        $pepole->floor_number = $request->input('floor_number');
        $pepole->family_members = $request->input('family_members');

        $isSaved = $pepole->save();
        return response()->json(
            ['message' => $isSaved ? __('Updated successfully') : __('Update failed!')],

            $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pepole  $pepole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pepole $pepole)
    {
        //
        $isDeleted = $pepole->delete();
        return response()->json(
            ['message' => $isDeleted ? 'Deleted successfully' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
