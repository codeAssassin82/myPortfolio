<?php
/**
 *
 * Footer
 * @since 1.0.0
 * @version 1.0.0
 *
 */
?>

    <!-- FOOTER-->
    <section id="footer_info">
        <p class="p-copyright align-center"><?php echo esc_html(cs_get_option( 'footer_text' )); ?></p>
    </section>
    <!-- /FOOTER-->

<?php print cs_get_option( 'analitycs_code' ); ?>
<?php wp_footer(); ?>

</body>
</html>