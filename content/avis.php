<section id="avis" class="mb-5">
    <h2 class="section-title">Laissez votre avis</h2>
    <div class="section-content">
        <form action="php/submit_comment.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Commentaire</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <h2 class="section-title">Commentaires des Visiteurs</h2>
    <div class="section-content" id="comments">
        <?php
        include 'php/fetch_comments.php';
        ?>
    </div>
</section>
