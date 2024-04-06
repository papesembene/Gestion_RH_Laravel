<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Exécute les opérations de remplissage de la base de données.
     */
    public function run(): void
    {
        // Création des rôles
        $admin = Role::create(['name' => 'Super Admin']);
        $manager = Role::create(['name' => 'Gestionnaire']);
        $user = Role::create(['name' => 'User Interne']);

        // Attribution des permissions aux rôles
        // Super Admin a toutes les permissions
        $admin->givePermissionTo([
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
            'delete-conges',
            'edit-conges',
            'view-all-conges',
            'delete-abscence',
            'edit-abscence',
            'create-talent',
            'delete-talent',
            'edit-talent',
            'create-document',
            'delete-document',
            'edit-document',
            'create-alert',
            'delete-alert',
            'edit-alert',
            'create-planning',
            'delete-planning',
            'edit-planning',
            'create-contrat',
            'delete-contrat',
            'my-planning',
            'team-planning',
            'edit-contrat',
            // Autres permissions spécifiques à votre application
            'view-employee-details', // Voir les détails spécifiques d'un employé
            'view-employee-profile',
            'view_dashboard',
        ]);

        // Gestionnaire a les permissions de gestion des employés et des utilisateurs
        $manager->givePermissionTo([
            'view_dashboard',
            'create-contrat',
            'delete-contrat',
            'edit-contrat',
            'create-employee',
            'edit-employee',
            'delete-employee',
            'view-employee',
            'create-dept',
            'delete-dept',
            'edit-dept',
            'create-talent',
            'delete-talent',
            'edit-talent',
            'create-document',
            'delete-document',
            'edit-document',
            'create-alert',
            'delete-alert',
            'edit-alert',
            'create-planning',
            'delete-planning',
            'edit-planning',
            'create-poste',
            'delete-poste',
            'edit-poste',
            'delete-conges',
            'edit-conges',
            'view-all-conges',
            'create-abscence',
            'delete-abscence',
            'edit-abscence',
            'create-user',
            'edit-user',
            'my-planning',
            'team-planning',
            'delete-user',
        ]);

        // User Interne a seulement la permission de visualiser les détails des employés
        $user->givePermissionTo([
            'view-employee',
            'my-planning',
            'team-planning',
            'create-conges',
            'create-abscence'
        ]);
    }
}
