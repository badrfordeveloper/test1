<!--
author: Boostraptheme
author URL: https://boostraptheme.com
License: Creative Commons Attribution 4.0 Unported
License URL: https://creativecommons.org/licenses/by/4.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="img/favicon.ico">
  <title>Portfolio Badreddine Jeddab</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">


  <style>
    .fade-enter,
    .fade-leave-to {
      opacity: 0;
      transform: translate(20em);
    }

    .fade-enter-active,
    .fade-leave-active {
      transition: all .3s ease;
    }
     .router-link-exact-active .v-list-item {
        color: #309eff;
        background-color: #e3f0fb;
      }
      a .v-list-item--link::before {
    background-color: white;
  }

      
  </style>
</head>

<body >

  <div id="app">
    <admin></admin>

<!--     <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#">
        <span class="d-block d-lg-none  mx-0 px-0"><img src="{{asset('img/logo-white.png')}}" alt=""
            class="img-fluid"></span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('img/profile.jpg')}}" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
             <a class="nav-link js-scroll-trigger" href="#about">About</a>
                  
            <router-link :to="{name:'About'}" data-toggle="collapse" data-target=".navbar-collapse.show"
              class="nav-link js-scroll-trigger">à propos</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name:'Experience'}" data-toggle="collapse" data-target=".navbar-collapse.show"
              class="nav-link js-scroll-trigger">Expérience</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name:'Portfolio'}" data-toggle="collapse" data-target=".navbar-collapse.show"
              class="nav-link js-scroll-trigger">Portfolio</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name:'Aptitudes'}" data-toggle="collapse" data-target=".navbar-collapse.show"
              class="nav-link js-scroll-trigger">Aptitudes</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name:'Eduction'}" data-toggle="collapse" data-target=".navbar-collapse.show"
              class="nav-link js-scroll-trigger">Éducation</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name:'Contact'}" data-toggle="collapse" data-target=".navbar-collapse.show"
              class="nav-link js-scroll-trigger">Contact</router-link>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid p-0">
      <transition name="fade" mode="out-in">

        <router-view />

      </transition>
    </div> -->


  </div>


  <script src="{{asset('js/admin.js')}}"></script>
  <script>


  </script>
</body>

</html>