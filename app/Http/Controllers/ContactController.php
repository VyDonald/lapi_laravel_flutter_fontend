<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Contact::with('groupe')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'groupe_id' => 'required|exists:groupes,id'
        ]);

        $contact = Contact::create($request->all());
        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $contact = Contact::find($id);

    if (!$contact) {
        return response()->json(['message' => 'Contact non trouvé'], 404);
    }

    return response()->json($contact, 200);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Récupérer le contact avec l'ID donné
    $contact = Contact::find($id);

    // Vérifier si le contact existe
    if (!$contact) {
        return response()->json(['message' => 'Contact non trouvé'], 404);
    }

    // Validation des données
    $request->validate([
        'nom' => 'sometimes|required|string|max:255',
        'prenom' => 'sometimes|required|string|max:255',
        'numero' => 'sometimes|required|string|max:20',
        'groupe_id' => 'sometimes|required|exists:groupes,id'
    ]);

    // Mise à jour du contact
    $contact->update($request->all());

    return response()->json($contact, 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(null, 204);
    }
}
