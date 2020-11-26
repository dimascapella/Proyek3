<?= $this->extend('Layout/baseTemplate'); ?>

<?= $this->section('content'); ?>
<nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo">
            <a href="<?php base_url() ?>/menu/" class="nav-link">
                <span class="link-text logo-text">Menu</span>
                <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="angle-double-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x">
                    <g class="fa-group">
                        <path fill="currentColor" d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z" class="fa-primary"></path>
                        <path fill="currentColor" d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z" class="fa-primary"></path>
                    </g>
                </svg>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php base_url() ?>/menu/" class="nav-link">
                <i class="fas fa-chart-line navbar-icons"></i>
                <span class="link-text">Halaman Utama</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php base_url() ?>/menu/list_product" class="nav-link">
                <i class="fas fa-clipboard-list navbar-icons"></i>
                <span class="pl-2 link-text">Daftar Makanan</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php base_url() ?>/menu/add_product" class="nav-link">
                <i class="fas fa-plus-square navbar-icons"></i>
                <span class="pl-1 link-text">Tambah Makanan</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php base_url() ?>/menu/predict" class="nav-link">
                <i class="fas fa-search-dollar navbar-icons"></i>
                <span class="pl-05 link-text">Prediksi</span>
            </a>
        </li>

        <li class="nav-item" id="themeButton">
            <a href="<?php base_url() ?>/LoginController/logout_action" class="nav-link">
                <i class="fas fa-sign-out-alt navbar-icons"></i>
                <span class="link-text">Log Out</span>
            </a>
        </li>
    </ul>
</nav>
<?= $this->endSection(); ?>