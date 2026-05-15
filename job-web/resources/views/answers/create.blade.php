<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CV Builder</title>
  <style>
    /* === CLIENT CODE === */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'DM Sans';
    }

    body {
      background: #e7e1d5;
      color: #3d3a36;
      overflow: hidden; /* Prevent body scroll */
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
      font-weight: bold;
    }

    .logo {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 40px;
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
      color: #3d3a36;
      text-decoration: none;
    }

    .nav-item.active {
      background: #c7c0b5;
    }

    .icon {
      width: 24px;
      height: 24px;
      border-radius: 6px;
      background: #9d978e;
    }

    .logout {
      margin-top: auto;
    }

    /* Main Content */
    .main-content {
      width: 380px;
      display: flex;
      flex-direction: column;
      overflow-y: auto; /* Allow scrolling inside main content if it overflows */
      padding-right: 10px; /* space for scrollbar */
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

    /* Form Elements */
    textarea {
      width: 100%;
      min-height: 40px;
      background: #a29d96;
      border: none;
      border-radius: 10px;
      margin-bottom: 8px;
      padding: 8px 12px;
      font-size: 13px;
      color: #fff;
      resize: vertical;
    }

    textarea::placeholder {
      color: #e5e5e5;
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

    /* Preview Panel */
    .preview-panel {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: stretch; /* Stretch to fill container height */
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
      overflow-y: auto; /* Allow CV to scroll if it's long */
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
    .alert { padding: 8px; margin-bottom: 12px; border-radius: 8px; font-size: 13px; }
    .alert-error { background: #ffcccc; color: #cc0000; border: 1px solid #cc0000; }

    /* Responsive */
    @media (max-width: 900px) {
      .container {
        flex-direction: column;
        height: auto;
      }
      body {
          overflow: auto;
      }
      .sidebar {
        width: 100%;
        flex-direction: row;
        margin-bottom: 20px;
      }
      .logo { margin-bottom: 0; }
      nav { flex-direction: row; }
      .main-content {
        width: 100%;
        overflow-y: visible;
      }
      .preview-box {
        height: 600px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h1 class="logo">PathFinder</h1>

      <nav>
        <div class="nav-item">
          <div class="icon"></div>
          <span>Home</span>
        </div>

        <div class="nav-item active">
          <div class="icon"></div>
          <span>CV Builder</span>
        </div>

        <a href="{{ route('flashcards.index') }}" class="nav-item">
          <div class="icon"></div>
          <span>Preparation</span>
        </a>

        <div class="nav-item">
          <div class="icon"></div>
          <span>Statistics</span>
        </div>

        <a href="{{ route('profile') }}" class="nav-item">
          <div class="icon"></div>
          <span>Profile</span>
        </a>
      </nav>

      <form method="POST" action="{{ route('logout') }}" style="margin-top: auto;">
          @csrf
          <button type="submit" class="nav-item" style="background: none; border: none; width: 100%; text-align: left; padding: 10px;">
            <div class="icon"></div>
            <span>Logout</span>
          </button>
      </form>
    </aside>

    <!-- Main Content -->
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

    <!-- CV Preview -->
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
        
        // Calculate percentage (out of 4 columns)
        const totalColumns = 4;
        const percentage = (filledCount / totalColumns) * 100;
        
        progressPercentage.textContent = Math.round(percentage) + '%';
        progressFill.style.width = percentage + '%';
      }

      textareas.forEach(ta => {
        ta.addEventListener('input', updateProgress);
      });

      // Initialize on page load (handles old() values)
      updateProgress();
    });
  </script>
</body>
</html>
