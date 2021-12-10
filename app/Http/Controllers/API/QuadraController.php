<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Adotante;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuadraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quadras = Quadra::all();
        return $this->sucess($quadras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            return $this->sucess($quadras);

          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $adotante = Adotante::findOrFail($id);
            $adotante->delete();
            return $this->success($adotante);
          } catch (\Throwable $th) {
            return $this->error("Erro ao apagar o Adotante!!!", 401, $th->getMessage());
          }
        }
}
