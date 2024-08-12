<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catur x Aksamedia backend API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #555;
        }

        code {
            background: #eee;
            padding: 5px;
            border-radius: 3px;
        }

        .endpoint {
            background: #fff;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .endpoint p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="p-4">
            <h2 class="text-4xl font-bold dark:text-slate-50 mb-4">Hai Aksamedia 😀</h2>
            <p class="text-base dark:text-slate-50 max-w-md  mb-2">Juggling pains and dreams, I dance through the pages
                of life, aiming to turn every hurdle into a stepping stone.</p><a class="text-blue-500"
                href="carroo.me">carroo.me</a>
        </div>
        <h1>API Documentation</h1>


        <div class="endpoint">
            <h2>Login (POST)</h2>
            <p><strong>POST</strong> /login</p>
            <p>Request: <code>{ "username": "string", "password": "string" }</code></p>
            <p>Response: <code>json</code></p>
            <p>Authenticates the user and returns a token.</p>
        </div>

        <div class="endpoint">
            <h2>Logout</h2>
            <p><strong>POST</strong> /logout</p>
            <p>Middleware: <code>auth:sanctum</code></p>
            <p>Response: <code>json</code></p>
            <p>Logs out the user by invalidating the token.</p>
        </div>

        <div class="endpoint">
            <h2>Get Divisions</h2>
            <p><strong>GET</strong> /devisions</p>
            <p>Middleware: <code>auth:sanctum</code></p>
            <p>Params: <code>{"name": "pencarian nama"}</code></p>
            <p>Response: <code>json</code></p>
            <p>Returns a list of divisions.</p>
        </div>

        <div class="endpoint">
            <h2>Employees</h2>
            <p><strong>GET</strong> /employees</p>
            <p>Middleware: <code>auth:sanctum</code></p>
            <p>Params: <code>{"name": "pencarian nama","division_id": "filter berdasarkan divisi",}
                </code></p>
            <p>Response: <code>json</code></p>
            <p>Returns a list of employees.</p>
            <br>
            <p><strong>POST</strong> /employees</p>
            <p>Middleware: <code>auth:sanctum</code></p>
            <p>Request: <code>{ "name": "string", "phone": "string", "division_id": "integer", "position": "string"
                    }</code></p>
            <p>Response: <code>json</code></p>
            <p>Creates a new employee record.</p>
            <br>
            <p><strong>PUT/PATCH</strong> /employees/{id}</p>
            <p>Middleware: <code>auth:sanctum</code></p>
            <p>Request: <code>{ "name": "string", "phone": "string", "division_id": "integer", "position": "string"
                    }</code></p>
            <p>Response: <code>json</code></p>
            <p>Updates the employee record with the specified ID.</p>
            <br>
            <p><strong>DELETE</strong> /employees/{id}</p>
            <p>Middleware: <code>auth:sanctum</code></p>
            <p>Response: <code>json</code></p>
            <p>Deletes the employee record with the specified ID.</p>
        </div>
    </div>
</body>

</html>
