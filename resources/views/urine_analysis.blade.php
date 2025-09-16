<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>تحليل بول</title>
    <style>
        @font-face {
            font-family: 'arabic';
            src: url("{{ public_path('fonts/Amiri-Regular.ttf') }}") format('truetype');
        }
        body {
            font-family: 'arabic', DejaVu Sans, sans-serif;
            direction: rtl;
            text-align: right;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        h2 {
            text-align: center;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 14px;
        }
        .footer {
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <p>وزارة الدفاع - القوات المسلحة</p>
        <p>إدارة الخدمات الطبية</p>
        <p>المستشفى العسكري</p>
    </div>

    <h2>تحليل بول (URINE ANALYSIS)</h2>

    <h4>الفحص الظاهري</h4>
    <table>
        <tr><th>الاختبار</th><th>النتيجة</th><th>القيمة المرجعية</th></tr>
        <tr><td>الكمية</td><td>{{ $quantity }}</td><td>عينة عشوائية</td></tr>
        <tr><td>اللون</td><td>{{ $colour }}</td><td>أصفر</td></tr>
        <tr><td>المظهر</td><td>{{ $aspect }}</td><td>صافي</td></tr>
        <tr><td>التفاعل</td><td>{{ $reaction }}</td><td>حمضي</td></tr>
    </table>

    <h4>الفحوص الكيميائية</h4>
    <table>
        <tr><td>الألبومين</td><td>{{ $albumin }}</td><td>غير موجود</td></tr>
        <tr><td>الأسيتون</td><td>{{ $acetone }}</td><td>غير موجود</td></tr>
        <tr><td>السكر</td><td>{{ $sugar }}</td><td>غير موجود</td></tr>
        <tr><td>أملاح الصفراء</td><td>{{ $bile_salts }}</td><td>غير موجود</td></tr>
        <tr><td>الدم</td><td>{{ $blood }}</td><td>غير موجود</td></tr>
    </table>

    <h4>الفحص المجهري</h4>
    <table>
        <tr><td>خلايا صديد</td><td>{{ $pus_cells }}</td><td>0 – 5 / HPF</td></tr>
        <tr><td>كرات دم حمراء</td><td>{{ $rbcs }}</td><td>0 – 5 / HPF</td></tr>
        <tr><td>بلورات</td><td>{{ $crystals }}</td><td>غير موجود</td></tr>
        <tr><td>بكتيريا</td><td>{{ $bacteria }}</td><td>غير موجود</td></tr>
    </table>

    <div class="footer">
        <p>اسم المريض: {{ $patient_name }}</p>
        <p>السن: {{ $age }}</p>
        <p>الطبيب المعالج: {{ $doctor }}</p>
        <p>التاريخ: {{ $date }}</p>
    </div>
</body>
</html>
