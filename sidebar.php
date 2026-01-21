<?php
// Mengecek apakah sidebar punya widget
if ( is_active_sidebar('sidebar-1') ) : 
?>

<aside class="sidebar">
    <?php
    // Menampilkan widget dari dashboard
    dynamic_sidebar('sidebar-1');
    ?>
</aside>

<?php endif; ?>