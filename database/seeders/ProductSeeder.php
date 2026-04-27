<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'ROYAL PAWS Premium Dog Food',
                'description' => 'Savory Chicken, Brown Rice & Sweet Potato. Healthy Hips & Joints. 100% Complete & Balanced.',
                'price' => 34.99,
                'quantity' => 50,
                'category' => 'dog',
                'image' => '/images/hero.png', // Fallback image since generated images failed
            ],
            [
                'name' => 'ROYAL PAWS Premium Cat Food',
                'description' => 'Wild-Caught Salmon, Whole Grains & Taurine. Healthy Skin & Coat.',
                'price' => 29.99,
                'quantity' => 50,
                'category' => 'cat',
                'image' => '/images/hero.png', 
            ],
            [
                'name' => 'ROYAL PAWS All Natural Chicken Treats',
                'description' => 'All natural chicken treats for dogs. Perfect for training and rewarding.',
                'price' => 14.99,
                'quantity' => 100,
                'category' => 'dog',
                'image' => '/images/hero.png', 
            ],
            [
                'name' => 'ROYAL PAWS Hip & Joint Support',
                'description' => 'Strong support with Glucosamine & Chondroitin for healthy joints and mobility.',
                'price' => 24.99,
                'quantity' => 75,
                'category' => 'dog',
                'subcategory' => 'Supplements',
                'image' => '/images/hero.png', 
            ],
        ];

        foreach ($products as $product) {
            // Assigner une catégorie aléatoire si category_id n'est pas défini
            if (!isset($product['category_id'])) {
                $category = \App\Models\Category::where('slug', 'like', '%' . strtolower($product['category']) . '%')->first();
                if ($category) {
                    $product['category_id'] = $category->id;
                }
            }
            Product::create($product);
        }
    }
}
