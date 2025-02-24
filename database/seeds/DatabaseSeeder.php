<?php

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
        $this->call(AdminTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SoftwareTableSeeder::class);
        $this->call(ToursTableSeeder::class);
        $this->call(VenuesTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(TrainerApplicationsTableSeeder::class);
        $this->call(DownloadsTableSeeder::class);
        $this->call(EnquiriesTableSeeder::class);
        $this->call(ReferralsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(TrainerIssuesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(ApprovedAuthoritiesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(VirtualVenuesTableSeeder::class);
    }
}
