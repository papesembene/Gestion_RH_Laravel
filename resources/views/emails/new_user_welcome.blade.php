<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur notre application !</title>
</head>
<body>
<h2>Bienvenue sur notre application !</h2>
<p>Bonjour {{ $user->name }},</p>
<p>Email : {{ $user->email }},</p>
<p>Password : {{ $user->password }},</p>
<p>Votre compte sur notre application a été créé avec succès. Nous sommes ravis de vous accueillir parmi nous !</p>
<p>Si vous souhaitez modifier vos informations ou mettre à jour votre profil, vous pouvez le faire en suivant ce lien :</p>
<p><a href="{{ route('profile.edit', ['token' => Crypt::encrypt($user->id)]) }}">Modifier mes informations</a></p>
<p>Si vous avez des questions ou avez besoin d'aide, n'hésitez pas à nous contacter.</p>
<p>Cordialement,<br> L'équipe de l'application</p>
</body>
</html>
