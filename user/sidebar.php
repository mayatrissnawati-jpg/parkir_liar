<div class="sidebar">

<div class="logo">

<i class="bi bi-geo-alt-fill"></i>
<span>ParkirLapor</span>

</div>

<ul class="menu">

<li>

<a href="dashboard.php"
class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">

<i class="bi bi-grid"></i>
Dashboard

</a>

</li>

<li>

<a href="tambah_laporan.php"
class="<?= basename($_SERVER['PHP_SELF']) == 'tambah_laporan.php' ? 'active' : '' ?>">

<i class="bi bi-plus-circle"></i>
Tambah Laporan

</a>

</li>

<li>

<a href="progress.php"
class="<?= basename($_SERVER['PHP_SELF']) == 'progress.php' ? 'active' : '' ?>">

<i class="bi bi-clock-history"></i>
Progress

</a>

</li>

<li>

<a href="peta.php"
class="<?= basename($_SERVER['PHP_SELF']) == 'peta.php' ? 'active' : '' ?>">

<i class="bi bi-map"></i>
Peta Pelanggaran

</a>

</li>

<li>

<a href="../auth/logout.php">

<i class="bi bi-box-arrow-right"></i>
Logout

</a>

</li>

</ul>

</div>