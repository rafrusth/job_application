<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Generated CV</title>
    <style>
        body { font-family: 'DM Sans', sans-serif; line-height: 1.6; margin: 2rem; }
        .cv-container { white-space: pre-wrap; background: #f9f9f9; padding: 2rem; border: 1px solid #ddd; border-radius: 8px; }
        .btn { display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-top: 1rem; }
    </style>
</head>
<body>

    <h1>Your Generated CV</h1>

    @if(session('error'))
        <div style="color: red; margin-bottom: 1rem;">
            {{ session('error') }}
        </div>
    @endif

    <div class="cv-container">{{ $cvContent ?? '' }}</div>

    <a href="{{ route('cv.answers') }}" class="btn">Generate Another</a>

</body>
</html>
