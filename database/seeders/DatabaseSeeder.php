<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        ## Check -> CategoryFactory
        Category::factory(20)->create(); ## count -> 100
    }
}
