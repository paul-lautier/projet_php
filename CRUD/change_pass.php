<form action="post">
        <input type="radio" name="choix[]">admin<br>
        <input type="radio" name="choix[]">user <br>
        <input type="radio" name="choix[]">user <br>

        <label>nom d'utilisateur</label>
        <input type="text" name="username"><br>
        <label>mot de passe actuel</label>
        <input type="password" name="old_password"><br>

        <label>nouveau mot de passe</label>
        <input type="password" name="new_pass"><br>
        <label>comfirmation nouveau mot de passe</label>
        <input type="password" name="new_pass_verif"><br>

        <button type="submit">changer le mot de pass</button>
    </form>