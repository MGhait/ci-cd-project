<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laboratory Report</title>
    <style>
        body { font-family: Verdana, Geneva, Tahoma, sans-serif; margin: 30px; }
        .header { text-align: center; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; font-size: 14px; }
        .footer { margin-top: 40px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="header">
        <h3>وزارة الدفاع - القوات المسلحة<br>إدارة الخدمات الطبية<br>المستشفى العسكري</h3>
        <h2>Laboratory Tests Report</h2>
    </div>

    <h4>Liver Function Tests</h4>
    <table>
        <tr><th>Test</th><th>Result</th><th>Reference Range</th></tr>
        <tr><td>S.G.O.T. (AST)</td><td>{{ $sgot }}</td><td>14 - 59 U/L</td></tr>
        <tr><td>S.G.P.T. (ALT)</td><td>{{ $sgpt }}</td><td>14 - 59 U/L</td></tr>
        <tr><td>ALPK</td><td>{{ $alpk }}</td><td>44 - 147 Mg/dl</td></tr>
        <tr><td>GGT</td><td>{{ $ggt }}</td><td>7 - 50 U/L</td></tr>
    </table>

    <h4>Kidney Function Tests</h4>
    <table>
        <tr><td>S. Creatinine</td><td>{{ $creatinine }}</td><td>0.4 – 1.4 mg/dl</td></tr>
        <tr><td>Urea</td><td>{{ $urea }}</td><td>Up to 45 mg/dl</td></tr>
        <tr><td>Uric acid</td><td>{{ $uric_acid }}</td><td>2.6 – 7.2 mg/dl</td></tr>
        <tr><td>TP</td><td>{{ $tp }}</td><td>6.0 – 8.3 g/dl</td></tr>
        <tr><td>ALB</td><td>{{ $alb }}</td><td>3.5 – 5 g/dl</td></tr>
    </table>

    <h4>Cardiac Enzymes</h4>
    <table>
        <tr><td>CKMB</td><td>{{ $ckmb }}</td><td>0 – 16 U/L</td></tr>
        <tr><td>CK</td><td>{{ $ck }}</td><td>30 – 170 U/L</td></tr>
        <tr><td>Troponin I</td><td>{{ $troponin }}</td><td>Negative</td></tr>
    </table>

    <h4>Lipid Profile</h4>
    <table>
        <tr><td>Triglycerides</td><td>{{ $triglycerides }}</td><td>Up to 150 mg/dl</td></tr>
        <tr><td>Cholesterol</td><td>{{ $cholesterol }}</td><td>Up to 200 mg/dl</td></tr>
        <tr><td>HDL</td><td>{{ $hdl }}</td><td>40 – 60 mg/dl</td></tr>
        <tr><td>LDL</td><td>{{ $ldl }}</td><td>0 – 100 mg/dl</td></tr>
        <tr><td>LDH</td><td>{{ $ldh }}</td><td>140 – 280 U/L</td></tr>
        <tr><td>VLDL</td><td>{{ $vldl }}</td><td>5 – 30 mg/dl</td></tr>
    </table>

    <h4>Electrolytes</h4>
    <table>
        <tr><td>NA+</td><td>{{ $na }}</td><td>135 – 140 mmol/L</td></tr>
        <tr><td>K+</td><td>{{ $k }}</td><td>3.5 – 5 mmol/L</td></tr>
        <tr><td>Ca Total</td><td>{{ $ca_total }}</td><td>8.1 – 10.4 mg/dl</td></tr>
        <tr><td>Ca++</td><td>{{ $ca_double }}</td><td>1.16 – 1.31 mmol/L</td></tr>
        <tr><td>Fe</td><td>{{ $fe }}</td><td>65 – 176 mg/dl</td></tr>
        <tr><td>Phos</td><td>{{ $phos }}</td><td>2.5 – 4.0 mg/dl</td></tr>
        <tr><td>Mg</td><td>{{ $mg }}</td><td>1.7 – 2.2 mg/dl</td></tr>
    </table>

    <h4>Blood Sugar</h4>
    <table>
        <tr><td>Blood Sugar</td><td>{{ $blood_sugar }}</td><td>60 – 160 mg/dl</td></tr>
    </table>

    <h4>Coagulation Profile</h4>
    <table>
        <tr><td>Prothrombin Time (Patient)</td><td>{{ $pt_patient }}</td><td>11.5 – 14 Sec</td></tr>
        <tr><td>Prothrombin Time (Control)</td><td>{{ $pt_control }}</td><td>Normal ~ 12 Sec</td></tr>
        <tr><td>Prothrombin Concentration</td><td>{{ $pt_concentration }}</td><td>%</td></tr>
        <tr><td>I.N.R</td><td>{{ $inr }}</td><td>~1.0</td></tr>
    </table>

    <div class="footer">
        <p>اسم المريض: {{ $patient_name }}</p>
        <p>السن: {{ $age }}</p>
        <p>الطبيب المعالج: {{ $doctor }}</p>
        <p>التاريخ: {{ $date }}</p>
    </div>
</body>
</html>
