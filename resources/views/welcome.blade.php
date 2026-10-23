<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <header>
            <h1>PRONET - SOLUÇÕES</h1>
        </header>
        <main>
            <a href="{{ route('conta.index') }}">Listar assinantes</a>
        </main>
    </body>
</html> -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pronet | Subúrbio Telecomunicações</title>
  <meta name="description" content="Pronet, Subúrbio Telecomunicações: internet estável e rápida para a sua região.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
</head>
<body>

  <section class="hero" id="hero" aria-label="Apresentação Pronet">

    <!-- Fundo: estrelas e rede de pontos (desenhado pelo script.js) -->
    <canvas class="hero__space" id="space" aria-hidden="true"></canvas>

    <!-- Camadas decorativas -->
    <div class="hero__glow hero__glow--blue" aria-hidden="true"></div>
    <div class="hero__glow hero__glow--violet" aria-hidden="true"></div>
    <div class="hero__grid" aria-hidden="true"></div>

    <!-- Topo -->
    <nav class="topbar" aria-label="Acesso administrativo">
      <a class="btn-admin" href="{{ route('conta.index') }}">Admin</a>
    </nav>

    <!-- Conteúdo central -->
    <div class="hero__content">

      <div class="globe-stage">
        <div class="globe" id="globe">
          <div class="globe__halo" aria-hidden="true"></div>
          <div class="globe__body">
            <img
              class="globe__img"
              src="{{asset('images/heroImagePronet.jpg')}}"
              alt="Globo terrestre cercado por uma rede de satélites de comunicação"
              draggable="false">
          </div>
        </div>
      </div>

      <h1 class="hero__title">
        <span class="hero__name">Pronet</span>
        <span class="hero__tagline">Subúrbio Telecomunicações</span>
      </h1>

      <p class="hero__text">Conexão estável e veloz, feita para a sua região.</p>

      <a class="btn-cta" href="#planos">Conheça os planos</a>
    </div>

  </section>

  <script src="{{ asset('JS/hero.js') }}"></script>
</body>
</html>
