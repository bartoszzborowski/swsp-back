<?php

use App\Models\School;
use Illuminate\Database\Seeder;

class BaseSchoolStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $primarySchool = factory(School::class);
    }
}
