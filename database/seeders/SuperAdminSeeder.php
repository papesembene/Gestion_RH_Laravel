<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Exécute les opérations de remplissage de la base de données.
     */
    public function run(): void
    {
        // Création de l'utilisateur Super Admin
        $superAdmin = User::create([
            'name' => 'Pape Sembene', // Nom de l'utilisateur
            'email' => 'pape@example.com', // Adresse email de l'utilisateur
            'password' => Hash::make('password'), // Mot de passe de l'utilisateur (assurez-vous de sécuriser correctement les mots de passe en production)
        ]);
        $superAdmin->assignRole('Super Admin'); // Attribution du rôle Super Admin à l'utilisateur

        // Création de l'utilisateur User Interne
        $user = User::create([
            'name' => 'Abdou Diallo', // Nom de l'utilisateur
            'email' => 'abdou@example.com', // Adresse email de l'utilisateur
            'password' => Hash::make('password'), // Mot de passe de l'utilisateur
        ]);
        $user->assignRole('User Interne'); // Attribution du rôle User Interne à l'utilisateur

        // Création de l'utilisateur Gestionnaire
        $manager = User::create([
            'name' => 'Lamine Niang', // Nom de l'utilisateur
            'email' => 'lamine@example.com', // Adresse email de l'utilisateur
            'password' => Hash::make('password'), // Mot de passe de l'utilisateur
        ]);
        $manager->assignRole('Gestionnaire'); // Attribution du rôle Gestionnaire à l'utilisateur
    }
}

