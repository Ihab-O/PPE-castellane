<center>
<form method="post" action="">
    <div class="row">
        <div class="col-md-10 mt-5">
            <div class="card">
                <div class="login-box">
                    <div class="login-snip">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                        <label for="tab-1" class="tab"> Connexion </label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up">
                        <label for="tab-2" class="tab"> Inscription </label>
                        <div class="login-space">
                            <div class="login">
                                <div class="group"><label for="user" class="label"> Utilisateur </label>
                                    <input id="user" name="email" type="text" class="input" placeholder="Entrer votre email">
                                </div>
                                <div class="group">
                                    <input id="pass" name="mdp" type="password" class="input" data-type="password" placeholder="Entrer votre mots de passe">
                                </div>
                                <div class="group"><input type="submit" class="button" name="seconnecter" value="Connexion"></div>
                                <div class="hr"></div>
                            </div>
                        </form>
                        <form method="post" action="">
                            <div class="sign-up-form">
                                <div class="group">
                                    <label for="user" class="label"> Utilisateur </label>
                                    <input id="user" type="text" class="input" name="email" placeholder="Entrer votre adresse mail">
                                </div>
                                <div class="group">
                                    <input id="user" type="text" class="input" name="nom" placeholder="Entrer votre nom">
                                </div>
                                <div class="group">
                                    <input id="user" type="text" class="input" name="prenom" placeholder="Entrer votre prénom">
                                </div>
                                <div class="group">
                                    <input id="pass" type="password" class="input" name="mdp" data-type="password" placeholder="Entrer votre mots de passe">
                                </div>
                                <div class="group">
                                    <input id="pass" type="password" class="input" data-type="password" placeholder="Confirmer votre mots de passe">
                                </div>
                                <div class="group">
                                    <input type="hidden" name="droits" value="etudiant">
                                    <input type="submit" class="button" name="sinscrire" value="S'INSCRIRE">
                                </div>
                                <div class="hr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</center>