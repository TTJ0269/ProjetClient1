<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            'nom' => 'TOGNI',
            'prenom' => 'Joël',
            'nompere' => 'TOGNI',
            'nommere' => 'SEBOUNOU',
            'sexe' => 'M',
            'datenaissance' => '2000-06-30',
            'profession' => 'Etudiant',
            'adresse' => 'Kodjoviakopé',
            'image' => 'M',
            'type_utilisateur_id' => 1,
            'region_id' => 1,
            'etat' => 0,
        ]);

        DB::table('type_utilisateurs')->insert([
            'nom' => 'Administrateur',
        ]);

        DB::table('republiques')->insert([
            'nomrep' => 'TOGOLAISE',
        ]);

        DB::table('regions')->insert([
            'nom' => 'Maritime',
            'republique_id' => 1,
        ]);

        DB::table('etats')->insert([
            'etat' => 1,
        ]);
    
    }
}
