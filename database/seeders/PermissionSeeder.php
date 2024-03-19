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
            'assign-employee-department', // Affecter un employé à un département
            'assign-employee-position', // Affecter un employé à un poste
            'assign-employee-talent', // Affecter un talent à un employé
            'manage-employee-absence', // Gérer les absences des employés
            'manage-employee-contract', // Gérer les contrats des employés

            // Autres permissions spécifiques à votre application
            'view-employee-details', // Voir les détails spécifiques d'un employé
            'view-employee-profile', // Voir le profil complet d'un employé
            'view-employee-salary', // Voir les informations sur le salaire d'un employé
            'edit-employee-salary', // Modifier les informations sur le salaire d'un employé
            'manage-employee-performance', // Gérer les évaluations de performance des employés
            'manage-employee-training', // Gérer la formation des employés
            'manage-employee-offboarding', // Gérer le processus de départ des employés

            // Ajoutez d'autres permissions au besoin
        ];

        // Création des permissions dans la table des permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
