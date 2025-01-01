<nav class="navbar bg-warning">
    <div class="container-fluid w-100 d-flex">
      <a class="navbar-brand text-white fw-bold">ConnectFriend</a>
      <form class="d-flex w-50" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Search</button>
      </form>
      <div>
          <button onclick="window.location='{{ route('login') }}'" class="btn btn-secondary" type="submit">Login</button>
          <button onclick="window.location='{{ route('register') }}'" class="btn btn-secondary" type="submit">Register</button>
      </div>
    </div>
  </nav>