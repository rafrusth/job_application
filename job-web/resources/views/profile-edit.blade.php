<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Profile - PathFinder</title>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,700;0,9..144,900;1,9..144,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <style>

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
      --yellow-lt:#FBE7A3;
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
      background: var(--accent);
      border-radius: 4px;
    }

    .top-section h1 {
      font-size: 32px;
      margin-bottom: 24px;
    }

    .profile-card {
      background: var(--card);
      border-radius: var(--radius);
      padding: 32px;
      margin-bottom: 20px;
      max-width: 600px;
    }

    .form-group {
      margin-bottom: 24px;
    }

    .form-group:last-child {
      margin-bottom: 0;
    }

    label {
      display: block;
      font-size: 12px;
      font-weight: bold;
      color: var(--ink-lt);
      text-transform: uppercase;
      margin-bottom: 8px;
      letter-spacing: 0.5px;
    }

    input, select {
      width: 100%;
      background: rgba(255, 255, 255, 0.3);
      border: 2px solid transparent;
      border-radius: var(--radius-sm);
      padding: 14px 16px;
      font-size: 16px;
      font-weight: 500;
      color: var(--ink);
      outline: none;
      transition: all 0.2s;
    }

    input:focus, select:focus {
      border-color: var(--ink-mid);
      background: rgba(255, 255, 255, 0.5);
    }

    .actions {
      display: flex;
      gap: 12px;
      margin-top: 32px;
    }

    .save-btn {
      flex: 1;
      background: var(--card-dark);
      color: white;
      border: none;
      padding: 16px;
      border-radius: var(--radius-sm);
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: opacity 0.2s;
    }

    .cancel-btn {
      flex: 1;
      background: var(--accent);
      color: var(--ink);
      text-align: center;
      padding: 16px;
      border-radius: var(--radius-sm);
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
      transition: opacity 0.2s;
    }

    .save-btn:hover, .cancel-btn:hover {
      opacity: 0.9;
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

        <a href="{{ route('cv.answers') }}" class="nav-item">
          <div class="icon"><img src="{{ asset('images/icons/cv.png') }}" alt="CV Builder"></div>
          <span>CV Builder</span>
        </a>

        <a href="{{ route('flashcards.index') }}" class="nav-item">
          <div class="icon"><img src="{{ asset('images/icons/prep.png') }}" alt="Preparation"></div>
          <span>Preparation</span>
        </a>

        <a href="{{ route('profile') }}" class="nav-item active">
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
        <h1>Edit Profile</h1>
      </div>

      <div class="profile-card">
        <form action="{{ route('profile.update') }}" method="POST">
          @csrf
          
          <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
          </div>

          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
          </div>

          <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
            @error('phone_number') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
          </div>

          <div class="form-group">
            <label for="type">Target Role</label>
            <select id="type" name="type" required>
              <option value="backend" {{ old('type', $user->type) == 'backend' ? 'selected' : '' }}>Backend Developer</option>
              <option value="frontend" {{ old('type', $user->type) == 'frontend' ? 'selected' : '' }}>Frontend Developer</option>
              <option value="fullstack" {{ old('type', $user->type) == 'fullstack' ? 'selected' : '' }}>Fullstack Developer</option>
              <option value="ai-ml" {{ old('type', $user->type) == 'ai-ml' || old('type', $user->type) == 'aiml' ? 'selected' : '' }}>AI/ML Engineer</option>
            </select>
            @error('type') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
          </div>

          <div class="actions">
            <a href="{{ route('profile') }}" class="cancel-btn">Cancel</a>
            <button type="submit" class="save-btn">Save Changes</button>
          </div>
        </form>
      </div>
    </main>
  </div>
</body>
</html>
