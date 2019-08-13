<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Utilisateur;
use Faker\Generator as Faker;

$factory->define(Utilisateur::class, function (Faker $faker) {
    return [
        'nom_utilisateur' => 'MASTER',
        'prenom_utilisateur' => 'Admin',
        'service_utilisateur' => 'Informatique',
        'poste_utilisateur' => 'Administrateur',
        'profil_temporaire' => 'Administrateur',
        'login' => 'admin',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
    
    // return [
    //     'nom_utilisateur' => 'MASTER',
    //     'prenom_utilisateur' => 'Stock',
    //     'service_utilisateur' => 'Stock',
    //     'poste_utilisateur' => 'Gestionnaire',
    //     'profil_temporaire' => 'Stock',
    //     'login' => 'stock',
    //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //     'remember_token' => Str::random(10),
    // ];

    // return [
    //     'nom_utilisateur' => 'MASTER',
    //     'prenom_utilisateur' => 'Admin',
    //     'service_utilisateur' => 'Personnel',
    //     'poste_utilisateur' => 'Controlleur',
    //     'profil_temporaire' => 'Personnel',
    //     'login' => 'personnel',
    //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //     'remember_token' => Str::random(10),
    // ];
});
