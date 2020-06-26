<?php

namespace App\Http\Controllers;

use App\Personnel;
use App\SuiviPersonnel;
use Illuminate\Http\Request;

class ConcasseurPersonnelInterimaireController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $from = $request->input('from', date('Y-m-d', strtotime("today")));
    $to = $request->input('to', date('Y-m-d', strtotime("today")));
    $personnel = $request->input('personnel', -1);

    $query = SuiviPersonnel::whereBetween('date', [$from, $to])
      ->where('personnel_contrat', '<>', 'GTR')
      ->whereIn('atelier', ['STM1', 'STM2']);
    if ($personnel > 0)
      $query->where('personnel_id', $personnel);

    $entries = $query->get();

    $personnels = Personnel::orderBy('nom')->where('contrat', '<>', 'GTR')->get();

    return view('concasseur.personnel-interimaire.index', ['entries' => $entries, 'from' => $from, 'to' => $to, "personnels" => $personnels, "personnel" => $personnel]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $personnels = Personnel::orderBy('nom')->where('contrat', '<>', 'GTR')->get();
    return view('concasseur.personnel-interimaire.create', ["personnels" => $personnels]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->all();
    $personnel = Personnel::find($data['personnel']);
    SuiviPersonnel::create([
      'personnel_id' => $personnel->id,
      'personnel_nom' => $personnel->nom,
      'personnel_prenom' => $personnel->prenom,
      'personnel_matricule' => $personnel->matricule,
      'personnel_contrat' => $personnel->contrat,
      'personnel_PU' => $personnel->PU,
      'personnel_unite' => $personnel->unite,
      'heures' => $data['heures'],
      'date' => $data['date'],
      'atelier' => $data['atelier'],
    ]);
    return redirect()->route('concasseur.personnel-interimaire.index');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $entry = SuiviPersonnel::find($id);
    return view('concasseur.personnel-interimaire.edit', ["entry" => $entry]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    $data = $request->all();
    $personnel = Personnel::find($data['personnel']);
    if (isset($data['should_copy']) && $data['should_copy']) {
      SuiviPersonnel::where('id', $id)->update([
        'personnel_id' => $personnel->id,
        'personnel_nom' => $personnel->nom,
        'personnel_prenom' => $personnel->prenom,
        'personnel_matricule' => $personnel->matricule,
        'personnel_contrat' => $personnel->contrat,
        'personnel_PU' => $personnel->PU,
        'personnel_unite' => $personnel->unite,
        'heures' => $data['heures'],
        'date' => $data['date'],
        'atelier' => $data['atelier'],
      ]);
    } else {
      SuiviPersonnel::where('id', $id)->update([
        'personnel_id' => $personnel->id,
        'personnel_nom' => $personnel->nom,
        'personnel_prenom' => $personnel->prenom,
        'personnel_matricule' => $personnel->matricule,
        'personnel_contrat' => $personnel->contrat,
        'personnel_PU' => $data['personnel_PU'],
        'personnel_unite' => $data['personnel_unite'],
        'heures' => $data['heures'],
        'date' => $data['date'],
        'atelier' => $data['atelier'],
      ]);
    }

    return redirect()->route('concasseur.personnel-interimaire.index');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    SuiviPersonnel::destroy($id);
    return redirect()->route("concasseur.personnel-interimaire.index");
  }
}
