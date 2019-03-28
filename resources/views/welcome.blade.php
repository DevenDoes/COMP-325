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
        <link rel="stylesheet" href="./css/app.css">
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
            <h1 class="display-4 text-primary">Write A+ Papers With Ease</h1>
            <p class="lead text-dark">A single tool for researching, brainstorming, and outlining successful academic papers</p>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark row justify-content-center">
            <div class="container">
                <form class="form-inline col-12 justify-content-center" action="/" method="post">
                    @csrf
                    <input type="text" name="name" class="col-lg-3 col-md-3 col-sm-8 mr-lg-3 mr-md-3 mb-2 mt-2 form-control form-control-sm" placeholder="your name" aria-label="Name" aria-describedby="addon-wrapping">
                    <input type="text" name="email" class="col-lg-3 col-md-3 col-sm-8 mr-lg-3 mr-md-3 mb-2 mt-2 form-control form-control-sm" placeholder="your email" aria-label="Email" aria-describedby="addon-wrapping">
                    <button class="col-lg-3 col-md-3 col-sm-8 mb-2 mt-2 btn btn-sm btn-primary text-white">I'm Interested!</button>
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
                            <p class="card-text mb-2">PromptLaunch keeps track of your research for you, letting you focus on what matters most.</p>
                            <p class="card-text text-muted">Keeping track of your research for your academic papers can present a serious challenge. Between the stress of accidental plagiarism and the labor-intensive process of properly citing sources, you can spend countless hours distracted from actually writing your paper. PromptLaunch simplifies the process of conducting research by tracking the sources you pull your evidence from and giving you their citations when you need them so that you can focus on what matters most.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            Analyze
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-2">PromptLaunch makes it easy to capture your thoughts and identify your best ideas.</p>
                            <p class="card-text text-muted">Capturing your unique ideas for why the research you’ve collected is significant can become a logistical nightmare for any academic paper. Both cumbersome and time consuming, keeping track of not only your ideas as they develop but the research that complements them can prove inefficient. PromptLaunch simplifies the process of analyzing your research by making it quick and easy to track your ideas and your related research at the click of a button.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            Argue
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-2">PromptLaunch makes constructing strong arguments simple, building upon the best of your research and ideas.</p>
                            <p class="card-text text-muted"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            Outline
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-2">PromptLaunch makes scaffolding a content-rich outline fast, making optimal use of the work you’ve done.</p>
                            <p class="card-text text-muted"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
