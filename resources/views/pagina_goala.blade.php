<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina principala de admin</title>
    <style>
        /* Stilizare pentru meniu */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333; /* Culoare de fundal a meniului */
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        li a:hover {
            background-color: #555; /* Culoare de fundal la hover */
        }

        /* Stilizare pentru conținut */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<!-- Meniu orizontal -->
<ul>
    <li><a href="{{ route('sponsori.index') }}">Sponsori</a></li>
    <li><a href="{{ route('speakeri.index') }}">Speakeri</a></li>
    <li><a href="{{ route('parteneri.index') }}">Parteneri</a></li>
    <li><a href="{{ route('evenimente.index') }}">Evenimente</a></li>
    <li><a href="{{ route('bilete.index') }}">Bilete</a></li>
    <li><a href="{{ route('agende.index') }}">Agende</a></li>
</ul>

<!-- Conținutul paginii -->
<h1>Bine ai venit Administratorule!</h1>

</body>
</html>
