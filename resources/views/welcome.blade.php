<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PromptLaunch</title>

        <!-- Facebook Pixel Code -->
        <script>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '2328357677487839');
          fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
          src="https://www.facebook.com/tr?id=2328357677487839&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136952252-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-136952252-1');
        </script>
        <link rel="stylesheet" href="./css/app.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <style>
        </style>
    </head>
    <body>
        <section class="hero is-primary is-medium is-bold">
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <a href="#" class="navbar-item">
                                PromptLaunch
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        Make Writing A Breeze
                    </h1>
                    <h2 class="subtitle">
                        A single tool for brainstorming, organizing, and writing successful academic papers.
                    </h2>
                    <br>
                    <div class="columns is-centered is-mobile">
                        <div class="column is-10-mobile is-10-tablet is-8-desktop">
                            <div class="box">
                                <form action="/" method="post">
                                    @csrf
                                    <div class="columns">
                                        <div class="column">
                                            <div class="field">
                                                <p class="control has-icons-left">
                                                    <input name="name" type="text" placeholder="Name" class="input" required>
                                                    <span class="icon is-small is-left">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="field">
                                                <p class="control has-icons-left">
                                                    <input name="email" type="email" placeholder="Email" class="input" required>
                                                    <span class="icon is-small is-left">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column is-3">
                                            <button class="button is-primary is-fullwidth" type="submit">I'm Interested!</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="columns is-centered is-mobile">
                        <div class="column is-10-mobile is-10-tablet is-8-desktop">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <article class="message is-danger">
                                        <div class="message-body">
                                            {{ $error }}
                                        </div>
                                    </article>
                                @endforeach
                            @endif
                            @isset ($success)
                                <article class="message is-success">
                                    <div class="message-body">
                                        Thank you for your interest! Keep your eye out for an email from us soon!
                                    </div>
                                </article>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-foot">

            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="box">
                    <p class="has-text-centered is-size-6">PromptLaunch is a free tool that simplifies undergraduate academic writing. While it won't write for you, PromptLaunch employs a unique process that makes writing a breeze.</p>
                </div>
                <hr>
                <div class="columns is-multiline">
                    <div class="column is-6-desktop is-6-tablet is-12-mobile">
                        <div class="card has-text-centered">
                            <div class="card-content">
                                <div class="content">
                                    <p class="title is-5">
                                        Collect
                                    </p>
                                    <hr>
                                    <p class="is-size-6">
                                        Collect evidence from all of your sources in a single place.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6-desktop is-6-tablet is-12-mobile">
                        <div class="card has-text-centered">
                            <div class="card-content">
                                <div class="content">
                                    <p class="title is-5">
                                        Analyze
                                    </p>
                                    <hr>
                                    <p class="is-size-6">
                                        Organize evidence to support your ideas.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6-desktop is-6-tablet is-12-mobile">
                        <div class="card has-text-centered">
                            <div class="card-content">
                                <div class="content">
                                    <p class="title is-5">
                                        Argue
                                    </p>
                                    <hr>
                                    <p class="is-size-6">
                                        Craft arguments from your best ideas.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6-desktop is-6-tablet is-12-mobile">
                        <div class="card has-text-centered">
                            <div class="card-content">
                                <div class="content">
                                    <p class="title is-5">
                                        Outline
                                    </p>
                                    <hr>
                                    <p class="is-size-6">
                                        Draft your paper with our integrated outlining tool.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="content has-text-centered">
                <p>
                <strong>PromptLaunch</strong> by <a href="#">Deven Jahnke</a>.
                </p>
            </div>
        </footer>
    </body>
</html>
