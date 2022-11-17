<?php

namespace Database\Seeders;

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
        $this->call([
            CkpiAppsTableSeeder::class,
            CkpiAssigneesTableSeeder::class,
            CkpiFilesTableSeeder::class,
            CkpiGlsTableSeeder::class,
            CkpiGroupsTableSeeder::class,
            CkpiIlsTableSeeder::class,
            CkpiIndicatorsTableSeeder::class,
            CkpiPerspectivesTableSeeder::class,
            CkpiPlsTableSeeder::class,
            CkpiQlsTableSeeder::class,
            CkpiRemindersTableSeeder::class,
            CkpiSettingsTableSeeder::class,
            CkpiTlAppsTableSeeder::class,
            CkpiTlValuesTableSeeder::class,
            LifexcessTableSeeder::class,
            RemarksTableSeeder::class,
            TasksTableSeeder::class,
            Tasks2TableSeeder::class,
            Tasks3TableSeeder::class,
            UsersTableSeeder::class,
            YearsTableSeeder::class,
            AddApproverToCkpiAssigneesTableSeeder::class,
            ]
        );
    }
}
