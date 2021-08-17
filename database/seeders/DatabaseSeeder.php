<?php

namespace Database\Seeders;

use App\Models\ProductColor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            UserRolesTableSeeder::class,
            PhotosTableSeeder::class,
            ProductsTableSeeder::class,
            BrandsTableSeeder::class,
            ProductCategoryTableSeeder::class,
            // ProductProductCategoriesTableSeeder::class,
            TagsTableSeeder::class,
            ProductSubcategoryTableSeeder::class,
            ProductSubcategoriesTableSeeder::class,
            // OrdersTableSeeder::class,
            // OrderdetailsTableSeeder::class,
            AddressesTableSeeder::class,
            // UsersAddressesTableSeeder::class,
            ProductColorsTableSeeder::class,
            ProductProductColorTableSeeder::class,
            PromosTableSeeder::class,
            ProductPromosTableSeeder::class,
            PostsTableSeeder::class,
            PostCategoriesTableSeeder::class,
            PermissionTableSeeder::class,
            NewslettersTableSeeder::class,
            FAQSTableSeeder::class,
            TestimonialsTableSeeder::class,
        ]);
    }
}
