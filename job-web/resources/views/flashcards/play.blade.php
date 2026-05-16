<!DOCTYPE html>
<html lang="en">
<head>
      <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flashcards Session - PathFinder</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'DM Sans', sans-serif;
    }

    body {
      background: #e7e1d5;
      color: #3d3a36;
      display: flex;
      min-height: 100vh;
      overflow: hidden;
    }

    .container {
      display: flex;
      width: 100%;
      height: 100vh;
      gap: 20px;
      padding: 20px;
    }

    /* === SIDEBAR === */
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

    /* === MAIN CONTENT === */
    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px;
    }

    .game-area-wrapper {
      width: 100%;
      max-width: 600px;
    }

    /* Progress Bar (from SVG) */
    .progress-container {
      width: 100%;
      height: 8px;
      background: #EAE5DA;
      border-radius: 4px;
      margin-bottom: 30px;
      overflow: hidden;
    }

    .progress-fill {
      height: 100%;
      background: #3d3a36;
      width: 0%;
      transition: width 0.3s ease;
    }

    /* Flashcard (from SVG) */
    .flashcard-card {
      background: #EAE5DA;
      border-radius: 24px;
      padding: 60px 40px;
      min-height: 400px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      position: relative;
    }

    .topic-badge {
      position: absolute;
      top: 20px;
      right: 20px;
      background: rgba(0,0,0,0.05);
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    .question-text {
      font-size: 32px;
      font-weight: 700;
      line-height: 1.3;
      color: #3d3a36;
    }

    .hint-container {
      margin-top: 30px;
      padding: 20px;
      background: rgba(255,255,255,0.4);
      border-radius: 12px;
      display: none;
      font-size: 16px;
      color: #3d3a36;
      text-align: left;
      width: 100%;
    }

    /* Controls */
    .controls {
      display: flex;
      gap: 15px;
      margin-top: 40px;
      width: 100%;
    }

    button {
      flex: 1;
      padding: 16px 24px;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
    }

    .btn-outline {
      background: transparent;
      border: 2px solid #3d3a36;
      color: #3d3a36;
    }

    .btn-outline:hover {
      background: rgba(61, 58, 54, 0.05);
    }

    .btn-solid {
      background: #3d3a36;
      border: none;
      color: #e7e1d5;
    }

    .btn-solid:hover {
      background: #2a2826;
    }

    .btn-disabled {
      opacity: 0.3;
      pointer-events: none;
    }

    /* Results Screen */
    .results-screen {
      display: none;
      text-align: center;
    }

    .score-circle {
      width: 180px;
      height: 180px;
      border-radius: 50%;
      background: conic-gradient(#3d3a36 0%, #EAE5DA 0%);
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 40px auto;
      position: relative;
    }

    .score-circle::before {
      content: "";
      position: absolute;
      width: 150px;
      height: 150px;
      background: #e7e1d5;
      border-radius: 50%;
    }

    .score-value {
      position: relative;
      font-size: 48px;
      font-weight: 700;
    }

    .stats {
      display: flex;
      justify-content: space-around;
      margin-top: 40px;
      width: 100%;
      color: #9d978e;
    }

    .stat-item span {
      display: block;
      font-size: 24px;
      color: #3d3a36;
      font-weight: 700;
      margin-top: 5px;
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
      .logo { margin-bottom: 0; font-size: 24px; }
      nav { flex-direction: row; gap: 8px; }
      .nav-item span { display: none; }
      .nav-item { padding: 8px; }
      
      .main-content {
        width: 100%;
        overflow-y: visible;
        padding-right: 0;
      }
      form { margin-top: 0 !important; }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <a href="/" class="logo">PathFinder</a>

      <nav>
        <a href="{{ route('homepage') }}" class="nav-item">
          <div class="icon"><img src="{{ asset('images/icons/home.png') }}" alt="Home"></div>
          <span>Home</span>
        </a>

        <a href="{{ route('cv.answers') }}" class="nav-item">
          <div class="icon"><img src="{{ asset('images/icons/cv.png') }}" alt="CV Builder"></div>
          <span>CV Builder</span>
        </a>

        <a href="{{ route('flashcards.index') }}" class="nav-item active">
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

    <!-- Main Content -->
    <main class="main-content">
      <div class="game-area-wrapper" id="gameArea">
        <div class="progress-container">
          <div class="progress-fill" id="progressBar"></div>
        </div>

        <div class="flashcard-card">
          <div class="topic-badge" id="topicBadge">Topic</div>
          <div class="question-text" id="questionText">Loading...</div>
          <div class="hint-container" id="hintBox"></div>
        </div>

        <div class="controls" id="controls">
          <button class="btn-outline" id="btnHint" onclick="showHint()">Show Hint</button>
          <button class="btn-outline" id="btnSkip" onclick="handleSkip()">Skip</button>
          <button class="btn-solid" id="btnNext" onclick="handleNext()">Next Question</button>
        </div>
      </div>

      <!-- Results Area -->
      <div class="game-area-wrapper results-screen" id="resultsArea">
          <div class="flashcard-card">
              <h2 style="margin-bottom: 20px;">Session Complete!</h2>
              <div class="score-circle" id="scoreCircle">
                  <div class="score-value" id="finalScore">0</div>
              </div>
              
              <div class="stats">
                  <div class="stat-item">Hints Used<span id="statHints">0</span></div>
                  <div class="stat-item">Skipped<span id="statSkips">0</span></div>
              </div>

              <button class="btn-solid" style="margin-top: 40px; width: 100%;" onclick="window.location.href='{{ route('flashcards.index') }}'">Finish Session</button>
          </div>
      </div>
    </main>
  </div>

  <script>
    const questions = @json($questions);
    const difficulty = "{{ $difficulty }}";
    
    let currentIndex = 0;
    const totalQuestions = questions.length;
    
    let hintsUsed = 0;
    let skipsUsed = 0;
    
    let currentQuestionHinted = false;

    const questionText = document.getElementById('questionText');
    const hintBox = document.getElementById('hintBox');
    const topicBadge = document.getElementById('topicBadge');
    const progressBar = document.getElementById('progressBar');
    const btnHint = document.getElementById('btnHint');

    function renderQuestion() {
      if (currentIndex >= totalQuestions) {
        showResults();
        return;
      }

      const q = questions[currentIndex];
      questionText.innerText = q.question;
      topicBadge.innerText = q.topic;
      
      // Update Progress Bar
      const progress = ((currentIndex) / totalQuestions) * 100;
      progressBar.style.width = `${progress}%`;
      
      // Reset state for new question
      hintBox.style.display = 'none';
      hintBox.innerText = q.hint || 'No hint available.';
      btnHint.classList.remove('btn-disabled');
      currentQuestionHinted = false;
    }

    function showHint() {
      if(currentQuestionHinted) return;
      hintBox.style.display = 'block';
      btnHint.classList.add('btn-disabled');
      currentQuestionHinted = true;
      hintsUsed++;
    }

    function handleSkip() {
      skipsUsed++;
      currentIndex++;
      renderQuestion();
    }

    function handleNext() {
      currentIndex++;
      renderQuestion();
    }

    function showResults() {
      document.getElementById('gameArea').style.display = 'none';
      document.getElementById('resultsArea').style.display = 'block';
      progressBar.style.width = '100%';

      // 100 - (hintRate * 40 )- (skiprate * 35)
      const hintRate = hintsUsed / totalQuestions;
      const skipRate = skipsUsed / totalQuestions;

      let score = 100 - (hintRate * 40) - (skipRate * 35);
      score = Math.max(0, Math.round(score)); // Keep it between 0-100

      document.getElementById('finalScore').innerText = score;
      document.getElementById('statHints').innerText = hintsUsed;
      document.getElementById('statSkips').innerText = skipsUsed;

      // Animate the circle
      const circle = document.getElementById('scoreCircle');
      circle.style.background = `conic-gradient(#3d3a36 ${score}%, #EAE5DA ${score}%)`;

      saveScoreToLocal(score);
    }

    function saveScoreToLocal(score) {
      const MAX_SCORES = 4;
      let scores = JSON.parse(localStorage.getItem('flashcard_scores') || '[]');
      
      // Add new score with timestamp
      scores.unshift({
        score: score,
        date: new Date().toLocaleDateString(),
        difficulty: difficulty
      });

      // Keep only recent 4
      if (scores.length > MAX_SCORES) {
        scores = scores.slice(0, MAX_SCORES);
      }

      localStorage.setItem('flashcard_scores', JSON.stringify(scores));
    }

    // Init
    if (questions && questions.length > 0) {
      renderQuestion();
    } else {
      questionText.innerText = "No questions generated. Please try again.";
      document.getElementById('controls').style.display = 'none';
    }
  </script>
</body>
</html>

