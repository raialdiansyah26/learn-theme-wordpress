<?php get_header(); ?>

<main class="error-404">

    <h1>404</h1>
    <h2>Halaman tidak ditemukan</h2>

    <p>Maaf, halaman yang anda cari tidak tersedia.</p>

    <div class="error-actions">
        <a href="<?php echo home_url(); ?>">Kembali ke beranda</a>
    </div>

    <div class="error-research">
        <?php get_search_form(); ?>
    </div>

</main>

<?php get_footer(); ?>