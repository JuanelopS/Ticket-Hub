<div class="row">
    <div class="column column-50 column-offset-25">
        <h2>Content</h2>
        <?php if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == 1): ?>
            <a href='user/list'>User list</a>
        <?php endif; ?>
    </div>
</div>
