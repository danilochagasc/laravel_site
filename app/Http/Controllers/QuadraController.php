<?php

namespace App\Http\Controllers;

use App\Models\Quadra;
use Illuminate\Http\Request;

class QuadraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quadras=Quadra::all();
        return view("adm/quadra", compact("quadras"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("adm/quadra/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|max:250',
            'modalidade' => 'required|max:250',
            'latitude' => 'required|max:250',
            'longitude' => 'required|max:250',
          ]);
          if ($validated) {
            $quadra = new Quadra();
            $quadra->user_id = $request->user()->id;
            $quadra->nome = $request->get('nome');
            $quadra->modalidade = $request->get('modalidade');
            $quadra->latitude = $request->get('latitude');
            $quadra->longitude = $request->get('longitude');
            $quadra->save();
            return redirect('quadra');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quadra  $quadra
     * @return \Illuminate\Http\Response
     */
    public function show(Quadra $quadra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quadra  $quadra
     * @return \Illuminate\Http\Response
     */
    public function edit(Quadra $quadra)
    {
        return view('adm/quadra/edit', compact('quadra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quadra  $quadra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quadra $quadra)
    {
        $validated = $request->validate([
            'nome' => 'required|integer',
            'modalidade' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
          ]);
          if ($validated) {
            $quadra->nome = $request->get('nome');
            $quadra->modalidade = $request->get('modalidade');
            $quadra->latitude = $request->get('latitude');
            $quadra->longitude = $request->get('longitude');
            $quadra->save();
            return redirect('quadra');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quadra  $quadra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quadra $quadra)
    {
        $quadra->delete();
        return redirect('quadra');
    }
}
