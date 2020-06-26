<?php

namespace App\Http\Controllers;

use App\Engine;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnginesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $engines = Engine::orderBy('nom')->get();
    return view('engines.index', ['engines' => $engines]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('engines.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return Response
   */
  public function store(Request $request)
  {
    $data = $request->all();
    if(!(isset($data['is_location']) && $data['is_location']))
      $data['fournisseur'] = 'GM';

    Engine::create($data);
    return redirect()->route("engins.index");
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {
    try {
      $engin = Engine::find($id);
      return view("engines.edit", ["engin" => $engin]);
    } catch (Exception $e) {
      abort(404);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $data = $request->all([
      'matricule',
      'nom',
      'PU',
      'unite',
      'fournisseur',
      'is_location',
    ]);
    if(!(isset($data['is_location']) && $data['is_location']))
      $data['fournisseur'] = 'GM';
    unset($data['is_location']);
    Engine::where('id', $id)->update($data);
    return redirect()->route("engins.index");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    Engine::destroy($id);
    return redirect()->route("engins.index");
  }
}
