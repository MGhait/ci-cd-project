<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Certificate</title>
    <style>
        body {
            text-align: center;
            font-family: 'DejaVu Sans', sans-serif;
            background: #fdfdfd;
        }
        .certificate {
            border: 10px solid #000;
            padding: 50px;
            margin: 20px;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        h2, h3 {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<div class="certificate">
    <h1>Certificate of Completion</h1>
    <p>This certifies that</p>
    <h2>{{ $user }}</h2>
{{--    <h2>{{ $user->name }}</h2>--}}
    <p>has successfully completed</p>
{{--    <h3>{{ $course->title }}</h3>--}}
    <h3>{{ $course }}</h3>
    <p>on {{ $date }}</p>
</div>
</body>
</html>
