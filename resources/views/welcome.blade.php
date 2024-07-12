<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevexHub CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-4">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="{{ route('index') }}""><h4 style="color:#1A374D;">DevexHub CMS</h4></a>
                <ul class="navbar-nav me-auto mb-2 px-5 mb-lg-0">
                    @foreach($pages as $page)
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="{{ route('page', ['slug' => $page->slug]) }}">{{ $page->title }}</a>
                    </li>
                    @endforeach
                </ul>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-light" style="background-color:#095075; text-decoration:none;">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn px-3 py-2 m-1 text-light" style="background-color:#095075; text-decoration:none;">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn px-3 py-2 m-1 text-light" style="background-color:#095075; text-decoration:none;">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
    <div class="container-fluid m-0 p-0">
        {!! $singlepage->htmlContent !!} <!-- Render HTML content from database -->
    </div>
    <style>{!! $singlepage->cssContent !!}</style>
      <script>
$(document).ready(function() {
    $('#ajaxForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response.message);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
});
</script>
</body>
</html>

