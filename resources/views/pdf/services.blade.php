<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #0b0b0b; }
        h1 { color: #021869; }
        h2 { color: #021869; border-bottom: 1px solid #ddd; padding-bottom: 4px; }
        .service { margin-bottom: 16px; }
    </style>
</head>
<body>
    <h1>IXXI TECNOLOGÍA — Portafolio de servicios</h1>
    @foreach($services as $s)
        <div class="service">
            <h2>{{ $s->title }}</h2>
            @if($s->summary)<p><strong>{{ $s->summary }}</strong></p>@endif
            @if($s->description)<p>{!! nl2br(e($s->description)) !!}</p>@endif
        </div>
    @endforeach
</body>
</html>
