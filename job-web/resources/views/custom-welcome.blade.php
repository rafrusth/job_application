<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PathFinder — Job Preparation Made Easy</title>
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" /> -->

  <style>
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --bg:        #F7F0E6;
      --ink:       #333030;
      --ink-mute:  #888078;
      --card-bg:   #2E2C2A;
      --btn-bg:    #2E2C2A;
      --btn-text:  #F7F0E6;
      --radius:    14px;
    }

    html, body {
      height: 100%;
    }

    body {
      background: var(--bg);
      color: var(--ink);
      font-family: 'DM Sans', sans-serif;
    }

    /* ── Nav ── */
    nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 22px 52px;
      opacity: 1;
      /* animation: fadeDown .5s .05s ease forwards; */
    }

    .logo {
      /* font-family: 'Fraunces', serif; */
      font-weight: 700;
      font-size: 1.25rem;
      letter-spacing: -.02em;
      color: var(--ink);
      text-decoration: none;
    }

    .nav-right {
      display: flex;
      align-items: center;
      gap: 36px;
    }

    .nav-links {
      display: flex;
      gap: 32px;
      list-style: none;
    }

    .nav-links a {
      font-size: .95rem;
      font-weight: 400;
      color: var(--ink);
      text-decoration: none;
      transition: opacity .15s;
    }

    .nav-links a:hover { opacity: .55; }

    .btn-login {
      background: var(--btn-bg);
      color: var(--btn-text);
      border: none;
      border-radius: 999px;
      padding: 12px 26px;
      font-family: 'DM Sans', sans-serif;
      font-size: .95rem;
      font-weight: 500;
      cursor: pointer;
      text-decoration: none;
      transition: background .2s, transform .15s;
    }

    .btn-login:hover {
      background: #1a1917;
      transform: translateY(-1px);
    }

    /* ── Hero ── */
    .hero {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 90px 52px 100px;
    }

    .hero h1 {
      /* font-family: 'Fraunces', serif; */
      font-weight: 700;
      font-size: clamp(3rem, 7vw, 5.2rem);
      line-height: 1.08;
      letter-spacing: -.04em;
      color: var(--ink);
      max-width: 820px;
      margin-bottom: 28px;
      opacity: 0;
      animation: fadeUp .6s .15s ease forwards;
    }

    .hero p {
      font-size: clamp(1rem, 1.6vw, 1.2rem);
      font-weight: 300;
      color: var(--ink-mute);
      line-height: 1.6;
      max-width: 560px;
      margin-bottom: 48px;
      opacity: 0;
      animation: fadeUp .6s .28s ease forwards;
    }

    .hero-btns {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      justify-content: center;
      opacity: 0;
      animation: fadeUp .6s .4s ease forwards;
    }

    .btn-outline {
      background: transparent;
      color: var(--ink);
      border: 1.5px solid var(--ink);
      border-radius: var(--radius);
      padding: 16px 32px;
      font-family: 'DM Sans', sans-serif;
      font-size: 1rem;
      font-weight: 400;
      cursor: pointer;
      text-decoration: none;
      transition: background .2s, color .2s, transform .15s;
    }

    .btn-outline:hover {
      background: var(--ink);
      color: var(--bg);
      transform: translateY(-1px);
    }

    .btn-solid {
      background: var(--btn-bg);
      color: var(--btn-text);
      border: 1.5px solid var(--btn-bg);
      border-radius: var(--radius);
      padding: 16px 32px;
      font-family: 'DM Sans', sans-serif;
      font-size: 1rem;
      font-weight: 400;
      cursor: pointer;
      text-decoration: none;
      transition: background .2s, transform .15s;
    }

    .btn-solid:hover {
      background: #1a1917;
      border-color: #1a1917;
      transform: translateY(-1px);
    }

    /* ── Sections row ── */
    .sections-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      padding: 0 52px 80px;
      opacity: 0;
      animation: fadeUp .65s .52s ease forwards;
    }

    .section-block h2 {
      /* font-family: 'Fraunces', serif; */
      font-weight: 700;
      font-size: clamp(1.8rem, 3vw, 2.5rem);
      letter-spacing: -.03em;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-block h2 .arrow {
      display: inline-block;
      font-style: normal;
      font-size: .75em;
      opacity: .6;
    }

    .card {
      background: var(--card-bg);
      border-radius: 18px;
      height: 260px;
      width: 100%;
    }

    /* ── Animations ── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeDown {
      from { opacity: 0; transform: translateY(-12px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
      nav { padding: 20px 24px; }
      .nav-links { display: none; }
      .hero { padding: 60px 24px 70px; }
      .sections-row { grid-template-columns: 1fr; padding: 0 24px 60px; }
    }
  </style>
</head>
<body>

  <!-- Nav -->
  <nav>
    <a class="logo" href="#">PathFinder</a>
    <div class="nav-right">
      <ul class="nav-links">
        <li><a href="#">Menu 1</a></li>
        <li><a href="#">Menu 2</a></li>
        <li><a href="#">Menu 3</a></li>
        <li><a href="#">Menu 4</a></li>
      </ul>
      <a class="btn-login" href="{{ route('custom.login') }}">Login</a>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero">
    <h1>Job Preparation<br>Made Easy</h1>
    <p>Some nice copywriting about how delightful and helpful our website is when it comes to job preparation.</p>
    <div class="hero-btns">
      <a class="btn-outline" href="#">Learn More</a>
      <!-- to custom-register-page -->
      <a class="btn-solid" href="{{ route('custom.register') }}">Start Now →</a>
    </div>
  </section>

  <!-- Features & Advantages -->
  <div class="sections-row">
    <div class="section-block">
      <h2>Features <span class="arrow">↘</span></h2>
      <div class="card"></div>
    </div>
    <div class="section-block">
      <h2>Advantages <span class="arrow">↘</span></h2>
      <div class="card"></div>
    </div>
  </div>

</body>
</html>
