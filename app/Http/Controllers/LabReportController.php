<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class LabReportController extends Controller
{
    public function urineAnalysis()
    {
        // $data = [
        //     'quantity' => 'Random Sample',
        //     'colour' => 'Yellow',
        //     'aspect' => 'Clear',
        //     'reaction' => 'Acidic',
        //     'albumin' => 'Absent',
        //     'acetone' => 'Absent',
        //     'sugar' => 'Absent',
        //     'bile_salts' => 'Absent',
        //     'blood' => 'Absent',
        //     'pus_cells' => '1-3',
        //     'rbcs' => '3-5',
        //     'crystals' => 'Absent',
        //     'bacteria' => 'Absent',
        //     'patient_name' => 'Mohamed Saad',
        //     'age' => '25',
        //     'doctor' => 'Dr. Ahmed Ali',
        //     'date' => now()->format('d/m/Y'),
        // ];
        $data = [
            // Patient Information
            'patient_name' => 'محمد سعد',
            'patient_age' => '25',
            'doctor_name' => 'الأستاذ الدكتور أحمد علي',
            'report_date' => '15/09/2025',

            // Physical Examinations
            'quantity' => 'Random Sample',
            'colour' => 'Yellow',
            'aspect' => 'Clear',
            'reaction' => 'Acidic',

            // Chemical Examinations
            'albumin' => 'Absent',
            'bilirubin' => 'Absent',
            'acetone' => 'Absent',
            'urobilinogen' => 'Absent',
            'sugar' => 'Absent',
            'nitrites' => 'Absent',
            'bile_salts' => 'Absent',
            'specific_gravity' => '1.000',
            'blood' => 'Absent',
            'leukocytes' => 'Absent',

            // Microscopic Examination
            'pus_cells' => '1-3',
            'rbcs' => '3-5',
            'crystals' => 'Absent',
            'amorphus' => 'Urate(+)',
            'casts' => 'Absent',
            'epithelial_cells' => 'Absent',
            'bacteria' => 'Absent',
            'yeast_cells' => 'Absent',
        ];

        $pdf = Pdf::loadView('first', $data);

        return $pdf->stream('urine_analysis.pdf');
    }

    public function labTests()
    {
        // $data = [
        //     'sgot' => '32',
        //     'sgpt' => '28',
        //     'alpk' => '100',
        //     'ggt' => '22',
        //     'creatinine' => '0.9',
        //     'urea' => '35',
        //     'uric_acid' => '5.2',
        //     'tp' => '7.0',
        //     'alb' => '4.2',
        //     'ckmb' => '7.0',
        //     'ck' => '23',
        //     'troponin' => 'Negative',
        //     'triglycerides' => '120',
        //     'cholesterol' => '180',
        //     'hdl' => '55',
        //     'ldl' => '80',
        //     'ldh' => '200',
        //     'vldl' => '20',
        //     'na' => '138',
        //     'k' => '4.1',
        //     'ca_total' => '9.3',
        //     'ca_double' => '1.2',
        //     'fe' => '110',
        //     'phos' => '3.5',
        //     'mg' => '2.0',
        //     'blood_sugar' => '95',
        //     'pt_patient' => '13.2',
        //     'pt_control' => '12.0',
        //     'pt_concentration' => '78.8',
        //     'inr' => '1.16',
        //     'patient_name' => 'Mohamed Saad',
        //     'age' => '25',
        //     'doctor' => 'Dr. Ahmed Ali',
        //     'date' => now()->format('d/m/Y'),
        // ];
        $data = [
            // Patient Information
            'patient_name' => 'محمد سعد',
            'patient_age' => '25',
            'doctor_name' => 'الأستاذ الدكتور أحمد علي',
            'report_date' => '15/09/2025',

            // Liver Function Tests
            'sgot_result' => 32,
            'sgpt_result' => 28,
            'alpk_result' => 100,
            'ggt_result' => 22,

            // Kidney Function Tests
            'creatinine_result' => 0.9,
            'urea_result' => 35,
            'uric_acid_result' => 5.2,
            'tp_result' => 7.0,
            'alb_result' => 4.2,

            // Cardiac Enzymes
            'ckmb_result' => 7.0,
            'ck_result' => 23,
            'troponin_result' => 'NEGATIVE',

            // Lipid Profile
            'triglycerides_result' => 120,
            'cholesterol_result' => 180,
            'hdl_result' => 55,
            'ldl_result' => 80,
            'ldh_result' => 200,
            'vldl_result' => 20,

            // Electrolytes
            'na_result' => 138,
            'k_result' => 4.1,
            'ca_total_result' => 9.3,
            'ca_ion_result' => 1.2,
            'fe_result' => 110,
            'phos_result' => 3.5,
            'mg_result' => 2.0,

            // Blood Sugar
            'blood_sugar_result' => 95,

            // Hepatitis Markers
            'hcv_result' => 'Negative',
            'hbs_result' => 'Negative',
            'hiv_result' => 'Negative',

            // Coagulation Profile
            'pt_patient_result' => 13.2,
            'pt_control_result' => 12.0,
            'pt_concentration_result' => 78.8,
            'inr_result' => 1.16,
        ];

        $pdf = Pdf::loadView('lab_tests', $data);

        return $pdf->stream('lab_tests.pdf');
    }

    public function showUrineAnalysis()
    {
        $data = [
            // Patient Information
            'patient_name' => 'محمد سعد',
            'age' => '25',
            'doctor' => 'الأستاذ الدكتور أحمد علي',
            'date' => '15/09/2025',

            // Physical Examinations
            'quantity' => 'Random Sample',
            'colour' => 'Yellow',
            'aspect' => 'Clear',
            'reaction' => 'Acidic',

            // Chemical Examinations
            'albumin' => 'Absent',
            'bilirubin' => 'Absent',
            'acetone' => 'Absent',
            'urobilinogen' => 'Absent',
            'sugar' => 'Absent',
            'nitrites' => 'Absent',
            'bile_salts' => 'Absent',
            'specific_gravity' => '1.000',
            'blood' => 'Absent',
            'leukocytes' => 'Absent',

            // Microscopic Examination
            'pus_cells' => '1-3',
            'rbcs' => '3-5',
            'crystals' => 'Absent',
            'amorphus' => 'Urate(+)',
            'casts' => 'Absent',
            'epithelial_cells' => 'Absent',
            'bacteria' => 'Absent',
            'yeast_cells' => 'Absent',
        ];

        return view('urine_analysis', $data);
    }
}
