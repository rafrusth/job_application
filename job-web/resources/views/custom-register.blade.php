<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PathFinder — Sign Up</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />

  <style>
    :root {
      --bg: #faf9f6;
      --text: #1a1a1a;
      --accent: #2d2d2d;
      --muted: #666;
      --border: #e5e5e1;
      --error: #a33b3b;
      --font-serif: "Fraunces", serif;
      --font-sans: "DM Sans", sans-serif;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    }

    html, body {
      height: 100%;
    }

    body {
      background: var(--bg);
      color: var(--ink);
      font-family: 'DM Sans', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* ── Nav ── */
    nav {
      padding: 28px 52px;
      opacity: 0;
      animation: fadeUp .5s .1s ease forwards;
    }

    .logo {
      /* font-family: 'Fraunces', serif; */
      font-weight: 700;
      font-size: 1.15rem;
      letter-spacing: -.02em;
      color: var(--ink);
      text-decoration: none;
    }

    /* ── Main layout ── */
    main {
      flex: 1;
      display: grid;
      grid-template-columns: 1fr 1fr;
      align-items: center;
      max-width: 1180px;
      width: 100%;
      margin: 0 auto;
      padding: 60px 52px 100px;
      gap: 80px;
    }

    /* ── Left copy ── */
    .copy {
      opacity: 0;
      animation: fadeUp .55s .2s ease forwards;
    }

    .copy h1 {
      /* font-family: 'Fraunces', serif; */
      font-weight: 700;
      font-size: clamp(2.4rem, 4vw, 3.2rem);
      line-height: 1.1;
      letter-spacing: -.03em;
      color: var(--ink);
      margin-bottom: 14px;
    }

    .copy p {
      font-size: 1.15rem;
      font-weight: 300;
      color: var(--ink-mute);
      line-height: 1.5;
    }

    /* ── Form ── */
    .form-wrap {
      display: flex;
      flex-direction: column;
      gap: 0;
    }

    .field {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 32px;
      opacity: 0;
      animation: fadeUp .55s ease forwards;
    }

    .field:nth-child(1) { animation-delay: .3s; }
    .field:nth-child(2) { animation-delay: .4s; }

    label {
      font-size: .78rem;
      font-weight: 500;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--ink-mute);
    }

    input {
      background: var(--field-bg);
      border: none;
      border-radius: var(--radius);
      padding: 18px 22px;
      font-family: 'DM Sans', sans-serif;
      font-size: 1rem;
      font-weight: 400;
      color: var(--ink);
      outline: none;
      transition: background .2s, box-shadow .2s;
      width: 100%;
    }

    input::placeholder {
      color: var(--field-ph);
    }

    input:focus {
      background: #D8D0C4;
      box-shadow: 0 0 0 3px rgba(50,48,45,.12);
    }

    /* ── Button ── */
    .btn-wrap {
      margin-top: 16px;
      opacity: 0;
      animation: fadeUp .55s .5s ease forwards;
    }

    button {
      width: 100%;
      background: var(--btn-bg);
      color: var(--btn-text);
      border: none;
      border-radius: var(--radius);
      padding: 20px 24px;
      font-family: 'DM Sans', sans-serif;
      font-size: 1rem;
      font-weight: 400;
      letter-spacing: .02em;
      cursor: pointer;
      transition: transform .15s ease, background .2s;
    }

    button:hover {
      background: #1a1917;
      transform: translateY(-1px);
    }

    button:active {
      transform: translateY(0);
    }

    /* ── Footer hint ── */
    .signin-hint {
      margin-top: 22px;
      font-size: .85rem;
      color: var(--ink-mute);
      text-align: center;
      opacity: 0;
      animation: fadeUp .55s .6s ease forwards;
    }

    .signin-hint a {
      color: var(--ink);
      font-weight: 500;
      text-decoration: underline;
      text-underline-offset: 3px;
    }

    /* ── Animation ── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(16px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Responsive ── */
    @media (max-width: 720px) {
      main {
        grid-template-columns: 1fr;
        padding: 40px 28px 80px;
        gap: 48px;
      }
      nav { padding: 24px 28px; }
    }
  </style>
</head>
<body>

  <nav>
    <a class="logo" href="#">PathFinder</a>
  </nav>

  <main>
    <section class="copy">
      <h1>Nice to meet you!</h1>
      <p>Sign up to create an account.</p>
    </section>

    <form method="POST" action="{{ route('custom.register.step1') }}">
      @csrf
      <div class="form-wrap">
        <div class="field">
          <label for="name">Full name</label>
          <input id="name" name="name" type="text" placeholder="Jane Doe" autocomplete="name" required />
        </div>

        <div class="field">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" placeholder="jane@example.com" autocomplete="email" required />
        </div>

        <div class="btn-wrap">
          <button type="submit">Sign Up</button>

          <p class="signin-hint">Already have an account? <a href="{{ route('custom.login') }}">Sign in</a></p>
        </div>
      </div>
    </form>
  </main>

</body>
</html>
