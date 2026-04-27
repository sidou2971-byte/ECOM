<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Catégories principales
        $cats = Category::create([
            'name' => 'Chats',
            'slug' => 'chats',
            'description' => 'Produits pour chats',
            'icon' => '🐱',
            'order' => 1,
        ]);

        $dogs = Category::create([
            'name' => 'Chiens',
            'slug' => 'chiens',
            'description' => 'Produits pour chiens',
            'icon' => '🐶',
            'order' => 2,
        ]);

        $birds = Category::create([
            'name' => 'Oiseaux',
            'slug' => 'oiseaux',
            'description' => 'Produits pour oiseaux',
            'icon' => '🐦',
            'order' => 3,
        ]);

        // Sous-catégories pour Chats
        $catAlimentaire = Category::create([
            'name' => 'Alimentaire',
            'slug' => 'chats-alimentaire',
            'parent_id' => $cats->id,
            'order' => 1,
        ]);

        Category::create(['name' => 'Croquettes', 'slug' => 'chats-croquettes', 'parent_id' => $catAlimentaire->id, 'order' => 1]);
        Category::create(['name' => 'Conserves', 'slug' => 'chats-conserves', 'parent_id' => $catAlimentaire->id, 'order' => 2]);
        Category::create(['name' => 'Gelées', 'slug' => 'chats-gelées', 'parent_id' => $catAlimentaire->id, 'order' => 3]);
        Category::create(['name' => 'Friandises', 'slug' => 'chats-friandises', 'parent_id' => $catAlimentaire->id, 'order' => 4]);

        $catAccessoires = Category::create([
            'name' => 'Accessoires',
            'slug' => 'chats-accessoires',
            'parent_id' => $cats->id,
            'order' => 2,
        ]);

        Category::create(['name' => 'Arbres à chat', 'slug' => 'arbres-chat', 'parent_id' => $catAccessoires->id, 'order' => 1]);
        Category::create(['name' => 'Cage de transport', 'slug' => 'cage-transport-chat', 'parent_id' => $catAccessoires->id, 'order' => 2]);
        Category::create(['name' => 'Harnais et collier', 'slug' => 'harnais-collier-chat', 'parent_id' => $catAccessoires->id, 'order' => 3]);
        Category::create(['name' => 'Litières et Bac', 'slug' => 'litteres-chat', 'parent_id' => $catAccessoires->id, 'order' => 4]);
        Category::create(['name' => 'Distributeur et gamelle', 'slug' => 'distributeur-gamelle-chat', 'parent_id' => $catAccessoires->id, 'order' => 5]);
        Category::create(['name' => 'Coussin et couchage', 'slug' => 'coussin-chat', 'parent_id' => $catAccessoires->id, 'order' => 6]);

        $catSoin = Category::create([
            'name' => 'Soin et Toilettage',
            'slug' => 'chats-soin',
            'parent_id' => $cats->id,
            'order' => 3,
        ]);

        Category::create(['name' => 'Brosses et soins', 'slug' => 'brosses-chat', 'parent_id' => $catSoin->id, 'order' => 1]);
        Category::create(['name' => 'Shampoings', 'slug' => 'shampoings-chat', 'parent_id' => $catSoin->id, 'order' => 2]);

        // Sous-catégories pour Chiens
        $dogAlimentaire = Category::create([
            'name' => 'Alimentaire',
            'slug' => 'chiens-alimentaire',
            'parent_id' => $dogs->id,
            'order' => 1,
        ]);

        Category::create(['name' => 'Croquettes', 'slug' => 'chiens-croquettes', 'parent_id' => $dogAlimentaire->id, 'order' => 1]);
        Category::create(['name' => 'Conserves', 'slug' => 'chiens-conserves', 'parent_id' => $dogAlimentaire->id, 'order' => 2]);
        Category::create(['name' => 'Gelées', 'slug' => 'chiens-gelées', 'parent_id' => $dogAlimentaire->id, 'order' => 3]);
        Category::create(['name' => 'Friandises', 'slug' => 'chiens-friandises', 'parent_id' => $dogAlimentaire->id, 'order' => 4]);

        $dogAccessoires = Category::create([
            'name' => 'Accessoires',
            'slug' => 'chiens-accessoires',
            'parent_id' => $dogs->id,
            'order' => 2,
        ]);

        Category::create(['name' => 'Dressage', 'slug' => 'dressage', 'parent_id' => $dogAccessoires->id, 'order' => 1]);
        Category::create(['name' => 'Distributeur et gamelle', 'slug' => 'distributeur-gamelle-chien', 'parent_id' => $dogAccessoires->id, 'order' => 2]);
        Category::create(['name' => 'Harnais et collier', 'slug' => 'harnais-collier-chien', 'parent_id' => $dogAccessoires->id, 'order' => 3]);
        Category::create(['name' => 'Jeux et Jouets', 'slug' => 'jeux-jouets', 'parent_id' => $dogAccessoires->id, 'order' => 4]);
        Category::create(['name' => 'Cage de transport', 'slug' => 'cage-transport-chien', 'parent_id' => $dogAccessoires->id, 'order' => 5]);
        Category::create(['name' => 'Coussin et couchage', 'slug' => 'coussin-chien', 'parent_id' => $dogAccessoires->id, 'order' => 6]);
        Category::create(['name' => 'Vêtements', 'slug' => 'vetements-chien', 'parent_id' => $dogAccessoires->id, 'order' => 7]);

        $dogSoin = Category::create([
            'name' => 'Soin et Toilettage',
            'slug' => 'chiens-soin',
            'parent_id' => $dogs->id,
            'order' => 3,
        ]);

        Category::create(['name' => 'Brosses et soins', 'slug' => 'brosses-chien', 'parent_id' => $dogSoin->id, 'order' => 1]);
        Category::create(['name' => 'Eau de cologne', 'slug' => 'eau-cologne', 'parent_id' => $dogSoin->id, 'order' => 2]);
        Category::create(['name' => 'Shampoings', 'slug' => 'shampoings-chien', 'parent_id' => $dogSoin->id, 'order' => 3]);

        // Sous-catégories pour Oiseaux
        $birdAlimentaire = Category::create([
            'name' => 'Alimentaire',
            'slug' => 'oiseaux-alimentaire',
            'parent_id' => $birds->id,
            'order' => 1,
        ]);

        Category::create(['name' => 'Compléments alimentaires', 'slug' => 'complements-oiseaux', 'parent_id' => $birdAlimentaire->id, 'order' => 1]);
        Category::create(['name' => 'Graines et autres', 'slug' => 'graines-oiseaux', 'parent_id' => $birdAlimentaire->id, 'order' => 2]);

        Category::create([
            'name' => 'Accessoires',
            'slug' => 'oiseaux-accessoires',
            'parent_id' => $birds->id,
            'order' => 2,
        ]);
    }
}
