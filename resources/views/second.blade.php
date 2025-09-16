<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحليل البول - Urine Analysis</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
            line-height: 1.6;
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
        .header h2 {
            color: #28a745;
            margin: 20px 0 10px 0;
            font-size: 18px;
            font-weight: bold;
        }
        .patient-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            flex-wrap: wrap;
        }
        .patient-info div {
            margin: 5px 0;
            min-width: 200px;
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
            padding: 12px 15px;
            font-size: 16px;
        }
        .test-table {
            width: 100%;
            border-collapse: collapse;
        }
        .test-table th,
        .test-table td {
            padding: 10px 12px;
            text-align: right;
            border-bottom: 1px solid #dee2e6;
            font-size: 13px;
        }
        .test-table th {
            background: #f8f9fa;
            font-weight: bold;
            color: #495057;
        }
        .test-table tr:last-child td {
            border-bottom: none;
        }
        .test-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .normal {
            color: #28a745;
            font-weight: bold;
        }
        .abnormal {
            color: #dc3545;
            font-weight: bold;
        }
        .warning {
            color: #ffc107;
            font-weight: bold;
        }
        .result-column {
            background: #e3f2fd !important;
            font-weight: bold;
        }
        @media print {
            body {
                margin: 0;
                background-color: white;
            }
            .report-container {
                box-shadow: none;
                max-width: none;
                margin: 0;
                padding: 20px;
            }
        }
        @media (max-width: 768px) {
            .patient-info {
                flex-direction: column;
            }
            .patient-info div {
                min-width: auto;
                margin: 3px 0;
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
            <h1>المستشفى العسكري لضباط الصف بالكبان العسكري</h1>
            <h2>URINE ANALYSIS</h2>
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

        <!-- Physical Examinations -->
        <div class="test-section">
            <h3>Physical Examinations</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 30%;">Test</th>
                        <th style="width: 35%;">Result</th>
                        <th style="width: 35%;">Ref – Range</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Quantity</strong></td>
                        <td class="result-column">{{ $quantity ?? 'Random Sample' }}</td>
                        <td>Random Sample</td>
                    </tr>
                    <tr>
                        <td><strong>Colour</strong></td>
                        <td class="result-column {{ ($colour ?? 'Yellow') == 'Yellow' ? 'normal' : 'abnormal' }}">
                            {{ $colour ?? 'Yellow' }}
                        </td>
                        <td>Yellow</td>
                    </tr>
                    <tr>
                        <td><strong>Aspect</strong></td>
                        <td class="result-column {{ ($aspect ?? 'Clear') == 'Clear' ? 'normal' : 'abnormal' }}">
                            {{ $aspect ?? 'Clear' }}
                        </td>
                        <td>Clear</td>
                    </tr>
                    <tr>
                        <td><strong>Reaction</strong></td>
                        <td class="result-column {{ ($reaction ?? 'Acidic') == 'Acidic' ? 'normal' : 'warning' }}">
                            {{ $reaction ?? 'Acidic' }}
                        </td>
                        <td>Acidic</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Chemical Examinations -->
        <div class="test-section">
            <h3>Chemical Examinations</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 30%;">Test</th>
                        <th style="width: 35%;">Result</th>
                        <th style="width: 35%;">Ref – Range</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Albumin</strong></td>
                        <td class="result-column {{ ($albumin ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $albumin ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Bilirubin</strong></td>
                        <td class="result-column {{ ($bilirubin ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $bilirubin ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Acetone</strong></td>
                        <td class="result-column {{ ($acetone ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $acetone ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Urobilinogen</strong></td>
                        <td class="result-column {{ ($urobilinogen ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $urobilinogen ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Sugar</strong></td>
                        <td class="result-column {{ ($sugar ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $sugar ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Nitrites</strong></td>
                        <td class="result-column {{ ($nitrites ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $nitrites ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Bile salts</strong></td>
                        <td class="result-column {{ ($bile_salts ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $bile_salts ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Specific Gravity</strong></td>
                        <td class="result-column">{{ $specific_gravity ?? '1.000' }}</td>
                        <td>1.000 - 1.030</td>
                    </tr>
                    <tr>
                        <td><strong>Blood</strong></td>
                        <td class="result-column {{ ($blood ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $blood ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Leukocytes</strong></td>
                        <td class="result-column {{ ($leukocytes ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $leukocytes ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Microscopic Examination -->
        <div class="test-section">
            <h3>Microscopic Examination</h3>
            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 30%;">Test</th>
                        <th style="width: 35%;">Result</th>
                        <th style="width: 35%;">Reference Range</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Pus cells</strong></td>
                        <td class="result-column {{
                            isset($pus_cells) && !in_array($pus_cells, ['0-1', '1-2', '1-3', '2-3', '0-3']) ? 'abnormal' : 'normal'
                        }}">
                            {{ $pus_cells ?? '1-3' }}
                        </td>
                        <td>N (0 – 5) / H.P.F</td>
                    </tr>
                    <tr>
                        <td><strong>R.B.Cs</strong></td>
                        <td class="result-column {{
                            isset($rbcs) && !in_array($rbcs, ['0-1', '1-2', '1-3', '2-3', '3-4', '3-5', '4-5', '0-3', '0-5']) ? 'abnormal' : 'normal'
                        }}">
                            {{ $rbcs ?? '3-5' }}
                        </td>
                        <td>N (0 – 5) / H.P.F</td>
                    </tr>
                    <tr>
                        <td><strong>Crystals</strong></td>
                        <td class="result-column {{ ($crystals ?? 'Absent') == 'Absent' ? 'normal' : 'warning' }}">
                            {{ $crystals ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Amorphus</strong></td>
                        <td class="result-column {{
                            ($amorphus ?? 'Urate(+)') == 'Absent' ? 'normal' : 'warning'
                        }}">
                            {{ $amorphus ?? 'Urate(+)' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Casts</strong></td>
                        <td class="result-column {{ ($casts ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $casts ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Epithelial cells</strong></td>
                        <td class="result-column {{ ($epithelial_cells ?? 'Absent') == 'Absent' ? 'normal' : 'warning' }}">
                            {{ $epithelial_cells ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Bacteria</strong></td>
                        <td class="result-column {{ ($bacteria ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $bacteria ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                    <tr>
                        <td><strong>Yeast cells</strong></td>
                        <td class="result-column {{ ($yeast_cells ?? 'Absent') == 'Absent' ? 'normal' : 'abnormal' }}">
                            {{ $yeast_cells ?? 'Absent' }}
                        </td>
                        <td>Absent</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer Note -->
        <div style="margin-top: 30px; padding: 15px; background: #e9ecef; border-radius: 5px; font-size: 12px; text-align: center; color: #6c757d;">
            <p><strong>Note:</strong> This report contains the results of urine analysis performed on the specified date.
            Please consult with your healthcare provider for proper interpretation of these results.</p>
            <p><strong>ملاحظة:</strong> يحتوي هذا التقرير على نتائج تحليل البول المُجرى في التاريخ المحدد.
            يُرجى استشارة طبيبك المعالج للتفسير السليم لهذه النتائج.</p>
        </div>
    </div>
</body>
</html>
