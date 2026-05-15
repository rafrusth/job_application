<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile - PathFinder</title>
  <style>
    /* === PathFinder Design System === */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'DM Sans', sans-serif;
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

    /* Sidebar */
    .sidebar {
      width: 180px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .logo {
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

    /* Main Content */
    .main-content {
      width: 450px;
      display: flex;
      flex-direction: column;
    }

    .top-section h1 {
      font-size: 32px;
      margin-bottom: 24px;
    }

    .profile-card {
      background: #d7d1c5;
      border-radius: 16px;
      padding: 24px;
      margin-bottom: 20px;
    }

    .info-item {
      margin-bottom: 20px;
    }

    .info-item:last-child {
      margin-bottom: 0;
    }

    .label {
      font-size: 12px;
      font-weight: bold;
      color: #7a756d;
      text-transform: uppercase;
      margin-bottom: 4px;
    }

    .value {
      font-size: 18px;
      font-weight: 600;
    }

    .action-btn {
      display: block;
      width: 100%;
      background: #403d3a;
      color: white;
      text-align: center;
      padding: 14px;
      border-radius: 12px;
      text-decoration: none;
      font-weight: bold;
      margin-top: 10px;
    }

    .action-btn:hover {
      background: #2a2826;
    }

    .btn-secondary {
        background: #9d978e;
    }

    /* Logout Form */
    .logout-form {
        margin-top: auto;
    }
    
    .logout-btn {
        background: none;
        border: none;
        width: 100%;
        text-align: left;
        padding: 0;
        font: inherit;
        cursor: pointer;
    }

    @media (max-width: 900px) {
      .container { flex-direction: column; height: auto; }
      body { overflow: auto; }
      .sidebar { width: 100%; flex-direction: row; margin-bottom: 20px; }
      .main-content { width: 100%; }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <a href="/" class="logo">PathFinder</a>

      <nav>
        <a href="/" class="nav-item">
          <div class="icon"></div>
          <span>Home</span>
        </a>

        <a href="{{ route('cv.answers') }}" class="nav-item">
          <div class="icon"></div>
          <span>CV Builder</span>
        </a>

        <a href="{{ route('flashcards.index') }}" class="nav-item">
          <div class="icon"></div>
          <span>Preparation</span>
        </a>

        <div class="nav-item">
          <div class="icon"></div>
          <span>Statistics</span>
        </div>

        <a href="{{ route('profile') }}" class="nav-item active">
          <div class="icon"></div>
          <span>Profile</span>
        </a>
      </nav>

      <form method="POST" action="{{ route('logout') }}" class="logout-form">
          @csrf
          <button type="submit" class="logout-btn nav-item">
            <div class="icon"></div>
            <span>Logout</span>
          </button>
      </form>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <div class="top-section">
        <h1>Your Profile</h1>
      </div>

      <div class="profile-card">
        <div class="info-item">
          <div class="label">Name</div>
          <div class="value">{{ $user->name }}</div>
        </div>

        <div class="info-item">
          <div class="label">Email</div>
          <div class="value">{{ $user->email }}</div>
        </div>

        <div class="info-item">
          <div class="label">Phone Number</div>
          <div class="value">{{ $user->phone_number ?? 'Not provided' }}</div>
        </div>

        <div class="info-item">
          <div class="label">Role</div>
          <div class="value">{{ ucfirst($user->type) }}</div>
        </div>
      </div>

      <a href="{{ route('profile.edit') }}" class="action-btn">Edit Profile Settings</a>
    </main>
  </div>
</body>
</html>
