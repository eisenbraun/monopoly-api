<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monopoly API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4 pt-3">Monopoly</h1>
                <p>Get information about the popular board game.</p>

                <h2 class="display-6">HTTP Request</h2>
                <p><code>GET http://monopoly.zoodinkers.com/api/properties</code></p>
                <p><em>Properties are returned 5 at a time</em></p>

                <h2 class="display-6">Example Queries</h2>
                <ul class="list-unstyled">
                  <li>GET <a href="/api/properties">/api/properties</a></li>
                  <li>GET <a href="/api/properties?offset=5">/api/properties?offset=5</a></li>
                  <li>GET <a href="/api/properties/boardwalk">/api/properties/boardwalk</a></li>
                </ul>
            </div>
        </div>
    </main>
    <footer class="container mt-5">
        <div class="row">
            <div class="col">
                <p>
                <small>API by <a href="https://michaeleisenbraun.com/" target="_blank">Michael Eisenbraun</a><br>
                This site is not endorsed by or affiliated with Hasbro.</small>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
