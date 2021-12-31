
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Latihan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if (isset($_GET['beranda'])) {
  echo "active";
} ?>" aria-current="page" href="/beranda?beranda">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (isset($_GET['barang'])) {
  echo "active";
} ?>" href="/barang?barang">Data Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (isset($_GET['user'])) {
  echo "active";
} ?>" href="?user">Data User</a>
        </li>
      </ul>
        <button class="btn btn-danger" type="submit">Logout</button>
    </div>
  </div>
</nav>
