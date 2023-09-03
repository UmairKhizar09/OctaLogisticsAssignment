<?php

namespace App\Http\Controllers;
use App\Models\OctoFormLogistics;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form');
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
    public function store(Request $request)
    {
          $validator = FacadesValidator::make($request->all(),[
            'collecPostalCode' => 'required|string|max:10',
            'delPostalCode' => 'required|string|max:10',
            'collecDate' => 'required|date',
            'delDate' => 'required|date',
            'itemSelected' => 'required|string',
            'disCode' => 'nullable|string|max:30', 
          ]);

          
          if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $user = new OctoFormLogistics();
        $user->collecPostalCode = $request->collecPostalCode;
        $user->delPostalCode = $request->delPostalCode;
        $user->pickDate = $request->collecDate;
        $user->delDate = $request->delDate;
        $user->itemName = $request->itemSelected;
        $user->disCode = $request->disCode;
        $user->save();
        return response()->json(['success' => true]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
