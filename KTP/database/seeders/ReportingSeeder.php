<?php

namespace Database\Seeders;

use App\Models\ExplanationType;
use App\Models\ReportingType;
use App\Models\SubmissionType;
use Illuminate\Database\Seeder;

class ReportingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reporting types
        $reporting_types = ['Dalam daerah', 'Luar Daerah'];
        $explanation_types = ['Online', 'Dinas', 'Kelurahan', 'MMP'];
        $submission_types = ['Rusak', 'Hilang', 'Pemula', 'Perubahan Data', 'Paket', 'Surat Keterangan'];

        $seeder = ['App\Models\ReportingType' => $reporting_types, 'App\Models\ExplanationType' => $explanation_types, 'App\Models\SubmissionType' => $submission_types];

        foreach ($seeder as $key => $value) {
            $model = app($key);
            foreach ($value as $x => $valuex) {
                $model->create(['name' => $valuex]);
            }
        }
    }
}
