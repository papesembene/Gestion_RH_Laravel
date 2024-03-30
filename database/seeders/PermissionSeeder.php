<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Exécute les opérations de remplissage de la base de données.
     */
    public function run(): void
    {
        $permissions = [
            // Permissions pour la gestion des rôles
            'create-role', // Créer un rôle
            'edit-role', // Modifier un rôle
            'delete-role', // Supprimer un rôle
            // Permissions pour la gestion des utilisateurs
            'create-user', // Créer un utilisateur
            'edit-user', // Modifier un utilisateur
            'delete-user', // Supprimer un utilisateur
            // Permissions pour la gestion des employés
            'create-employee', // Créer un employé
            'edit-employee', // Modifier un employé
            'delete-employee', // Supprimer un employé
            'view-employee', // Voir les détails d'un employé
            'view-employee-list', // Voir la liste des employés
            'create-dept',
            'delete-dept',
            'edit-dept',
            'create-poste',
            'delete-poste',
            'edit-poste',
            'create-conges',
            'delete-conges',
            'edit-conges',
            'create-document',
            'delete-document',
            'edit-document',
            'create-contrat',
            'delete-contrat',
            'edit-contrat',
            'create-alert',
            'delete-alert',
            'edit-alert',
            'create-planning',
            'delete-planning',
            'edit-planning',
            'view-all-conges',
            'create-abscence',
            'delete-abscence',
            'edit-abscence',
            'create-talent',
            'delete-talent',
            'edit-talent',
            'view_dashboard',
            'view-employee-details', // Voir les détails spécifiques d'un employé
            'view-employee-profile', // Voir le profil complet d'un employé
            // Ajoutez d'autres permissions au besoin
        ];

        // Création des permissions dans la table des permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
