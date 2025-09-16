<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقرير طبي - Medical Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        .report-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #007bff;
            margin: 5px 0;
            font-size: 16px;
        }
        .patient-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }
        .test-section {
            margin-bottom: 25px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            overflow: hidden;
        }
        .test-section h3 {
            background: #007bff;
            color: white;
            margin: 0;
            padding: 10px 15px;
            font-size: 14px;
        }
        .test-table {
            width: 100%;
            border-collapse: collapse;
        }
        .test-table th,
        .test-table td {
            padding: 8px 12px;
            text-align: right;
            border-bottom: 1px solid #dee2e6;
            font-size: 12px;
        }
        .test-table th {
            background: #f8f9fa;
            font-weight: bold;
        }
        .test-table tr:last-child td {
            border-bottom: none;
        }
        .normal {
            color: #28a745;
            font-weight: bold;
        }
        .abnormal {
            color: #dc3545;
            font-weight: bold;
        }
        @media print {
            body { margin: 0; }
            .report-container {
                box-shadow: none;
                max-width: none;
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <div class="report-container">
        <!-- Header -->
        <div class="header">
            <h1>وزارة الدفــــــــــاع</h1>
            <h1>هـيـئــــة الإمــــداد والتـمـويــن الـقـــــوات الـمـسـلـحـــــة</h1>
            <h1>إدارة الـخـدمـــــات الـطـبـيـــــة الـقــــــوات الـمـسـلـحــــة</h1>
            <h1>المستشفى العسكري لضباط الصف بالقيادة الإستراتيجية</h1>
        </div>

        <!-- Patient Information -->
        <div class="patient-info">
            <div>
                <strong>اسم المريض:</strong> {{ $patient_name ?? '________________' }}
            </div>
            <div>
                <strong>السن:</strong> {{ $patient_age ?? '________________' }}
            </div>
            <div>
                <strong>التاريخ:</strong> {{ $report_date ?? '15/09/2025' }}
            </div>
            <div>
                <strong>الطبيب المعالج:</strong> {{ $doctor_name ?? 'الأستاذ الدكتور ________________' }}
            </div>
        </div>

        <!-- Liver Function Tests -->
        <div class="test-section">
            <h3>Liver Function Tests</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Reference Range</th>
                        <th>Unit</th>
                        <th>Result</th>
                        <th>Test</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N. (14 - 59)</td>
                        <td>U/L</td>
                        <td class="{{ isset($sgot_result) && ($sgot_result < 14 || $sgot_result > 59) ? 'abnormal' : 'normal' }}">
                            {{ $sgot_result ?? '____' }}
                        </td>
                        <td>S.G.O.T. (A.S.T.)</td>
                    </tr>
                    <tr>
                        <td>N. (14 - 59)</td>
                        <td>U/L</td>
                        <td class="{{ isset($sgpt_result) && ($sgpt_result < 14 || $sgpt_result > 59) ? 'abnormal' : 'normal' }}">
                            {{ $sgpt_result ?? '____' }}
                        </td>
                        <td>S.G.P.T. (A.L.T.)</td>
                    </tr>
                    <tr>
                        <td>N. (44-147)</td>
                        <td>Mg/dl</td>
                        <td class="{{ isset($alpk_result) && ($alpk_result < 44 || $alpk_result > 147) ? 'abnormal' : 'normal' }}">
                            {{ $alpk_result ?? '____' }}
                        </td>
                        <td>ALPK</td>
                    </tr>
                    <tr>
                        <td>N. (7-50)</td>
                        <td>U/L</td>
                        <td class="{{ isset($ggt_result) && ($ggt_result < 7 || $ggt_result > 50) ? 'abnormal' : 'normal' }}">
                            {{ $ggt_result ?? '____' }}
                        </td>
                        <td>GGT</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Kidney Function Tests -->
        <div class="test-section">
            <h3>Kidney Function Tests</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Reference Range</th>
                        <th>Unit</th>
                        <th>Result</th>
                        <th>Test</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N. (0.4 – 1.4)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($creatinine_result) && ($creatinine_result < 0.4 || $creatinine_result > 1.4) ? 'abnormal' : 'normal' }}">
                            {{ $creatinine_result ?? '____' }}
                        </td>
                        <td>S. Creatinine</td>
                    </tr>
                    <tr>
                        <td>N. (up to 45)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($urea_result) && $urea_result > 45 ? 'abnormal' : 'normal' }}">
                            {{ $urea_result ?? '____' }}
                        </td>
                        <td>Urea</td>
                    </tr>
                    <tr>
                        <td>N. (2.6 – 7.2)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($uric_acid_result) && ($uric_acid_result < 2.6 || $uric_acid_result > 7.2) ? 'abnormal' : 'normal' }}">
                            {{ $uric_acid_result ?? '____' }}
                        </td>
                        <td>Uric acid</td>
                    </tr>
                    <tr>
                        <td>N. (6.0 – 8.3)</td>
                        <td>g/dl</td>
                        <td class="{{ isset($tp_result) && ($tp_result < 6.0 || $tp_result > 8.3) ? 'abnormal' : 'normal' }}">
                            {{ $tp_result ?? '____' }}
                        </td>
                        <td>TP</td>
                    </tr>
                    <tr>
                        <td>N. (3.5-5)</td>
                        <td>g/dl</td>
                        <td class="{{ isset($alb_result) && ($alb_result < 3.5 || $alb_result > 5) ? 'abnormal' : 'normal' }}">
                            {{ $alb_result ?? '____' }}
                        </td>
                        <td>ALB</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Cardiac Enzymes -->
        <div class="test-section">
            <h3>Cardiac Enzymes</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Ref. Range</th>
                        <th>Unit</th>
                        <th>Patient Value</th>
                        <th>TEST</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N (0 – 16.0)</td>
                        <td>U/L</td>
                        <td class="{{ isset($ckmb_result) && ($ckmb_result < 0 || $ckmb_result > 16.0) ? 'abnormal' : 'normal' }}">
                            {{ $ckmb_result ?? '7.0' }}
                        </td>
                        <td>CKMB</td>
                    </tr>
                    <tr>
                        <td>N (30 – 170)</td>
                        <td>U/L</td>
                        <td class="{{ isset($ck_result) && ($ck_result < 30 || $ck_result > 170) ? 'abnormal' : 'normal' }}">
                            {{ $ck_result ?? '23' }}
                        </td>
                        <td>CK</td>
                    </tr>
                    <tr>
                        <td>NEGATIVE</td>
                        <td>-</td>
                        <td class="normal">{{ $troponin_result ?? 'NEGATIVE' }}</td>
                        <td>TROPONIN I</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Lipid Profile -->
        <div class="test-section">
            <h3>Lipid Profile</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Reference Range</th>
                        <th>Unit</th>
                        <th>Result</th>
                        <th>Test</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N (up to 150) / High: 200-400 / Very High: >500</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($triglycerides_result) && $triglycerides_result > 150 ? 'abnormal' : 'normal' }}">
                            {{ $triglycerides_result ?? '____' }}
                        </td>
                        <td>S. Triglycerides</td>
                    </tr>
                    <tr>
                        <td>N (up to 200)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($cholesterol_result) && $cholesterol_result > 200 ? 'abnormal' : 'normal' }}">
                            {{ $cholesterol_result ?? '____' }}
                        </td>
                        <td>S. Cholesterol</td>
                    </tr>
                    <tr>
                        <td>N (40-60)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($hdl_result) && ($hdl_result < 40 || $hdl_result > 60) ? 'abnormal' : 'normal' }}">
                            {{ $hdl_result ?? '____' }}
                        </td>
                        <td>HDL</td>
                    </tr>
                    <tr>
                        <td>N (0-100)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($ldl_result) && $ldl_result > 100 ? 'abnormal' : 'normal' }}">
                            {{ $ldl_result ?? '____' }}
                        </td>
                        <td>LDL</td>
                    </tr>
                    <tr>
                        <td>N (140-280)</td>
                        <td>U/L</td>
                        <td class="{{ isset($ldh_result) && ($ldh_result < 140 || $ldh_result > 280) ? 'abnormal' : 'normal' }}">
                            {{ $ldh_result ?? '____' }}
                        </td>
                        <td>LDH</td>
                    </tr>
                    <tr>
                        <td>N (5-30)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($vldl_result) && ($vldl_result < 5 || $vldl_result > 30) ? 'abnormal' : 'normal' }}">
                            {{ $vldl_result ?? '____' }}
                        </td>
                        <td>VLDL</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Electrolytes -->
        <div class="test-section">
            <h3>Electrolytes</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Reference Range</th>
                        <th>Unit</th>
                        <th>Result</th>
                        <th>Test</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N (135-140)</td>
                        <td>Mmol/L</td>
                        <td class="{{ isset($na_result) && ($na_result < 135 || $na_result > 140) ? 'abnormal' : 'normal' }}">
                            {{ $na_result ?? '____' }}
                        </td>
                        <td>NA+</td>
                    </tr>
                    <tr>
                        <td>N (3.5-5)</td>
                        <td>Mmol/L</td>
                        <td class="{{ isset($k_result) && ($k_result < 3.5 || $k_result > 5) ? 'abnormal' : 'normal' }}">
                            {{ $k_result ?? '____' }}
                        </td>
                        <td>K+</td>
                    </tr>
                    <tr>
                        <td>N (8.1 – 10.4)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($ca_total_result) && ($ca_total_result < 8.1 || $ca_total_result > 10.4) ? 'abnormal' : 'normal' }}">
                            {{ $ca_total_result ?? '____' }}
                        </td>
                        <td>CA total</td>
                    </tr>
                    <tr>
                        <td>N (1.16-1.31)</td>
                        <td>Mmol/L</td>
                        <td class="{{ isset($ca_ion_result) && ($ca_ion_result < 1.16 || $ca_ion_result > 1.31) ? 'abnormal' : 'normal' }}">
                            {{ $ca_ion_result ?? '____' }}
                        </td>
                        <td>CA++</td>
                    </tr>
                    <tr>
                        <td>N (65-176)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($fe_result) && ($fe_result < 65 || $fe_result > 176) ? 'abnormal' : 'normal' }}">
                            {{ $fe_result ?? '____' }}
                        </td>
                        <td>Fe</td>
                    </tr>
                    <tr>
                        <td>N (2.5-4.0)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($phos_result) && ($phos_result < 2.5 || $phos_result > 4.0) ? 'abnormal' : 'normal' }}">
                            {{ $phos_result ?? '____' }}
                        </td>
                        <td>Phos</td>
                    </tr>
                    <tr>
                        <td>N (1.7-2.2)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($mg_result) && ($mg_result < 1.7 || $mg_result > 2.2) ? 'abnormal' : 'normal' }}">
                            {{ $mg_result ?? '____' }}
                        </td>
                        <td>MG</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Blood Sugar Level -->
        <div class="test-section">
            <h3>Blood Sugar Level</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Ref. Range</th>
                        <th>Unit</th>
                        <th>Patient Value</th>
                        <th>TEST</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N (60 – 160)</td>
                        <td>mg/dl</td>
                        <td class="{{ isset($blood_sugar_result) && ($blood_sugar_result < 60 || $blood_sugar_result > 160) ? 'abnormal' : 'normal' }}">
                            {{ $blood_sugar_result ?? '____' }}
                        </td>
                        <td>Blood Sugar</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Hepatitis Markers -->
        <div class="test-section">
            <h3>Hepatitis Markers</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Ref - Range</th>
                        <th>Patient - Value</th>
                        <th>TEST</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Negative</td>
                        <td class="normal">{{ $hcv_result ?? 'Negative' }}</td>
                        <td>HCV - (IgG)</td>
                    </tr>
                    <tr>
                        <td>Negative</td>
                        <td class="normal">{{ $hbs_result ?? 'Negative' }}</td>
                        <td>HBS - Ag</td>
                    </tr>
                    <tr>
                        <td>Negative</td>
                        <td class="normal">{{ $hiv_result ?? 'Negative' }}</td>
                        <td>HIV</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Coagulation Profile -->
        <div class="test-section">
            <h3>Co-agulation Profile</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Ref - Range</th>
                        <th>Unit</th>
                        <th>Patient - Value</th>
                        <th>TEST</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N (11.5 – 14)</td>
                        <td>Sec</td>
                        <td class="{{ isset($pt_patient_result) && ($pt_patient_result < 11.5 || $pt_patient_result > 14) ? 'abnormal' : 'normal' }}">
                            {{ $pt_patient_result ?? '13.2' }}
                        </td>
                        <td>Patient Prothrombin Time</td>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>Sec</td>
                        <td>{{ $pt_control_result ?? '12.0' }}</td>
                        <td>Control Prothrombin Time</td>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>%</td>
                        <td>{{ $pt_concentration_result ?? '78.8' }}</td>
                        <td>Patient Prothrombin Concentration</td>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>{{ $inr_result ?? '1.16' }}</td>
                        <td>I.N.R</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
