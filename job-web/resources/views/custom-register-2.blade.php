<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PathFinder — Setting Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --cream:   #F5EFE6;
      --warm-bg: #EDE6DA;
      --charcoal: #2E2B26;
      --mid:     #8C8880;
      --faint:   #C8C3BB;
      --accent:  #3D3A35;
      --white:   #FFFFFF;
      --error:   #C0392B;
      --radius:  14px;
      --input-h: 54px;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--cream);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    nav {
      padding: 24px 48px;
      display: flex;
      align-items: center;
    }
    .logo {
      font-family: 'DM Sans', sans-serif;
      font-weight: 700;
      font-size: 20px;
      color: var(--charcoal);
      letter-spacing: -0.3px;
      text-decoration: none;
    }

    main {
      flex: 1;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0;
      max-width: 1100px;
      margin: 0 auto;
      width: 100%;
      padding: 40px 48px 80px;
      align-items: start;
    }

    .left {
      padding-right: 60px;
      padding-top: 20px;
    }
    .left h1 {
      font-family: 'DM Sans', sans-serif;
      font-size: clamp(40px, 5vw, 58px);
      color: var(--charcoal);
      line-height: 1.1;
      margin-bottom: 12px;
    }
    .left p {
      font-size: 15px;
      color: var(--mid);
      font-weight: 300;
      margin-bottom: 56px;
    }

    .steps { display: flex; flex-direction: column; gap: 28px; }

    .step {
      display: flex;
      align-items: center;
      gap: 16px;
      transition: opacity 0.3s ease;
    }
    .step.locked { opacity: 0.4; }
    .step.completed .step-num { background: var(--charcoal); color: var(--cream); border-color: var(--charcoal); }
    .step.active .step-num   { background: var(--charcoal); color: var(--cream); border-color: var(--charcoal); }

    .step-num {
      width: 36px; height: 36px;
      border-radius: 50%;
      border: 2px solid var(--faint);
      display: flex; align-items: center; justify-content: center;
      font-size: 13px; font-weight: 600;
      color: var(--faint);
      background: transparent;
      flex-shrink: 0;
      transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
      position: relative;
    }
    .step.completed .step-num::after {
      /* content: '✓'; */
      position: absolute;
      inset: 0;
      display: flex; align-items: center; justify-content: center;
      font-size: 14px;
    }
    /* .step.completed .step-num span { opacity: 0; } */

    .step-label {
      font-size: 15px;
      font-weight: 500;
      color: var(--charcoal);
    }
    .step.locked .step-label { color: var(--faint); font-weight: 400; }

    .right {
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding-top: 20px;
    }

    .field-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-top: 46px;
      transition: opacity 0.4s ease, transform 0.4s ease;
    }
    .field-group.locked-field {
      opacity: 0.35;
      pointer-events: none;
    }

    label {
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      color: var(--mid);
    }

    input, select {
      width: 100%;
      height: var(--input-h);
      background: var(--warm-bg);
      border: 2px solid transparent;
      border-radius: var(--radius);
      padding: 0 18px;
      font-family: 'DM Sans', sans-serif;
      font-size: 15px;
      color: var(--charcoal);
      outline: none;
      transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
      appearance: none;
    }
    input:focus, select:focus {
      border-color: var(--charcoal);
      background: var(--white);
      box-shadow: 0 0 0 4px rgba(46,43,38,0.07);
    }

    .select-wrap { position: relative; }
    .select-wrap::after {
      content: '';
      position: absolute;
      right: 18px; top: 50%;
      transform: translateY(-50%);
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-top: 6px solid var(--mid);
      pointer-events: none;
    }
    select.selected { color: var(--charcoal); }
    select:not(.selected) { color: var(--faint); }

    .btn-wrap {
      margin-top: 46px;
    }
    button {
      width: 100%;
      height: var(--input-h);
      background: var(--charcoal);
      color: var(--cream);
      border: none;
      border-radius: var(--radius);
      font-family: 'DM Sans', sans-serif;
      font-size: 15px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s ease, transform 0.15s ease;
    }
    button:hover { background: #1a1916; transform: translateY(-1px); }
    button:disabled { background: var(--faint); cursor: not-allowed; transform: none; }

    .error-msg {
      font-size: 11px;
      color: var(--error);
      margin-top: 2px;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(18px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .left  { animation: fadeUp 0.6s ease both; }
    .right { animation: fadeUp 0.6s ease 0.12s both; }
  </style>
</head>
<body>
  <nav><a class="logo" href="/">PathFinder</a></nav>

  <main>
    <section class="left">
      <h1>Setting up</h1>
      <p>Tell us more about yourself and your goal.</p>

      <div class="steps">
        <div class="step active" id="step-1">
          <div class="step-num"><span>1</span></div>
          <span class="step-label">Set Your Password</span>
        </div>
        <div class="step locked" id="step-2">
          <div class="step-num"><span>2</span></div>
          <span class="step-label">Personal Information</span>
        </div>
        <div class="step locked" id="step-3">
          <div class="step-num"><span>3</span></div>
          <span class="step-label">Job Target and Goals</span>
        </div>
      </div>
    </section>

    <section class="right">
      <form id="regForm" method="POST" action="{{ route('custom.register.step2.submit') }}">
        @csrf
        
        <!-- Field 1: Password -->
        <div class="field-group" id="group-password" style="margin-top: 0;">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Create a strong password" required />
          @error('password') <span class="error-msg">{{ $message }}</span> @enderror
        </div>


        <!-- Field 2: Phone Number -->
        <div class="field-group locked-field" id="group-phone">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone_number" placeholder="Enter your phone number" />
          @error('phone_number') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <!-- Field 3: Role -->
        <div class="field-group locked-field" id="group-role">
          <label for="role">Job Target</label>
          <div class="select-wrap">
            <select id="role" name="type">
              <option value="frontend">Frontend</option>
              <option value="backend">Backend</option>
              <option value="fullstack">Fullstack</option>
              <option value="ai-ml">AI / ML</option>
            </select>
          </div>
          @error('type') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="btn-wrap">
          <button id="cta" disabled type="submit">Complete Setup →</button>
        </div>
      </form>
    </section>
  </main>

<script>
  const pwdInput   = document.getElementById('password');
  const phoneInput = document.getElementById('phone');
  const roleSelect = document.getElementById('role');
  const cta        = document.getElementById('cta');

  const groupPhone = document.getElementById('group-phone');
  const groupRole  = document.getElementById('group-role');

  const step1 = document.getElementById('step-1');
  const step2 = document.getElementById('step-2');
  const step3 = document.getElementById('step-3');

  let pwdDone   = false;
  let phoneDone = false;
  let roleDone  = false;

  /* ── PASSWORD ── */
  pwdInput.addEventListener('input', () => {
    pwdDone = pwdInput.value.length >= 8;
    updateSteps();
  });

  /* ── PHONE ── */
  phoneInput.addEventListener('input', () => {
    phoneDone = phoneInput.value.length >= 7;
    phoneInput.classList.toggle('valid', phoneDone);
    updateSteps();
  });

  /* ── ROLE ── */
  roleSelect.addEventListener('change', () => {
    roleDone = roleSelect.value !== '';
    roleSelect.classList.toggle('selected', roleDone);
    updateSteps();
  });

  function updateSteps() {
    if (pwdDone) {
      step1.classList.remove('active'); step1.classList.add('completed');
      groupPhone.classList.remove('locked-field');
      step2.classList.remove('locked'); step2.classList.add('active');
    } else {
      step1.classList.remove('completed'); step1.classList.add('active');
      groupPhone.classList.add('locked-field');
      step2.classList.remove('active', 'completed'); step2.classList.add('locked');
    }

    if (pwdDone && phoneDone) {
      step2.classList.remove('active'); step2.classList.add('completed');
      groupRole.classList.remove('locked-field');
      step3.classList.remove('locked'); step3.classList.add('active');
    } else if (pwdDone) {
      step2.classList.remove('completed'); step2.classList.add('active');
      groupRole.classList.add('locked-field');
      step3.classList.remove('active', 'completed'); step3.classList.add('locked');
    }

    if (pwdDone && phoneDone && roleDone) {
      step3.classList.remove('active'); step3.classList.add('completed');
    }

    cta.disabled = !(pwdDone && phoneDone && roleDone);
  }
  
  // Initialize on load (if old data exists)
  window.onload = () => {
    if (phoneInput.value) phoneInput.dispatchEvent(new Event('input'));
    if (roleSelect.value) roleSelect.dispatchEvent(new Event('change'));
  };
</script>
</body>
</html>
