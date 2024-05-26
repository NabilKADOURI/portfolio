# Configuration de mon projet ⚙️

## Pré requis

Avant de créer mon projet, j'ai installer :

- `Composer`: `$composer install`
- `Scoop`:
  `Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser`
  `Invoke-RestMethod  -Uri https://get.scoop.sh | Invoke-Expression`
- `Symfony client: $scoop install symfony-cli`

## Service d'envoi d'email : Mailtrap

J'ai utiliser un serveur SMTP sortant afin d'assurer l'envoie de mail au utilisateur.

Pour ce faire il à fallut s'assurer d'avoir installé Docker :
[Docker](https://docs.docker.com/desktop/install/windows-install/).

J'ai ensuite lancé la commande suivante:
`docker run -d --name=mailtrap -p 8025:80 -p 1025:25 eaudeweb/mailtrap`

ainsi que le docker avec :
`docker start mailtrap`

Pour acceder à l'interface utilisateur j'ai indiqué dans la barre `127.0.0.1:8025` pour pouvoir se connecter avec les informations suivantes :

- Identifiant : mailtrap
- Mot de passe : mailtrap

Et pour terminer j'ai ajouté dans le fichier `.env.local` la configuration du `Mailer` :
`MAILER_DSN=smtp://127.0.0.1:1025`

## Lancement du projet

J'ai installer le projet symfony avec la version 6.4 et webapp pour bénéficier d'un pack de composant.Pour cela j'ai utiliser le binaire de Sumfony grâce à la commande :

`symfony new my_project_directory --version=6.4 --webapp`

lancement du serveur :

`Symfony serve --no -tls`
