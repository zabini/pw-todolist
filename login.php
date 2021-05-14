<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->

    <title>Login - to do list</title>

    <link rel="manifest" href="public/manifest.json" />

    <link rel="stylesheet" type="text/css" href="public/semantic/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="public/semantic/semantic.min.js"></script>
    <script src="public/scripts/login.js"></script>

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
    <script>
        // if ('serviceWorker' in navigator) {

        //     window.addEventListener('load', function() {

        //         navigator.serviceWorker.register('public/scripts/sw.js').then(function(registration) {

        //             console.log('Worker registration successful', registration.scope);

        //         }, function(err) {

        //             console.log('Worker registration failed', err);

        //         }).catch(function(err) {

        //             console.log(err);

        //         });
        //     });

        // } else {
        //     console.log('Service Worker is not supported by browser.');
        // }

        $(document)
            .ready(function() {
                $('#loginForm')
                    .form({
                        fields: {
                            email: {
                                identifier: 'email',
                                rules: [{
                                        type: 'empty',
                                        prompt: 'Please enter your e-mail'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'Please enter a valid e-mail'
                                    }
                                ]
                            },
                            password: {
                                identifier: 'password',
                                rules: [{
                                        type: 'empty',
                                        prompt: 'Please enter your password'
                                    },
                                    {
                                        type: 'length[3]',
                                        prompt: 'Your password must be at least 6 characters'
                                    }
                                ]
                            }
                        }
                    });
            });
    </script>
</head>

<body>

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui yellow image header">
                <img src="public/assets/images/logo64.png" class="image">
                <div class="content">
                    Log-in to your account
                </div>
            </h2>
            <form class="ui large form" id="loginForm" method="GET" action="minha_url">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" id="email" name="email" placeholder="E-mail address">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <input type="submit" value="Submit" class="ui fluid large yellow submit button" id="btnLogin">Login</input>
                </div>

                <div class="ui error message"></div>

            </form>

            <div class="ui message">
                New to us? <a href="#">Sign Up</a>
            </div>
        </div>
    </div>

</body>

</html>
