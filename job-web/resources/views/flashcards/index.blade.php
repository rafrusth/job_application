<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Flashcards Setup</title>
  <style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'DM Sans', sans-serif;
    }

    :root {
      --cream:   #e7e1d5;
      --ink:     #3d3a36;
      --ink-mid: #5a5650;
      --ink-lt:  #9d978e;
      --accent:  #c7c0b5;
      --radius:  18px;
    }

    body {
      background: #e7e1d5;
      color: #3d3a36;
      overflow: hidden; 
    }

    .container {
      display: flex;
      height: 100vh;
      gap: 20px;
      padding: 20px;
    }

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
      color: #3d3a36;
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


    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow-y: auto;
      padding-right: 10px;
      align-items: center;
    }

    .main-content::-webkit-scrollbar {
      width: 6px;
    }
    .main-content::-webkit-scrollbar-thumb {
      background: #c7c0b5;
      border-radius: 4px;
    }

    .setup-container {
      background: #f2f2f2ff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      width: 100%;
      max-width: 500px;
      margin: auto; 
    }

    h1.title {
      font-size: 28px;
      margin-bottom: 24px;
      text-align: center;
      font-weight: 700;
    }

    .form-group {
      margin-bottom: 24px;
    }

    label {
      font-weight: 600;
      display: block;
      margin-bottom: 12px;
      font-size: 15px;
    }

    .checkbox-group {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .checkbox-item {
      display: flex;
      align-items: center;
      gap: 8px;
      background: #d7d1c5;
      padding: 12px;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.2s;
    }

    .checkbox-item:hover {
      background: #c7c0b5;
    }

    .checkbox-item input {
      accent-color: #3f3b38;
      width: 16px;
      height: 16px;
    }

    select, input[type="number"] {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: 1px solid #d7d1c5;
      background: #fff;
      font-size: 15px;
      color: #3d3a36;
      outline: none;
    }

    select:focus, input[type="number"]:focus {
      border-color: #3f3b38;
    }

    .btn-primary {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 12px;
      background: #403d3a;
      color: white;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s;
    }

    .btn-primary:hover {
      background: #2a2826;
    }

    .alert-error { 
      background: #ffcccc; 
      color: #cc0000; 
      padding: 12px;
      border-radius: 8px; 
      margin-bottom: 20px;
      font-size: 14px;
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
      <div class="setup-container">
        <h1 class="title">Interview Flashcards</h1>
        
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert-error">
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('flashcards.generate') }}" method="POST">
          @csrf
          
          <div class="form-group">
            <label>Select Topics</label>
            <div class="checkbox-group">
              <label class="checkbox-item">
                <input type="checkbox" name="topics[]" value="CV Based" checked> CV Based
              </label>
              <label class="checkbox-item">
                <input type="checkbox" name="topics[]" value="Role-based"> Role-based
              </label>
              <label class="checkbox-item">
                <input type="checkbox" name="topics[]" value="Behavioral"> Behavioral
              </label>
              <label class="checkbox-item">
                <input type="checkbox" name="topics[]" value="Technical"> Technical
              </label>
            </div>
          </div>

          <div class="form-group">
            <label>Target Role</label>
            <select name="role">
                <option value="backend">Backend Developer</option>
                <option value="frontend">Frontend Developer</option>
                <option value="fullstack">Fullstack Developer</option>
                <option value="ai-ml">AI/ML Engineer</option>
            </select>
          </div>

          <div class="form-group">
            <label>Difficulty</label>
            <select name="difficulty">
              <option value="beginner">Beginner</option>
              <option value="intermediate">Intermediate</option>
            </select>
          </div>

          <div class="form-group">
            <label>Amount of Questions</label>
            <select name="amount" id="amountSelect" onchange="toggleCustomAmount()">
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="custom">Custom</option>
            </select>
            <input type="number" name="amount" id="customAmount" min="1" max="50" placeholder="Enter number" style="display:none; margin-top: 10px;" disabled>
          </div>

          <button type="submit" class="btn-primary" id="startBtn">Generate & Start</button>
        </form>
      </div>


    </main>
  </div>

  <script>
    function toggleCustomAmount() {
      const select = document.getElementById('amountSelect');
      const custom = document.getElementById('customAmount');
      if (select.value === 'custom') {
        custom.style.display = 'block';
        custom.disabled = false;
        select.name = ''; 
      } else {
        custom.style.display = 'none';
        custom.disabled = true;
        select.name = 'amount';
      }
    }
    
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('startBtn').innerText = 'Generating... Please wait';
        document.getElementById('startBtn').style.opacity = '0.7';
        document.getElementById('startBtn').style.pointerEvents = 'none';
    });
    

  </script>
</body>
</html>
