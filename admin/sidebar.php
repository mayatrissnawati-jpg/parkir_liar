<div class="sidebar">

<div class="logo">

<i class="bi bi-shield-check"></i>
<span>Admin Panel</span>

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

<a href="laporan.php"
class="<?= basename($_SERVER['PHP_SELF']) == 'laporan.php' ? 'active' : '' ?>">

<i class="bi bi-file-earmark-text"></i>
Data Laporan

</a>

</li>

<li>

<a href="grafik.php"
class="<?= basename($_SERVER['PHP_SELF']) == 'grafik.php' ? 'active' : '' ?>">

<i class="bi bi-bar-chart-line"></i>
Grafik

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