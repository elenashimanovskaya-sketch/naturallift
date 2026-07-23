<footer class="site-footer">
    <div class="container footer-inner">
        <div class="footer-col">
            <span class="product-promo__kicker">Разделы</span>
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a></li>
                <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Обо мне</a></li>
                <li><a href="<?php echo esc_url( naturallift_get_page_url( 'cosmetics' ) ); ?>">Магазин косметики</a></li>
                <li><a href="<?php echo esc_url( naturallift_get_page_url( 'diagnostika-kozhi' ) ); ?>">Диагностика лица</a></li>
            </ul>
        </div>
        
        <div class="footer-col footer-col--center">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                <img src="https://naturallift.store/wp-content/uploads/2026/05/logo-ЕО-без-фона-пнг.png" alt="Natural Lift">
            </a>
        </div>

        <div class="footer-col">
            <span class="product-promo__kicker">Юридическая информация</span>
            <ul>
                <li><a href="https://silvercream.net/privacy">Политика конфиденциальности</a></li>
                <li><a href="https://silvercream.net/dogovor_oferty">Договор оферты</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> Natural Lift. Все права защищены.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
