<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PathFinder – Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,700;0,9..144,900;1,9..144,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    /* === PathFinder Design System === */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'DM Sans', sans-serif;
    }

    :root {
      --cream: #e7e1d5;
      --ink: #3d3a36;
      --ink-mid: #5a5650;
      --ink-lt: #9d978e;
      --yellow: #F0B429;
      --yellow-lt: #FBE7A3;
      --card: #d7d1c5;
      --card-dark: #3d3a36;
      --bar-dark: #3d3a36;
      --bar-lt: #cfc7bb;
      --accent: #c7c0b5;
      --radius: 18px;
      --radius-sm: 10px;
      --shadow: 0 2px 12px rgba(0,0,0,.05);
    }

    body {
      background: var(--cream);
      color: var(--ink);
      overflow: hidden;
    }

    .container {
      display: flex;
      height: 100vh;
      gap: 20px;
      padding: 20px;
    }

    /* Sidebar */
    .sidebar {
      width: 180px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .logo {
      display: block;
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 40px;
      text-decoration: none;
      color: inherit;
    }

    nav {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .nav-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px;
      border-radius: 12px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      color: var(--ink);
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .nav-item:hover {
      background: rgba(0, 0, 0, 0.05);
    }

    .nav-item.active {
      background: var(--accent);
    }

    .icon {
      width: 24px;
      height: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .icon img {
      width: 24px;
      height: 24px;
      object-fit: contain;
    }

    /* Main Content */
    .main {
      flex: 1;
      display: grid;
      grid-template-rows: auto 1fr;
      gap: 20px;
      overflow-y: auto;
      padding-right: 10px;
    }

    .main::-webkit-scrollbar {
      width: 6px;
    }
    .main::-webkit-scrollbar-thumb {
      background: var(--accent);
      border-radius: 4px;
    }

    /* ── DASHBOARD SPECIFIC ── */
    .top-row {
      display: grid;
      grid-template-columns: 1fr 340px;
      gap: 20px;
    }

    .welcome-card {
      background: var(--card);
      border-radius: var(--radius);
      padding: 32px 32px 0;
      display: flex;
      align-items: flex-end;
      gap: 24px;
      overflow: hidden;
      min-height: 300px;
      position: relative;
    }

    .welcome-text {
      flex: 1;
      padding-bottom: 32px;
    }
    .welcome-text p {
      font-size: 16px;
      color: var(--ink-mid);
      margin-bottom: 4px;
    }
    .welcome-text h1 {
      font-size: 44px;
      font-weight: 700;
      line-height: 1.05;
      color: var(--ink);
      margin-bottom: 18px;
    }

    .role-badge {
      display: inline-block;
      background: var(--ink);
      color: var(--cream);
      font-size: 13px;
      font-weight: 600;
      padding: 8px 18px;
      border-radius: 99px;
    }

    .illus-placeholder {
      width: 220px;
      height: 260px;
      flex-shrink: 0;
      display: flex;
      align-items: flex-end;
      overflow: hidden;
    }

    .illus-placeholder img {
      width: 100%;
      height: auto;
      object-fit: contain;
    }

    .right-col {
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .cv-card {
      background: var(--card);
      border-radius: var(--radius);
      padding: 22px 22px 20px;
      cursor: pointer;
      text-decoration: none;
      display: block;
      color: inherit;
    }

    .cv-card-top { 
        display: flex; 
        align-items: flex-start; 
        justify-content: space-between; 
        margin-top: 14px;
        margin-bottom: 14px; 
      }
    .cv-card-top h3 {
      font-size: 20px;
      font-weight: 700;
    }
    .cv-card-top p {
      font-size: 13px;
      color: var(--ink-mid);
      margin-top: 2px;
    }

    .cv-chip {
      background: var(--card-dark);
      color: var(--cream);
      border-radius: var(--radius-sm);
      padding: 10px 14px;
      font-size: 12px;
      font-weight: 600;
      text-align: right;
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .progress-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 8px;
    }
    .progress-row span {
      font-size: 13px;
      color: var(--ink-mid);
    }
    .progress-row strong {
      font-size: 13px;
      font-weight: 700;
    }

    .progress-track {
      height: 8px;
      background: var(--bar-lt);
      border-radius: 99px;
      overflow: hidden;
    }
    .progress-fill {
      height: 100%;
      background: var(--ink);
      border-radius: 99px;
      transition: width .6s ease;
    }

    .gnt-card {
      background: var(--card);
      border-radius: var(--radius);
      padding: 22px 22px 20px;
      flex: 1;
      cursor: pointer;
      text-decoration: none;
      display: block;
      color: inherit;
    }

    .gnt-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 4px;
    }
    .gnt-header h3 {
      font-size: 20px;
      font-weight: 700;
    }
    .gnt-header .arrow-link {
      font-size: 18px;
      color: var(--ink-mid);
      cursor: pointer;
    }

    .gnt-sub {
      font-size: 13px;
      color: var(--ink-mid);
      margin-bottom: 16px;
    }
    .gnt-sub strong {
      font-weight: 700;
      color: var(--ink);
    }

    .scores-label {
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .5px;
      text-transform: uppercase; 
      margin-bottom: 10px;
      color: var(--ink-mid);
    }

    .score-bar-row {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 8px
    }
    .score-num {
      font-size: 13px;
      font-weight: 700;
      color: var(--ink);
      width: 10px; }
    .score-track {
      flex: 1;
      height: 24px;
      background: var(--bar-lt);
      border-radius: 6px;
      overflow: hidden;
    }
    .score-fill {
      height: 100%;
      background: var(--bar-dark);
      border-radius: 6px;
      display: flex;
      align-items: center;
      padding-left: 10px;
      font-size: 11px;
      font-weight: 700;
      color: var(--cream);
      transition: width .6s ease;
    }

    .q-card-mini {
      width: 120px;
      height: 160px;
      background: #fff;
      border-radius: 10px; 
      padding: 10px;
      font-size: 10px;
      box-shadow: var(--shadow);
      color: var(--ink);
      line-height: 1.45;
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .q-chip {
      display: inline-flex;
      align-items: center;
      gap: 4px; background: var(--cream);
      border-radius: 6px;
      padding: 3px 6px;
      font-size: 9px;
      font-weight: 700;
      margin-bottom: 6px;
      align-self: flex-start;
    }

    .gnt-bottom {
      display: flex;
      gap: 12px;
      margin-top: 12px;
    }
    .gnt-scores {
      flex: 1; }
    #homeScoreList {
      min-height: 160px;
    }

    .bottom-row {
      display: grid;
      grid-template-columns: 1fr 260px;
      gap: 20px;
    }

    .chart-card {
      background: var(--card);
      brder-radius: var(--radius);
      padding: 24px 26px;
    }
    .chart-header {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 6px;
    }
    .chart-header h3 {
      font-size: 22px;
      font-weight: 700;
    }

    .legend {
      display: flex;
      gap: 16px;
      font-size: 12px;
      color: var(--ink-lt);
    }
    .legend-item {
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .legend-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--ink-lt);
    }
    .legend-dot.accepted {
      background: var(--ink);
    }

    .stats-row {
      display: flex;
      gap: 28px; 
      margin: 16px 0;
    }
    .stat-block label {
      font-size: 11px;
      color: var(--ink-lt);
      display: block;
      margin-bottom: 2px;
    }
    .stat-block .stat-val {
      font-size: 32px;
      font-weight: 700;
    }
    .stat-block .stat-pct {
      font-size: 13px;
      color: var(--ink-mid);
    }

    .chart-wrap {
      width: 100%;
      margin-top: 8px;
    }
    svg.area-chart {
      width: 100%;
      height: 140px;
    }

    .companies-card {
      background: var(--card);
      border-radius: var(--radius);
      padding: 22px 22px 20px;
    }
    .companies-card h3 { 
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 14px;
    }

    .company-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 0;
      border-bottom: 1px solid var(--accent);
    }
    .company-item:last-child {
      border-bottom: none;
    }

    .company-logo {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--bar-dark);
      flex-shrink: 0;
      display: grid;
      place-items: center;
      color: #fff;
      font-size: 13px;
      font-weight: 800;
    }
    .company-info .name {
      font-size: 13px;
      font-weight: 700;
    }
    .company-info .loc {
      font-size: 11px;
      color: var(--ink-lt);
      margin-top: 1px;
    }

    @keyframes fadeUp {
      from {
        opacity: 0; transform: translateY(16px);
      }
      to   {
        opacity: 1; transform: translateY(0);
      }
    }
    .welcome-card {
      animation: fadeUp .45s .1s ease both;
    }
    .right-col {
      animation: fadeUp .45s .18s ease both;
    }
    .bottom-row {
      animation: fadeUp .45s .28s ease both;
    }

    /* Responsive */
    @media (max-width: 900px) {
      .container {
        flex-direction: column;
        height: auto;
        padding: 10px;
      }
      body {
        overflow: auto;
      }
      .sidebar {
        width: 100%;
        flex-direction: row;
        margin-bottom: 20px;
        justify-content: space-between;
        align-items: center;
      }
      .logo {
        margin-bottom: 0;
        font-size: 24px;
      }
      nav {
        flex-direction: row;
        gap: 8px;
      }
      .nav-item span {
        display: none;
      }
      .nav-item {
        padding: 8px;
      }
      
      .main {
        width: 100%;
        overflow-y: visible;
        padding-right: 0;
      }
      .top-row, .bottom-row {
        grid-template-columns: 1fr;
      }
      .welcome-card {
        min-height: auto;
        padding-bottom: 20px;
        flex-direction: column;
        align-items: flex-start;
      }
      .illus-placeholder {
        display: none;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <aside class="sidebar">
      <a href="/" class="logo">PathFinder</a>

      <nav>
        <a href="{{ route('homepage') }}" class="nav-item active">
          <div class="icon"><img src="{{ asset('images/icons/home.png') }}" alt="Home"></div>
          <span>Home</span>
        </a>

        <a href="{{ route('cv.answers') }}" class="nav-item">
          <div class="icon"><img src="{{ asset('images/icons/cv.png') }}" alt="CV Builder"></div>
          <span>CV Builder</span>
        </a>

        <a href="{{ route('flashcards.index') }}" class="nav-item">
          <div class="icon"><img src="{{ asset('images/icons/prep.png') }}" alt="Preparation"></div>
          <span>Preparation</span>
        </a>

        <a href="{{ route('profile') }}" class="nav-item">
          <div class="icon"><img src="{{ asset('images/icons/profile.png') }}" alt="Profile"></div>
          <span>Profile</span>
        </a>
      </nav>

      <form method="POST" action="{{ route('logout') }}" style="margin-top: auto;">
          @csrf
          <button type="submit" class="nav-item" style="background: none; border: none; width: 100%; text-align: left; cursor: pointer; font-weight: 600;">
            <div class="icon"><img src="{{ asset('images/icons/logout.png') }}" alt="Logout"></div>
            <span>Logout</span>
          </button>
      </form>
    </aside>

  <!-- ── MAIN ──────────────────────────────────── -->
  <main class="main">

    <!-- TOP ROW -->
    <div class="top-row">

      <!-- Welcome card -->
      <div class="welcome-card">
        <div class="welcome-text">
          <p>Welcome,</p>
          <h1>{{ auth()->user()?->name ?? 'User' }}!</h1>
          <span class="role-badge">{{ ucfirst(auth()->user()?->type ?? 'member') }}</span>
        </div>

        <!-- Illustration -->
        <div class="illus-placeholder">
          <img src="{{ asset('images/hi.png') }}" alt="Hi Illustration">
        </div>
      </div>

      <!-- Right column -->
      <div class="right-col">

        <!-- CV card -->
        <a href="{{ route('cv.answers') }}" class="cv-card">
          <div class="cv-card-top">
            <div>
              <h3>Generate Your CV!</h3>
              <p>Generate your own CV based on your personal experience</p>
            </div>
            <div class="cv-chip">
              <span>CV Draft</span>
              <span>26-04-2026</span>
              <span class="arrow">↘</span>
            </div>
          </div>
        </a>

        <!-- Got No Time card -->
        <a href="{{ route('flashcards.index') }}" class="gnt-card">
          <div class="gnt-header">
            <h3>Got No Time?</h3>
            <span class="arrow-link">↘</span>
          </div>
          <p class="gnt-sub">Practice interview for <strong>5 mins</strong> only!</p>

          <div class="gnt-bottom">
            <div class="gnt-scores">
              <p class="scores-label">Previous Scores</p>
              <div id="homeScoreList" style="display: flex; flex-direction: column; justify-content: center;">
                <p style="font-size: 13px; color: var(--ink-lt);">No scores yet</p>
              </div>
            </div>

            <!-- Mini question card -->
            <div class="q-card-mini">
              <div class="q-chip">⚙️ Technical</div>
              <p>What's the difference between using SQL and NoSQL?</p>
            </div>
          </div>
        </a>

      </div><!-- /right-col -->
    </div><!-- /top-row -->

    <!-- BOTTOM ROW -->
    <div class="bottom-row">

      <!-- Chart card -->
      <div class="chart-card">
        <div class="chart-header">
          <h3>Appliers</h3>
          <div class="legend">
            <span class="legend-item"><span class="legend-dot"></span>Rejected</span>
            <span class="legend-item"><span class="legend-dot accepted"></span>Accepted</span>
          </div>
        </div>

        <div class="stats-row">
          <div class="stat-block">
            <label>Appliers</label>
            <div class="stat-val">{{ number_format($summary['applicants']) }}</div>
          </div>
          <div class="stat-block">
            <label>Accepted</label>
            <div class="stat-val">{{ number_format($summary['accepted']) }}</div>
          </div>
          <div class="stat-block">
            <label>Acceptance</label>
            <div class="stat-pct" style="font-size:28px;font-weight:700;">{{ $summary['rate'] }}%</div>
          </div>
          <div class="stat-block">
            <label>Rejected</label>
            <div class="stat-val">{{ number_format($summary['rejected']) }}</div>
          </div>
        </div>

        @php
            $maxVal = $chartData->max('value') ?: 1000;
            $points = $chartData->map(function($point, $index) use ($maxVal, $chartData) {
                $count = $chartData->count();
                $x = 20 + ($index * (670 / max(1, $count - 1)));
                $y = 130 - ($point['value'] * 110 / $maxVal);
                return ['x' => $x, 'y' => $y];
            });

            $path = "";
            foreach($points as $index => $p) {
                if ($index === 0) {
                    $path .= "M{$p['x']},{$p['y']} ";
                } else {
                    $path .= "L{$p['x']},{$p['y']} ";
                }
            }
            
            $areaPath = $path . " L690,130 L20,130 Z";
        @endphp

        <!-- Area chart (SVG) -->
        <div class="chart-wrap">
          <svg class="area-chart" viewBox="0 0 700 140" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <linearGradient id="areaGrad" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="var(--ink)" stop-opacity=".18"/>
                <stop offset="100%" stop-color="var(--ink)" stop-opacity="0"/>
              </linearGradient>
            </defs>

            <!-- Grid lines -->
            @for ($i = 0; $i <= 5; $i++)
                <line x1="0" y1="{{ 116 - ($i * 23) }}"  x2="700" y2="{{ 116 - ($i * 23) }}"  stroke="var(--accent)" stroke-width="1"/>
                <text x="2" y="{{ 127 - ($i * 23) }}" font-size="10" fill="var(--ink-lt)" font-family="DM Sans">{{ round(($maxVal / 5) * $i) }}</text>
            @endfor

            <!-- Area fill -->
            <path d="{{ $areaPath }}" fill="url(#areaGrad)"/>

            <!-- Line -->
            <path d="{{ $path }}" fill="none" stroke="var(--ink)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>

            <!-- X-axis labels -->
            @foreach($chartData as $index => $point)
                @php $x = 20 + ($index * (670 / max(1, $chartData->count() - 1))); @endphp
                <text x="{{ $x }}" y="138" font-size="9" fill="var(--ink-lt)" font-family="DM Sans" text-anchor="middle">{{ $point['label'] }}</text>
            @endforeach
          </svg>
        </div>
      </div>

      <!-- Companies Hiring card -->
      <div class="companies-card">
        <h3>Companies Hiring</h3>

        @foreach($companies as $company)
        <div class="company-item">
          <div class="company-logo" style="background: {{ ['#1a73e8', '#03AC0E', '#E02020', '#00AA13', '#F0B429'][($loop->index % 5)] }}">
            {{ substr($company->name, 0, 1) }}
          </div>
          <div class="company-info">
            <div class="name">{{ $company->name }}</div>
            <div class="loc">
              {{ $company->cities->pluck('name')->implode(', ') }}
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div><!-- /bottom-row -->
  </main>
</div>

  <script>
    window.onload = function() {
      const scores = JSON.parse(localStorage.getItem('flashcard_scores') || '[]');
      if (scores.length > 0) {
        const list = document.getElementById('homeScoreList');
        list.innerHTML = scores.map((s, idx) => `
          <div class="score-bar-row">
            <span class="score-num">${idx + 1}</span>
            <div class="score-track"><div class="score-fill" style="width:${s.score}%">${s.score}%</div></div>
          </div>
        `).join('');
      }
    };
  </script>
</body>
</html>
