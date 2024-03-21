<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Laravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index') }}">Home</a>
          </li>
        </ul>
          <select class="form-select dropdown bg-dark text-light border-0" aria-label="Posts" onchange="location = this.value;">
            <option selected disabled>Posts</option>
            <option value="{{ route('posts.index') }}" {{ request()->routeIs('posts.index') ? 'selected' : '' }}>Posts List</option>
            <option value="{{ route('posts.create') }}" {{ request()->routeIs('posts.create') ? 'selected' : '' }}>New Post</option>
            <option value="{{ route('posts.trash') }}" {{ request()->routeIs('posts.trash') ? 'selected' : '' }}>Trash</option>
            <option value="{{ route('posts.count') }}" {{ request()->routeIs('posts.count') ? 'selected' : '' }}>Count</option>
          </select>
      </div>
    </div>
</nav>
