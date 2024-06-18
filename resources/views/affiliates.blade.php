<!DOCTYPE html>
<html>
<head>
    <title>Nearby Affiliates</title>
</head>
<body>
<h1>Nearby Affiliates within 100km of Dublin</h1>
<ul>
    @foreach ($affiliates as $affiliate)
        <li>{{ $affiliate['name'] }} (ID: {{ $affiliate['affiliate_id'] }})</li>
    @endforeach
</ul>
</body>
</html>
