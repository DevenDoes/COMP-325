<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PromptLaunch</title>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136952252-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-136952252-1');
        </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>

        </style>
    </head>
    <body class="bg-light">
        <div class="jumbotron bg-primary" style="text-align:center">
          <div class="container">
            <h1 class="display-4 text-white">PromptLaunch</h1>
            <p class="lead text-white">A single tool for researching, brainstorming, and outlining successful academic papers</p>
          </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card col-lg-8 col-md-12 col-sm-12">
                    <div class="card-header row justify-content-center">
                        <h3>Get Early Access</h3>
                    </div>
                    <div class="card-body">
                        <form action="/" method="post">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="firstname" class="form-control" placeholder="firstname" aria-label="Firstname" aria-describedby="addon-wrapping">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="lastname" class="form-control" placeholder="lastname" aria-label="Lastname" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="email" name="email" class="form-control" placeholder="email" aria-label="Email" aria-describedby="addon-wrapping">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <select class="custom-select" name="grade" id="grade">
                                        <option selected>Choose academic year...</option>
                                        <option value="freshmen">Freshmen</option>
                                        <option value="sophomore">Sophomore</option>
                                        <option value="junior">Junior</option>
                                        <option value="senior">Senior</option>
                                        <option value="graduate">Graduate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary col-8 bg-primary text-white">Sign Me Up!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
