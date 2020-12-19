<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container">

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <a class="navbar-brand d-lg-none small-brand" href="#">
      <img src="{{ asset('images/logo.png') }}" alt="">
    </a>
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav justify-content-center align-items-center mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            Тенге (₸)
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Тенге (₸)</a></li>
            <li><a class="dropdown-item" href="#">Русский рубль (₽)</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <span class="nav-link">+7 (747) 556-23-83</span>
        </li>
        <a class="navbar-brand d-sm-none d-lg-block" href="#">
          <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <li>
          <a class="nav-link" href="#">info@dockuboardhouse.com</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Icons</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
