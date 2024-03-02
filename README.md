Consignes de l'exercice

Contexte du projet
Il s'agit de faire une interface pour prendre les réservations des festivaliers, et faire en sorte que chacun puisse consulter ou annuler sa réservation, et que les admins puissent toutes les voir. Le formulaire vous est fourni, vous devez l'animer et en traiter les informations.
Vous utiliserez le HTML fourni en lui ajoutant de JS et du CSS, puis vous réaliserez le traitement et l'enregistrement des données en back.

​

Niveau 1 (suffisant pour valider les compétences)

​

COTÉ FRONT

Vous devez mettre en forme et animer les sections, pour les faire apparaitre au clic sur suivant.
Vous devrez vérifier la valeur des champs avant soumission, animer les transitions des questions, ...
Faire une page admin, depuis laquelle on pourra voir la liste de toutes les réservations. Pour y accéder, il suffira de rentrer le bon mot de passe.
​

COTÉ BACK

Vous recevez les données en post, vous devez les analyser avant toute utilisation en back (sécurité, formatage, ...)
Si le formulaire n'est pas complet, on le renvoie, avec une erreur.
Vous traiterez les données reçues, et lorsque tout le formulaire sera rempli et soumis, alors vous l'enregistrerez dans un fichier CSV.
Une fois que tout est validé, vous renvoyez à l'utilisateur un message récapitulatif avec ses informations choisies, et le total du prix à payer.
​

​

Niveau 2

L'utilisateur pourra, en renseignant son adresse mail et son mot de passe, retrouver sa réservation.
le mot de passe sera chiffré
les informations de l'utilisateur ne seront pas stockées dans le même fichier que les réservations, mais dans un second fichier CSV.
Chaque utilisateur aura un identifiant unique.
Dans le fichier CSV des réservations, on viendra ajouter l'identifiant qui permettra de retrouver toutes les réservations d'un utilisateur.
L'utilisateur pourra, une fois connecté, voir sa/ses réservation(s), la supprimer, et se déconnecter.
​

Niveau 3

Ajouter, dans le fichier CSV des utilisateurs, une information pour savoir si l'utilisateur est admin ou non.
En fonction de son rôle, l'utilisateur pourra, une fois connecté et s'il est admin, accéder à la liste de toutes les réservations, en annuler quelques unes s'il le souhaite, et régler le nombre maximum de réservations acceptable pour le prochain festival.
Il sera aussi possible de changer le prix des tarifs des jours (et même les options si vous êtes très en avance), en enregistrant tout ça dans un troisième fichier CSV.
On pourra enfin créer 2 tarifs différents, un préférentiel qui sera accessible dans un nombre X de places en préventes, valables jusqu'à telle date, et le second accessible dans tous les cas.
