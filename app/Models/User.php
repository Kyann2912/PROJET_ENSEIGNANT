<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenoms',
        'email',
        'contact',
        'role',
        'password',
    ];

    // Relation avec le modèle Professeur (un utilisateur peut être un professeur)
    public function professeur()
    {
        return $this->hasOne(Professeur::class, 'id_user'); // 'id_user' est la clé étrangère dans la table professeurs
    }

    // Relation avec le modèle Administrateur
    public function administrateur()
    {
        return $this->hasOne(Administrateur::class);
    }

    // Vérifie si l'utilisateur est un administrateur
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Vérifie si l'utilisateur est un professeur
    public function isProfesseur()
    {
        return $this->role === 'professeur';
    }

    // Relation pour récupérer tous les paiements d'un professeur
    public function paiements()
    {
        return $this->hasOne(Professeur::class, 'id_user')->with('paiements'); // On récupère les paiements via la relation avec Professeur
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
