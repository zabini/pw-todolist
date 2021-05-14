<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->

    <title>to do list</title>

    <link rel="manifest" href="public/manifest.json" />

    <link rel="stylesheet" type="text/css" href="public/semantic/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="public/semantic/semantic.min.js"></script>
    <script src="public/scripts/task.js"></script>

    <style type="text/css">
        body {
            background-color: #FFFFFF;
        }

        body>.grid {
            height: 100%;
        }

        .image {
            margin-top: -100px;
        }

        .column {
            max-width: 450px;
        }
    </style>
</head>

<body>
    <button id="search">Search button</button>
    <div class="ui cards" id="tasks">
    </div>

</body>

</html>
