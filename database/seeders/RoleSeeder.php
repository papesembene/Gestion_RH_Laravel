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
        $admin->givePermissionTo(Permission::all());

        // Gestionnaire a les permissions de gestion des employés et des utilisateurs
        $manager->givePermissionTo([
            'create-employee',
            'edit-employee',
            'delete-employee',
            'view-employee',
            'assign-employee-department',
            'assign-employee-position',
            'assign-employee-talent',
            'manage-employee-absence',
            'manage-employee-contract',
            'create-user',
            'edit-user',
            'delete-user',
        ]);

        // User Interne a seulement la permission de visualiser les détails des employés
        $user->givePermissionTo([
            'view-employee',
        ]);
    }
}
