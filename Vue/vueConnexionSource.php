<?php $this->titre = "Connexion"; ?>

<article>
    <br />
    <h1>Se Connecter</h1>
    <br />
    <form action="index.php?action=connexion" method="POST">
        <div>
            <label for="login">Login :</label>
            <input type="text" id="login" name="login" placeholder ="Login" required >
        </div>
        <div>
            <label for="motDePasse">Mot de Passe :</label>
            <input type="password" name="motDePasse" placeholder="Mot de Passe" required />
        </div>
        <button type="submit" name="connecter">Se connecter</button>
        <button type="reset" name="reinitialiser">Réinitialiser</button>
    </form>

</article>
