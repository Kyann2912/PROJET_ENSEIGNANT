<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    /**
     * Relation avec le modèle User
     * Un professeur appartient à un utilisateur via la clé étrangère 'id_user'
     */
    public function personne()
    {
        return $this->belongsTo(User::class, 'id_user'); // 'id_user' est la clé étrangère
    }

    /**
     * Relation avec le modèle Paiement
     * Un professeur peut avoir plusieurs paiements
     */
    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'id_professeur'); // 'id_professeur' est la clé étrangère dans la table 'paiements'
    }
}
