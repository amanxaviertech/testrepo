<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title }}</title>
    <style>
        /* Define your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
/*            padding: 20px;*/
        }
        .container {
/*            max-width: 800px;*/
            width: 100%;
/*            margin: 0 auto;*/
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
/*            padding: 20px;*/
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        {!! $page->htmlContent !!} <!-- Render HTML content from database -->
    </div>
    <style>{!! $page->cssContent !!}</style> <!-- Render CSS content from database -->
</body>
</html>
