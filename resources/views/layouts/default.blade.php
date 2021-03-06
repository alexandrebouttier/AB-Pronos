<!DOCTYPE html>
<html lang="fr">

<head>

    <!--End of Zendesk Chat Script-->
    <!-- Hotjar Tracking Code for https://www.teambet.fr -->
<!-- Hotjar Tracking Code for https://www.ab-pronostics.fr -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1040522,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABPronostics - Pronostics de paris sportifs</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-46924947-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-46924947-7');
</script>

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="ABPronostics - Pronostics de paris sportifs">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="https://www.ab-pronostics.fr">
    <meta name="keywords" content="tipster, tipsters, pari sportif, sport, football,tennis,rugby, basket-ball,bets,bet,unibet,betclic,pronostic,foot,argent" />
    <!-- Facebook Open graph  -->
    <meta property="og:title" content="ABPronostics - Pronostics de paris sportifs" />
    <meta property="og:site_name" content="ABPronostics - Pronostics de paris sportifs" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:url" content="https://www.ab-pronostics.fr" />
    <meta property="og:type" content="website" />
    <meta name="twitter:image:src" content="https://www.ab-pronostics.fr/img/og-image.png">
    <meta name="twitter:image" content="https://www.ab-pronostics.fr/img/og-image.png" />
    <meta property="og:image" content="https://www.ab-pronostics.fr/img/og-image.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:alt" content="Logo du site web AB-Pronostics" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:description" content="ABPronostics est une plateforme de pronostics pour les paris sportifs , je vous partage mes meilleurs pronostics  pour différent sport comme le football , le tennis" />
    <meta property="fb:app_id" content="277392549548305" />
    <link rel="icon" type="image/png" href="{{ URL::asset('img/favicon.png') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}">
</head>

<body>

    <header>
        @include('partials/navbar')
    </header>

    @yield('content')


    @include('partials/footer')

    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>




</body>

</html>
