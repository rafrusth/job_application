<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CV Builder</title>
  <style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'DM Sans', sans-serif;;
    }

    :root {
      --cream: #e7e1d5;
      --ink: #3d3a36;
      --ink-mid: #5a5650;
      --ink-lt: #9d978e;
      --accent: #c7c0b5;
      --radius: 18px;
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

    .logout {
      margin-top: auto;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow-y: auto; 
      padding-right: 10px;
    }

    .main-content::-webkit-scrollbar {
      width: 6px;
    }
    .main-content::-webkit-scrollbar-thumb {
      background: #c7c0b5;
      border-radius: 4px;
    }

    .top-section h1 {
      font-size: 32px;
      margin-bottom: 8px;
    }

    .progress-header {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      margin-bottom: 6px;
      font-weight: bold;
    }

    .progress-bar {
      width: 100%;
      height: 6px;
      background: #cfc7bb;
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 16px;
    }

    .progress-fill {
      width: 0%;
      height: 100%;
      background: #3f3b38;
      transition: width 0.3s ease;
    }

    .suggestion-box {
      background: #d7d1c5;
      border-radius: 16px;
      padding: 12px 16px;
      margin-bottom: 16px;
    }

    .suggestion-box h3 {
      font-size: 18px;
      margin-bottom: 4px;
    }

    .suggestion-box p {
      font-size: 13px;
    }

    .section-card {
      background: #d7d1c5;
      border-radius: 16px;
      padding: 16px;
    }

    .section-title {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 10px 0 8px 0;
    }

    .section-title h2 {
      font-size: 16px;
    }

    .section-title span {
      font-size: 18px;
    }

    textarea {
      width: 100%;
      min-height: 40px;
      background: #a29d96;
      border: none;
      border-radius: 10px;
      margin-bottom: 8px;
      padding: 8px 12px;
      font-size: 13px;
      color: #2e2b29;
      resize: vertical;
    }

    textarea::placeholder {
      color: #635e5e;
    }
    
    textarea:focus {
      outline: 2px solid #3f3b38;
    }

    .done-btn {
      margin-top: 16px;
      border: none;
      background: #403d3a;
      color: white;
      font-size: 16px;
      padding: 12px;
      border-radius: 12px;
      cursor: pointer;
      width: 100%;
      font-weight: bold;
    }
    
    .done-btn:hover {
        background: #2a2826;
    }

    .preview-panel {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: stretch;
    }

    .preview-box {
      width: 100%;
      background: #f5f5f5;
      border: 12px solid #d7d1c5;
      border-radius: 20px;
      display: flex;
      font-size: 13px;
      padding: 24px;
      white-space: pre-wrap;
      overflow-y: auto;
      line-height: 1.5;
    }

    .empty-preview {
        align-self: center;
        text-align: center;
        width: 100%;
        color: #9d978e;
        font-size: 20px;
        font-weight: bold;
    }

    /* Error Alerts */
    .alert {
      padding: 8px;
      margin-bottom: 12px;
      border-radius: 8px;
      font-size: 13px;
    }
    .alert-error {
      background: #ffcccc;
      color: #cc0000;
      border: 1px solid #cc0000;
    }

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
      
      .main-content {
        width: 100%;
        overflow-y: visible;
        padding-right: 0;
      }
      form { margin-top: 0 !important; }
      .preview-box {
        height: 500px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <a href="/" class="logo">PathFinder</a>

      <nav>
        <a href="{{ route('homepage') }}" class="nav-item">
          <div class="icon"><img src="{{ asset('images/icons/home.png') }}" alt="Home"></div>
          <span>Home</span>
        </a>

        <a href="{{ route('cv.answers') }}" class="nav-item active">
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

    <main class="main-content">
      <div class="top-section">
        <h1>CV Builder</h1>

        <div class="progress-header">
          <span>Completions</span>
          <span id="progress-percentage">0%</span>
        </div>

        <div class="progress-bar">
          <div class="progress-fill" id="progress-fill"></div>
        </div>

        <div class="suggestion-box">
          <h3>💡 Suggestions</h3>
          <p>Consider adding detailed bullet points in order to optimize ATS matching.</p>
        </div>
      </div>

      <form action="{{ route('cv.generate') }}" method="POST">
          @csrf
          <div class="section-card">
            
            @if (session('error'))
                <div class="alert alert-error"><strong>Error:</strong> {{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul style="margin-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="section-title">
              <h2>Experience</h2>
              <span>+</span>
            </div>
            <textarea name="experience" rows="3" placeholder="Where have you worked?">{{ old('experience') }}</textarea>

            <div class="section-title">
              <h2>Education</h2>
              <span>+</span>
            </div>
            <textarea name="education" rows="2" placeholder="Where did you study?">{{ old('education') }}</textarea>

            <div class="section-title">
              <h2>Skills</h2>
              <span>+</span>
            </div>
            <textarea name="skill" rows="2" placeholder="List your skills...">{{ old('skill') }}</textarea>

            <div class="section-title">
              <h2>Projects</h2>
              <span>+</span>
            </div>
            <textarea name="project" rows="3" placeholder="What projects have you built?">{{ old('project') }}</textarea>

          </div>

          <button type="submit" class="done-btn">Generate CV</button>
      </form>
    </main>

    <section class="preview-panel">
      <div class="preview-box">
        @if(session('cvContent'))
            <div>{{ session('cvContent') }}</div>
        @else
            <div class="empty-preview">Generated CV will appear here</div>
        @endif
      </div>
    </section>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const textareas = document.querySelectorAll('textarea');
      const progressPercentage = document.getElementById('progress-percentage');
      const progressFill = document.getElementById('progress-fill');

      function updateProgress() {
        let filledCount = 0;
        textareas.forEach(ta => {
          if (ta.value.trim() !== '') {
            filledCount++;
          }
        });
        
        const totalColumns = 4;
        const percentage = (filledCount / totalColumns) * 100;
        
        progressPercentage.textContent = Math.round(percentage) + '%';
        progressFill.style.width = percentage + '%';
      }

      textareas.forEach(ta => {
        ta.addEventListener('input', updateProgress);
      });
      updateProgress();
    });
  </script>
</body>
</html>
