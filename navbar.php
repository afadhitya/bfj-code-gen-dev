<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if ((isset($idPage) ? $idPage : null) == 1) { echo "active";}?>">
        <a class="nav-link" href="index.php">Home <?php if (isset($idPage) == 1) { echo "<span class=\"sr-only\">(current)</span>"; }?></a>
      </li>
      <li class="nav-item <?php if ((isset($idPage) ? $idPage : null) == 2) { echo "active";}?>">
        <a class="nav-link" href="data-buku.php">Tabel Data Buku <?php if (isset($idPage) == 2) { echo "<span class=\"sr-only\">(current)</span>"; }?></a>
      </li>
      <li class="nav-item <?php if ((isset($idPage) ? $idPage : null) == 3) { echo "active";}?>"">
        <a class="nav-link" href="kategori-buku.php">Tabel Kategori Buku <?php if (isset($idPage) == 3) { echo "<span class=\"sr-only\">(current)</span>"; }?></a>
      </li>
      <li class="nav-item <?php if ((isset($idPage) ? $idPage : null) == 4) { echo "active";}?>"">
        <a class="nav-link" href="status-import.php">Status Import <?php if (isset($idPage) == 4) { echo "<span class=\"sr-only\">(current)</span>"; }?></a>
      </li>
    </ul>
  </div>
</nav>