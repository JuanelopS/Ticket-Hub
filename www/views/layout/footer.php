</main>
</div> <!-- end div.container -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>Información</h3>
            <ul>
                <li><a href="#">Acerca de nosotros</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Términos y condiciones</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Soporte</h3>
            <ul>
                <li><a href="#">Centro de ayuda</a></li>
                <li><a href="#">Preguntas frecuentes</a></li>
                <li><a href="#">Ticket de soporte</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Síguenos</h3>
            <div class="footer-social-icons">
                <a href="#"><i data-feather="facebook"></i></a>
                <a href="#"><i data-feather="twitter"></i></a>
                <a href="#"><i data-feather="instagram"></i></a>
                <a href="#"><i data-feather="linkedin"></i></a>
            </div>
        </div>
    </div>
    <p>© <?= date("Y") ?> Todos los derechos reservados</p>
</footer>

<script>
    feather.replace()
</script>
<?php if (isset($tables)) : ?>
    <script src='../../assets/js/tables.js'></script>
<?php endif; ?>
<?php if (isset($ticket_response)) : ?>
    <script src='../../assets/js/response.js'></script>
<?php endif; ?>
</body>

</html>