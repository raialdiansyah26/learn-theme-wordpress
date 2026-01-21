<?php 
// Memanggil file header.php
get_header();
?>

<main>
    <!-- Container utama untuk daftar post -->
    <div class="post-list">
    
        <?php
        // Mengecek apakah Wordpress menemukan post di database
        if ( have_posts() ) {

            // Looping selama masih ada post
            while ( have_posts() ) {

                // Menyiapkan 1 post untuk ditampilkan
                // (Judul, konten, thumbnail, dll)
                the_post();
                ?>

                <!-- Satu artikel / satu post -->
                <article class="post-item">

                    <?php
                    // Mengecek apakah post ini punya Feature Image
                    if ( has_post_thumbnail() ) { ?> 
                        <div class="post-thumbnail">
                            <?php 
                            // Menampilkan Feature Image ukuran medium 
                            the_post_thumbnail( 'medium' ); ?>
                        </div>
                    <?php } ?>

                    <!-- Judul post -->
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php 
                            // Menampilkan judul post
                            the_title(); ?>
                        </a>
                    </h2>

                    <!-- Ringkasan konten post -->
                    <div class="post-excerpt">
                        <?php 
                        // Menampilkan excerpt (ringkasan otomatis)
                        the_excerpt(); ?>
                    </div>

                </article>

                <?php
            } //End while

        } else {
            // Jika tidak ada post sama sekali
            echo '<p>Tidak ada konten</p>';
        } //End if
        ?>

    </div>
</main>

<?php 
// Memanggil file footer.php
get_footer(); ?>