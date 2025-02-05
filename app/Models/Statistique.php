<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistique extends Model
{
    use HasFactory;
    protected $fillable = [
        'uti_supprimer','uti_modifier','paiement_supprimer', 'paiement_modifier', 'filiere_supprimer','filiere_modifier', 'emploi_supprimer', 'emploi_modifier', 'occupation_supprimer', 'occupation_modifier','utilisateur_ajouter','paiement_ajouter','filiere_ajouter','emploi_ajouter','occupation_ajouter'

    ];
}