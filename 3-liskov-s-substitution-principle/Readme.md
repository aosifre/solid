# Les objets dans un programme doivent être remplaçables par des instances de leur sous-type sans pour autant altérer le bon fonctionnement du programme.

L’idée du principe est que les enfants ne peuvent pas faire plus ou moins que leur parent.

Voici les **4 conditions** que tu dois remplir pour être conforme au Liskov’s Substitution Principle.

- La signature des fonctions (paramètres et retour) doit être identique entre l’enfant et le parent.
- Les paramètres de la fonction de l’enfant ne peuvent pas être plus nombreux que ceux du parent.
- Le retour de la fonction doit retourner le même type que le parent.
- Les exceptions retournées doivent être les mêmes.