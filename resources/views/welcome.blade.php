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
                            <a href="/test" class="navbar-item">
                                PromptLaunch
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        Write A+ Papers With Ease
                    </h1>
                    <h2 class="subtitle">
                        A single tool for researching, brainstorming, and outlining successful academic papers
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
                    <p class="has-text-weight-semibold has-text-centered">PromptLaunch is a free web-based tool that aims to simplify the academic writting process for undergraduate college students. While it can't write your papers for you, PromptLaunch provides a tested process that helps you plan your papers effeciently and makes writing them a breeze.</p>
                </div>
                <hr>
                <div class="columns is-multiline">
                    <div class="column is-6-desktop is-6-tablet is-12-mobile">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Research
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    The foundation of nearly every academic paper is a wealth of research used to support the author’s arguments. Recognizing this, PromptLaunch is designed with research in mind, making it easy to collect and track evidence worth remembering throughout the development of your paper.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6-desktop is-6-tablet is-12-mobile">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Analyze
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    Research alone cannot make for a successful academic paper, so authors must provide analysis to explain how their research advances their arguments. Recognizing this, PromptLaunch is designed to make analyzing your collected research simple so that you can focus on developing your ideas.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6-desktop is-6-tablet is-12-mobile">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Argue
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    An author’s arguments are the driving force of any academic paper. Supported by a culmination of research and analyses, they connect ideas and give guidance to a paper. Recognizing this, PromptLaunch is designed to make forming arguments and identifying their supporting content a breeze.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6-desktop is-6-tablet is-12-mobile">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Outline
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    An outline allows the author to quickly prototype the structure of their paper and is designed around a synthesis of one or more arguments. Recognizing this, PromptLaunch makes efficient use of your previous work to make constructing an outline as simple as drag and drop.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
