<?php

namespace App\Http\Controllers;

use App\Personnel;
use Exception;
use Illuminate\Http\Request;

class PersonnelsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $personnels = Personnel::orderBy('nom')->get();
    return view("personnels.index", ["personnels" => $personnels]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view("personnels.create");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Personnel::create($request->all());
    return redirect()->route("personnels.index");
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
    try {
      $personnel = Personnel::find($id);
      return view("personnels.edit", ["personnel" => $personnel]);
    } catch (Exception $e) {
      abort(404);
    }
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
    Personnel::where('id', $id)->update($request->all([
      'matricule',
      'nom',
      'prenom',
      'contrat',
      'debut',
      'fin',
      'PU',
      'unite',
      'designation',
    ]));
    return redirect()->route("personnels.index");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Personnel::destroy($id);
    return redirect()->route("personnels.index");
  }
}
