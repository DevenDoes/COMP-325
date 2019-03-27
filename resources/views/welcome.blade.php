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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">PromptLaunch</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#howItWorks">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#earlyAccess">Early Access</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid bg-light" style="text-align:center">
          <div class="container">
            <h1 class="display-4 text-primary">PromptLaunch</h1>
            <p class="lead text-dark">A single tool for researching, brainstorming, and outlining successful academic papers</p>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark row justify-content-center">
            <div class="container">
                <form class="form-inline col-12 justify-content-center" action="/" method="post">
                    @csrf
                    <input type="text" name="name" class="col-lg-3 col-md-3 col-sm-8 mr-lg-3 mr-md-3 mb-2 mt-2 form-control form-control-sm" placeholder="your name" aria-label="Name" aria-describedby="addon-wrapping">
                    <input type="text" name="email" class="col-lg-3 col-md-3 col-sm-8 mr-lg-3 mr-md-3 mb-2 mt-2 form-control form-control-sm" placeholder="your email" aria-label="Email" aria-describedby="addon-wrapping">
                    <button class="col-lg-3 col-md-3 col-sm-8 mb-2 mt-2 btn btn-sm btn-primary text-white">Sign Me Up!</button>
                </form>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <h2>How It Works?</h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            Research
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-2">PromptLaunch keeps track of evidence for you, letting you focus on what matters most.</p>
                            <p class="card-text text-muted">The success of almost every academic paper you write in college will hinge on the research you conduct. Keeping track of all the evidence you collect to prevent accidental plagarism can present a serious challenge and distract you from actually writing your paper.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            Analyze
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-2">PromptLaunch makes it easy to assess your evidence and capture your unique ideas.</p>
                            <p class="card-text text-muted">You can never hope to write a successful academic paper without taking the time to analyze your evidence and explain it's signifigance. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Argue</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Outline</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
