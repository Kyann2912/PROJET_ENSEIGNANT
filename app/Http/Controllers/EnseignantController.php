<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;  //Pour le pdf
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Filiere; 
use App\Models\Statistique; 
use App\Models\User; 
use App\Models\Salle;  //Modèle filiere
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Paiement;  //Modèle paiement
use Illuminate\Support\Facades\Auth;
use App\Models\Professeur;  
use Illuminate\Support\Facades\Mail; //Pour le mail
use App\Mail\MessageNotification;    //Pour le mail
use App\Mail\Emploi;    //Pour le mail

use App\Mail\Password;    //Pour le mail

use App\Mail\Email;    //Pour le mail

use App\Models\Emploi_temps;  //Modèle emploi du temps 




use App\Models\Administrateur;  


class EnseignantController extends Controller


{


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'file_path' => 'required|file|mimes:pdf,jpg,png,docx|max:2048',
            'debut' => 'required|date',
            'fin' => 'required|date',
        ],
        [
            'email.required' => 'Veuillez renseigner tous les champs',
            'file_path.required' => 'Veuillez renseigner tous les champs',
            'debut.required' => 'Veuillez renseigner tous les champs',
            'fin.required' => 'Veuillez renseigner tous les champs',


        ]);

        $verifier = Emploi_temps::where('email', $request->email)
        ->where('debut', $request->debut)
        ->where('fin', $request->fin)
        ->first();

        if ($verifier) {
        return redirect('/liste-emplois')->with('yao', 'Emploi du temps existe déja.');
        }else{
            
        $filePath = $request->file('file_path')->store('emplois', 'public');

        $emploi = new Emploi_temps();
        $emploi->email = $request->input('email');
        $emploi->file_path = $filePath;
        $emploi->debut = $request->input('debut');
        $emploi->fin = $request->input('fin');
        $emploi->save();
        Mail :: to($request->email)->send(new Emploi);




        return redirect('/liste-emplois')->with('yann', 'Emploi du temps ajouté avec succès');

        }

        

    }



    

    public function A(){
        return view('enseignant.emploi-temps');
    }
    public function B(){
        $emplois = Emploi_temps :: all();
        return view('enseignant.listeemploitemps',compact('emplois'));

    }

    public function mot_passe(){
        return view('enseignant.mot-passe');
    }


    public function new_mot_passe(){
        return view('enseignant.nouveau-passe');
    }





    public function verifier_passe(Request $request){
        $request->validate([
            'email'=>'required'
        ]);

        $verifier = User :: where('email',$request->email)->exists();
        $code_verification = Str::random(3);
        Mail :: to($request->email)->send(new Email($code_verification));
            // Stocker le code dans la session
        $request->session()->put('code_verification', $code_verification);
        if($verifier){
            return redirect('/mot/passe/nouveau');
        }else{
            return redirect('/mot/passe')->with('message','Email Inconnue en base de données');
        }
    }

    public function nouveau(Request $request){
        $request->validate([
            'code'=>'required',
            'email'=>'required',
            'password'=>'required',
            'confirmed'=>'required'
        ]);

        $verifier = User :: where('email',$request->email)->exists();
        $user = User::where('email', $request->email)->first();


        //recupérer la session
        $code_verification = $request->session()->get('code_verification');


        if($code_verification !== $request->code){
            return redirect('/mot/passe/nouveau')->with('valider','Code de verification incorrect.');
        }

        if ($request->password !== $request->confirmed ){
            return redirect('/mot/passe/nouveau')->with('message','Mot de Passe  est différent de la confirmation');
        }
        if($verifier){
            if($user){
                $user->password = Hash::make($request->password);
                $user->save();
                return  redirect ('/connexion');
            }
            else{
                return redirect('/mot/passe/nouveau')->with('yann','Email inconnue');
            }

        }else{
            return redirect('/mot/passe/nouveau')->with('franck',"Veuillez revoir votre email");


        }

    }





    public function D(){
        return view('enseignant.inscription');
    }
    public function E(){
        $users = User:: all();
        return view('enseignant.liste-utilisateur',compact('users'));
    }

    public function F(){
        return view('enseignant.occupation');
    }

    public function G(){
        $occupations = Salle :: all();
        return view('enseignant.liste-occupation',compact('occupations'));
    }

    public function H(){
        return view('enseignant.paiement');
    }
    
    public function I(){
        $paiements = Paiement :: all();
        return view('enseignant.liste-paiement',compact('paiements'));
    }

    public function J(){
        return view('enseignant.filiere');
    }

    public function K(){
        $filieres = Filiere :: all();
        return view('enseignant.liste-filiere',compact('filieres'));
    }

    public function supprimer_filiere($id){
        $filieres = Filiere :: find($id);
        $filieres->delete();
        $suppression = new Statistique ();
        $suppression->filiere_supprimer = 0;
        $suppression->filiere_supprimer +=1;
        $suppression->save();
        return redirect('/liste-filieres')->with('supprimer','Filière supprimée avec succès');

    }

    public function supprimer_occupation($id){
        $occupation = Salle :: find($id);
        $occupation->delete();
        $suppression = new Statistique ();
        $suppression->occupation_supprimer = 0;
        $suppression->occupation_supprimer +=1;
        $suppression->save();
        return redirect('/liste-occupations')->with('supprimer','Occupation supprimée avec succès');

    }

    public function L(){
        return view('enseignant.connexion');
    }

    public function M(){
        $user = Auth::user();
        $nom = $user->name;
        $prenoms = $user->prenoms;
        $email = $user->email;

        $nbrePaiements = $user->professeur->paiements->count();

        $emplois = Emploi_temps::where('email', $user->email)->get();
        $nbre = $emplois->count();

        $data = [
            'labels'=> ['paiement','emploi'],
            'values'=> [$nbrePaiements,$nbre]
        ];


        return view('enseignant.professeur',compact('nom','prenoms','nbre','data','nbrePaiements'));
    }

    public function N(){
        $user = Auth::user();
        $nom = $user->name;
        $prenoms = $user->prenoms;
        $email = $user->email;
        

        // Récupérer les emplois du temps  du professeur connecté
        $emplois = Emploi_temps::where('email', $user->email)->get();

        return view('enseignant.professeur-emploi',compact('emplois'));
    }










    public function P(){
        return view('enseignant.message');
    }

    public function ajouter_occupation_traitement(Request $request){
        $request->validate([
            'nom_salle' =>'required',
            'occupation' =>'required',
            'heure' =>'required|string',
            'date_occupation' =>'required'

        ],[
            'nom_salle.required' => 'Veuillez renseigner tous les champs',
            'occupation.required' => 'Veuillez renseigner tous les champs',
            'heure.required' => 'Veuillez renseigner tous les champs',
            'date_occupation.required' => 'Veuillez renseigner tous les champs',


        ]);

        $verifier = Salle::where('nom_salle', $request->nom_salle)
        ->where('date_occupation', $request->date_occupation)
        ->where('heure', $request->heure)
        ->first();

        if ($verifier) {
        return redirect('/liste-emplois')->with('reine', 'Occupation existe déja.');
        }else{
            
        $occupation = new  Salle();

        $occupation->nom_salle = $request->nom_salle;
        $occupation->occupation = $request->occupation;
        $occupation->heure = $request->heure;
        $occupation->date_occupation = $request->date_occupation;

        $occupation->save();



        return redirect('/liste-occupations')->with('message','Occupation ajoutée avec succès');

        }


    }

    public function ajout_paiement(Request $request){
        $request->validate([
            'id_professeur'=>'required',
            'filiere_niveau'=>'required',
            'cours'=>'required',
            'nbre_heures'=>'required',
            'montant_heure'=>'required',
        ],[
            'id_professeur.required' => 'Veuillez renseigner tous les champs',
            'filiere_niveau.required' => 'Veuillez renseigner tous les champs',
            'cours.required' => 'Veuillez renseigner tous les champs',
            'nbre_heures.required' => 'Veuillez renseigner tous les champs',
            'montant_heure.required' => 'Veuillez renseigner tous les champs',
        ]);

        $total = $request->montant_heure * $request->nbre_heures;

        $verifier = Paiement::where('id_professeur', $request->id_professeur)
        ->where('filiere_niveau', $request->filiere_niveau)
        ->where('cours', $request->cours)
        ->where('nbre_heures', $request->nbre_heures)
        ->first();

        if ($verifier) {
        return redirect('/liste-paiements')->with('reine', 'Paiement existe déja.');
        }else{
            $paiement = new Paiement();
            $paiement->filiere_niveau = $request->filiere_niveau;
            $paiement->cours = $request->cours;
            $paiement->nbre_heures = $request->nbre_heures;
            $paiement->montant_heure = $request->montant_heure;
            $paiement->montant_total = $total;
            $paiement->id_professeur = $request->id_professeur;
    
            $paiement->save();

    
            return redirect('/liste-paiements')->with('message','Paiement ajouté avec succès')->withInput([]);

        }




    }

    public function ajouter_filiere_traitement(Request $request){

        $request->validate([
            'departement' =>'required',
            'nom_filiere' =>'required',
            'responsable' =>'required'
        ],[
            'departement.required' => 'Veuillez renseigner tous les champs',
            'nom_filiere.required' => 'Veuillez renseigner tous les champs',
            'responsable.required' => 'Veuillez renseigner tous les champs',
        ]);

        $verifier = Filiere::where('departement', $request->departement)
        ->where('nom_filiere', $request->nom_filiere)
        ->where('responsable', $request->responsable)
        ->first();

        if ($verifier) {
        return redirect('/liste-filieres')->with('reine', 'Filière existe déja.');
        }else{
            $filiere = new Filiere();
            $filiere->departement = $request->departement;
            $filiere->nom_filiere = $request->nom_filiere;
            $filiere->responsable = $request->responsable;
            $filiere-> save();
    

    
            return redirect('/liste-filieres')->with('message','Filière ajouté avec succès')->withInput([]);

        }



    }

    public function C(){
        $filiere = Filiere::count();
        $utilisateur =  User::count();
        $paiement = Paiement::count();
        $emploi =  Emploi_temps::count();
        $salle = Salle::count();
        $data = [
            'labels'=> ['filiere','utilisateur','paiement','emploi','salle'],
            'values'=> [$filiere,$utilisateur,$paiement,$emploi,$salle]
        ];

        $user = Auth::user();
        $nom = $user->name;
        $prenoms = $user->prenoms;

        return view('enseignant.tableau', compact('data','filiere','utilisateur','paiement','emploi','salle','nom','prenoms'));
    }


    public function update_filiere($id){
        $filiere = Filiere :: find($id);
        return view ('enseignant.update-filiere',compact('filiere'));
    }


    public function traitement_filiere(Request $request)
    {
        $request->validate([
            'departement' => 'required',
            'nom_filiere' => 'required',
            'responsable' => 'required',
        ]);
    
        $filiere = Filiere::find($request->id);
    
        if (!$filiere) {
            return redirect('/liste-filieres')->with('error', 'Filière non trouvée');
        }

        $filiere->departement = $request->departement;
        $filiere->nom_filiere = $request->nom_filiere;
        $filiere->responsable = $request->responsable;
        $filiere->update();
        $suppression = new Statistique ();
        $suppression->filiere_modifier = 0;
        $suppression->filiere_modifier +=1;
        $suppression->save();
        
    
        return redirect('/liste-filieres')->with('modifier', 'Filière modifiée avec succès');
    }

    public function update_occupation($id){
        $occupation = Salle :: find($id);
        return view ('enseignant.O',compact('occupation'));
    }


    public function modifier_occupation(Request $request){

        $request->validate([
            'nom_salle' =>'required',
            'occupation' =>'required',
            'heure' =>'required',
            'date_occupation' =>'required'

        ]);

        $occupation = Salle::find($request->id);

        if (!$occupation) {
            return redirect('/liste-occupations')->with('error', 'Occupation non trouvée');
        }
        $occupation->nom_salle = $request->nom_salle;
        $occupation->occupation = $request->occupation;
        $occupation->heure = $request->heure;
        $occupation->date_occupation = $request->date_occupation;
        $occupation-> update();
        $suppression = new Statistique ();
        $suppression->occupation_modifier = 0;
        $suppression->occupation_modifier +=1;
        $suppression->save();
        return redirect('/liste-occupations')->with('modifier', 'Occupation modifiée avec succès');
    }


    public function ajouter_inscription(Request $request) {
        $request->validate([
            'name' => 'required',
            'prenoms' => 'required',
            'email' => 'required|email',
            'matiere' => 'required_if:role,professeur',
            'role' => 'required',
            'password' => 'required_if:role,admin',
        ],
        [
            'name.required' => 'Veuillez renseigner tous les champs',
            'prenoms.required' => 'Veuillez renseigner tous les champs',
            'email.required' => 'Veuillez renseigner tous les champs',
            'matiere.required_if:role,professeur' => 'Veuillez renseigner tous les champs',
            'role.required' => 'Veuillez renseigner tous les champs',
            'password.required_if:role,admin' => 'Veuillez renseigner tous les champs',



        ]);

        $verifier = User::where('email', $request->email)->first();
        if ($verifier) {
            return redirect('/liste-utilisateurs')->with('reine', 'Utilisateur existe déjà.');
        }else{
            $user = new User();
    
            $user->name = $request->name;
            $user->prenoms = $request->prenoms;
            $user->email = $request->email;
            $user->role = $request->role;


            //Les coordonnées pour envoyer le mail
            $mot_passe = Str::random(8);
            $email = $request->email;
            $name = $request->name;
            $prenoms = $request->prenoms;

        
            if ($user->role === 'admin') {
                $user->password = Hash::make($request->password);
            } elseif ($user->role === 'professeur') {
                $user->password = Hash :: make($mot_passe); 
            }
            $user->save();


    
        if ($user->role === 'admin') {
            $admin = new Administrateur();
            $admin->id_user = $user->id;
            $admin->save();
        } elseif ($user->role === 'professeur') {
            $professeur = new Professeur();
            $professeur->id_user = $user->id;
            $professeur->matiere= $request->matiere;
            $professeur->save();
            Mail::to($email)->send(new MessageNotification($name,$prenoms,$mot_passe));

        }

        // Envoyer l'email


        return redirect('/liste-utilisateurs')->with('sms','Utilisateur ajouté avec succès');
        }

    
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Veuillez renseigner tous les champs',
            'password.required' => 'Veuillez renseigner tous les champs',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $noms = $user->name;
            if ($user->role === 'admin') {
                return redirect('/tableau')->with(compact('noms'));
            } elseif ($user->role === 'professeur') {
                return redirect('/professeur');
            }
        }else{
            return redirect('/connexion')->with('message','Email ou Mot de Passe Incorrect ❌');
        }
    }




    public function deconnexion(Request $request){
        Auth :: logout();
        return redirect('/connexion');
    }

    public function supprimer_utilisateur($id){
        $suppression = new Statistique ();
        $suppression->utilisateur_supprimer = 0;
        $user = User :: find($id);
        $user->delete();
        $suppression->utilisateur_supprimer +=1;
        $suppression->save();
        return redirect('/liste-utilisateurs')->with('bibi', 'Utilisateur supprimé avec succès');




    }


    public function detail_utilisateur(){
        return view('enseignant.detail-utilisateur');
    }


    public function audit(){
        $uti_supprimer = Statistique::sum('utilisateur_supprimer');
        $uti_modifier = Statistique::sum('utilisateur_modifier');
        $paiement_supprimer = Statistique::sum('paiement_supprimer');
        $paiement_modifier = Statistique::sum('paiement_modifier');
        $filiere_supprimer = Statistique::sum('filiere_supprimer');
        $filiere_modifier = Statistique::sum('filiere_modifier');
        $emploi_supprimer = Statistique::sum('emploi_supprimer');
        $emploi_modifier = Statistique::sum('emploi_modifier');
        $occupation_supprimer = Statistique::sum('occupation_supprimer');
        $occupation_modifier = Statistique::sum('occupation_modifier');
        
        $filiere = Filiere::count();
        $utilisateur =  User::count();
        $paiement = Paiement::count();
        $emploi =  Emploi_temps::count();
        $salle = Salle::count();
        return view('enseignant.audit',compact('filiere','utilisateur','paiement','emploi','salle','uti_supprimer','uti_modifier','paiement_supprimer', 'paiement_modifier', 'filiere_supprimer','filiere_modifier', 'emploi_supprimer', 'emploi_modifier', 'occupation_supprimer', 'occupation_modifier'));
    }


    public function pdf(){
        $filiere = Filiere::count();
        $utilisateur =  User::count();
        $paiement = Paiement::count();
        $emploi =  Emploi_temps::count();
        $salle = Salle::count();
        $uti_supprimer = Statistique::sum('utilisateur_supprimer');
        $uti_modifier = Statistique::sum('utilisateur_modifier');
        $paiement_supprimer = Statistique::sum('paiement_supprimer');
        $paiement_modifier = Statistique::sum('paiement_modifier');
        $filiere_supprimer = Statistique::sum('filiere_supprimer');
        $filiere_modifier = Statistique::sum('filiere_modifier');
        $emploi_supprimer = Statistique::sum('emploi_supprimer');
        $emploi_modifier = Statistique::sum('emploi_modifier');
        $occupation_supprimer = Statistique::sum('occupation_supprimer');
        $occupation_modifier = Statistique::sum('occupation_modifier');
        $occupation_ajouter = Statistique::sum('occupation_ajouter');

        $date = Carbon::now()->format('d-m-Y'); 
        $pdf = Pdf::loadView('Enseignant.rapport',compact('utilisateur','salle','filiere','paiement','emploi','uti_supprimer','date','uti_modifier','paiement_supprimer', 'paiement_modifier', 'filiere_supprimer','filiere_modifier', 'emploi_supprimer', 'emploi_modifier', 'occupation_supprimer', 'occupation_modifier'));
        $date = Carbon::now()->format('Y-m-d  H:i:s'); 
        // le PDF télécharger
        return $pdf->download('Audit'.$date.'.pdf');

    }

    public function supprimer_paiement($id){
        $paiement = Paiement::find($id);
        $paiement->delete();
        $suppression = new Statistique ();
        $suppression->paiement_supprimer = 0;
        $suppression->paiement_supprimer +=1;
        $suppression->save();
        return redirect('/liste-paiements')->with('vie','Paiement supprimé avec succès');
    }

    public function modifier_paiement($id){
        $paiement = Paiement :: find($id);
        return view ('enseignant.update-paiement',compact('paiement'));
    }


    public function AJ(Request $request){

        $request->validate([
            'id_professeur'=>'required',
            'filiere_niveau'=>'required',
            'cours'=>'required',
            'nbre_heures'=>'required',
            'montant_heure'=>'required',
        ]);

        try {
            $paiement = Paiement::find($request->id);
        
            if (!$paiement) {
                return redirect('/liste-paiements')->with('error', 'Paiement introuvable.');
            }
        
            $total = $request->nbre_heures * $request->montant_heure;
        
            $paiement->id_professeur = $request->id_professeur;
            $paiement->filiere_niveau = $request->filiere_niveau;
            $paiement->cours = $request->cours;
            $paiement->nbre_heures = $request->nbre_heures;
            $paiement->montant_heure = $request->montant_heure;
            $paiement->montant_total = $total;
            $paiement->save();
            $suppression = new Statistique ();
            $suppression->paiement_modifier = 0;
            $suppression->paiement_modifier +=1;
            $suppression->save();
        
            return redirect('/liste-paiements')->with('success', 'Paiement modifié avec succès');
        } catch (\Exception $e) {
            return redirect('/liste-paiements')->with('error', 'Erreur : ' . $e->getMessage());
        }
        



    }
    public function update_paiement(Request $request)
    {
        $request->validate([
            'id_professeur' => 'required',
            'filiere_niveau' => 'required',
            'cours' => 'required',
            'nbre_heures' => 'required|numeric',
            'montant_heure' =>'required|numeric',
        ]);

        try {
        // Vérification de l'existence du paiement
            $paiement = Paiement::find($request->id);

            if (!$paiement) {
                return redirect('/liste-paiements')->with('error', 'Paiement introuvable.');
            }

        // Calcul du montant total
            $total = $request->nbre_heures * $request->montant_heure;

        // Mise à jour des données
            $paiement->id_professeur = $request->id_professeur;
            $paiement->filiere_niveau = $request->filiere_niveau;
            $paiement->cours = $request->cours;
            $paiement->nbre_heures = $request->nbre_heures;
            $paiement->montant_heure = $request->montant_heure; // Correction du champ
            $paiement->montant_total = $total;
            $paiement->save();
            $suppression = new Statistique ();
            $suppression->paiement_modifier = 0;
            $suppression->paiement_modifier +=1;
            $suppression->save();

        // Mise à jour de la statistique
            $statistique = Statistique::first(); // Récupère la première ligne existante
            if ($statistique) {
                $statistique->paiement_modifier += 1;
                $statistique->save();
            } else {
                $statistique = new Statistique();
                $statistique->paiement_modifier = 1;
                $statistique->save();
            }

            return redirect('/liste-paiements')->with('success', 'Paiement modifié avec succès');
        } catch (\Exception $e) {
            return redirect('/liste-paiements')->with('error', 'Erreur : ' . $e->getMessage());
        }
    }



    public function Télécgarger_emploi_temps()
{
    // Récupérer l'utilisateur connecté
    $user = Auth::user();
    
    // Récupérer l'emploi du temps associé à l'id de l'utilisateur connecté
    $emploi = Emploi_temps::where('email', $user->email)->first();
    
    // Vérifier si un emploi du temps existe pour cet utilisateur
    if ($emploi) {
        // Récupérer le chemin du fichier
        $filePath = storage_path('app/public/' . $emploi->file_path);
        
        // Vérifier si le fichier existe
        if (file_exists($filePath)) {
            // Retourner le fichier pour téléchargement
            return response()->download($filePath);
        } else {
            return redirect('/professeur-emploi')->with('erreur', 'Le fichier de l\'emploi du temps n\'existe pas.Veuillez contacter l\'administration.');
        }
    } else {
        return redirect('/professeur-emploi')->with('ephrem', 'Aucun emploi du temps trouvé pour cet utilisateur.');
    }
}


    public function supprimer_emploi($id){
        $supprimer = Emploi_temps::find($id);
        $supprimer->delete();
        $suppression = new Statistique ();
        $suppression->emploi_supprimer = 0;
        $suppression->emploi_supprimer +=1;
        $suppression->save();
        return redirect('liste-emplois')->with('sms','Emploi du temps supprimé avec succès');


    }

    public function modifier_emploi($id){
        $emploi = Emploi_temps::find($id);
        return view ('enseignant.update-emploi',compact('emploi'));
    }


    public function modifier_traitement_emploi(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'file_path' => 'nullable|file|mimes:pdf,jpg,png,docx|max:2048', // Fichier optionnel
            'debut' => 'required|date',
            'fin' => 'required|date',
        ]);
    
        // Vérifier si l'emploi du temps existe
        $emploi = Emploi_temps::find($request->id);
        if (!$emploi) {
            return redirect('/liste-emplois')->with('error', 'Emploi du temps non trouvé.');
        }
    
        // Mise à jour des champs
        $emploi->email = $request->email;
        $emploi->debut = $request->debut;
        $emploi->fin = $request->fin;
    
        // Gestion du fichier si un nouveau fichier est téléchargé
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('emplois', 'public');
            $emploi->file_path = $filePath;
        }
    
        // Sauvegarder les modifications
        $emploi->update();
        $suppression = new Statistique ();
        $suppression->emploi_modifier = 0;
        $suppression->emploi_modifier +=1;
        $suppression->save();
        $suppression = new Statistique ();
        $suppression->emploi_modifier = 0;
        $suppression->emploi_modifier +=1;
        $suppression->save();
    
        // Redirection avec message de succès
        return redirect('/liste-emplois')->with('reine', 'Emploi du temps modifié avec succès.');
    }
    









    public function paiementsProfesseur()
    {
        $user = Auth::user();

        $paiements = $user->professeur->paiements;
    
        return view('enseignant.professeur-paiement', compact('paiements'));

    }
    

    public  function modifier($id){

        $utilisateur = User :: find($id);
        $professeur = Professeur :: find($id);
        return view('enseignant.update-utilisateur',compact('utilisateur','professeur'));

    }

    public function inscription(Request $request) {
        $request->validate([
            'name' => 'required',
            'prenoms' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'role' => 'required',
            'password' => 'nullable|required_if:role,admin|required_if:role,professeur',
            'matiere' => 'nullable|required_if:role,professeur',
        ]);
    
        // Récupérer l'utilisateur
        $user = User::find($request->id);
    
        // Mise à jour des informations utilisateur
        $user->name = $request->name;
        $user->prenoms = $request->prenoms;
        $user->email = $request->email;
        $user->role = $request->role;
    
        // Génération du mot de passe
        $mot_passe = Str::random(8);
        if ($user->role === 'admin') {
            $user->password = Hash::make($request->password);
        } elseif ($user->role === 'professeur') {
            $user->password = Hash::make($mot_passe);
        }
    
        $user->save();
    
        // Mise à jour des rôles spécifiques
        if ($user->role === 'admin') {
            $admin = Administrateur::where('id_user', $user->id)->first();
            $admin->save();
        } elseif ($user->role === 'professeur') {
            $professeur = Professeur::where('id_user', $user->id)->first();
            $professeur->matiere = $request->matiere;
            $professeur->save();
    

        }
        $suppression = new Statistique ();
        $suppression->utilisateur_modifier = 0;
        $suppression->utilisateur_modifier +=1;
        $suppression->save();
        
    
        return redirect('/liste-utilisateurs')->with('yanno','Utilisateur modifié avec succès');
    }

    public function franck(){
        return view('enseignant.professeur-password');
    }


    
    public function modifier_password(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'confirmation' => 'required|string|min:8',

        ],[
            'password.required'=>'Veuillez saisir tous les champs',
            'confirmation.required'=>'Veuillez saisir tous les champs',

        ]);

        if ($request->password != $request->confirmation) {
            return redirect('/professeur/password')->with('confirmation' , 'Mot de Passe différent de la confirmation');
        }else{

            $user = Auth::user();
            $nom = $user->name;
            $prenoms = $user->prenoms;
            $email = $user->email;
            $user->password = Hash::make($request->password);
            Mail::to($email)->send(new Password($nom,$prenoms));
            $user->save();

            return redirect('/professeur');
            
        }
    

    }

    public function pdf_salle(){

        $occupations = Salle :: all();
        $date = Carbon::now()->format('d-m-Y'); 
        $pdf = Pdf::loadView('Enseignant.occupation-pdf',compact('occupations','date'));
        $date = Carbon::now()->format('Y-m-d  H:i:s'); 
        // le PDF télécharger
        return $pdf->download('Occupation_Salle'.$date.'.pdf');


    }

    
    public function liste_paiement()
    {
        $user = Auth::user();
    
        // Récupération des paiements associés à l'enseignant
        $paiements = $user->professeur->paiements;
        
        // Formatage de la date actuelle
        $date = Carbon::now()->format('d-m-Y'); 
        $pdf = Pdf::loadView('Enseignant.professeur-paiement-liste',compact('paiements','date'));

        // Génération du PD
    
        // Téléchargement du fichier PDF
        return $pdf->download('Paiement_Enseignant_'.$date.'.pdf');


    }
    





    

    
    
    
    





    

    





    //
}
