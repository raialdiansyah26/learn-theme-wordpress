<?php 
// Memanggil file header.php
get_header();
?>

<main class="content-area">
    <div class="content">

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

        <div class="pagination">
            <?php
            the_posts_pagination( array (
                'mide_size' => 2,
                'prev_text' => '« Sebelumnya',
                'next_text' => 'Berikutnya »',
            ));
            ?>
        </div>

        <!-- portfolio -->
         <?php 
         $args = array(
            'post_type'      => 'portfolio',
            'posts_per_page' => 3,
         );

         $portfolio_query = new WP_Query($args);
        ?>

        <?php if ( $portfolio_query->have_posts() ) : ?>

        <section class="home-portfolio">
            <h2>Portfolio terbaru</h2>

            <div class="portfolio-grid">

            <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>

            <article class="portfolio-item">
                <a href="<?php the_permalink(); ?>">

                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php endif; ?>

                    <h3><?php the_title(); ?></h3>

                    <?php
                    $client = get_post_meta(get_the_ID(), '_portfolio_client', true);
                    $year   = get_post_meta(get_the_ID(), '_portfolio_year', true);
                    $tools  = get_post_meta(get_the_ID(), '_portfolio_tools', true);
                    $link  = get_post_meta(get_the_ID(), '_portfolio_link', true);

                    ?>

                    <?php if ($client || $year || $tools || $link   ) : ?>
                        <ul class="portfolio-meta">
                            <?php if ($client) : ?>
                                <li><strong>Client:</strong> <?php echo esc_html($client); ?></li>
                            <?php endif; ?>

                            <?php if ($year) : ?>
                                <li><strong>Tahun:</strong> <?php echo esc_html($year); ?></li>
                            <?php endif; ?>

                            <?php if ($tools) : ?>
                                <li><strong>Tools:</strong> <?php echo esc_html($tools); ?></li>
                            <?php endif; ?>
                        </ul>
                            <?php if ($link) : ?>
                                <a href="<?php echo esc_html($link); ?>" class="portfolio-btn"><strong>Details</strong></a>
                            <?php endif; ?>
                    <?php endif; ?>

                </a>
            </article>

            <?php endwhile; ?>

            </div>
        </section>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>

    <?php get_sidebar(); ?>

</main>

<?php 
// Memanggil file footer.php
get_footer(); ?>