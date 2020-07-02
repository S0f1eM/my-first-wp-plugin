déclarations des fonctions

Définir une constante de version

Gérer les états du plugin

Lors du développement de vos plugins, vous devez adopter la même philosophie que WordPress. C’est-à-dire que vous devez ajouter des actions et des filtres autant que vous le pouvez. Il vaut mieux avoir trop de hooks que ne pas en avoir assez.

L’objectif des hooks est de permettre à n’importe qui d’étendre les fonctionnalités de votre plugin et de les adapter à son besoin. Pour cela, vous devez adopter deux réflexes :

– Ajouter un hook d’action avant et après une action particulière dans votre extension. Par exemple, dans WP Rocket, vous avez un hook d’action avant et après la purge des fichiers minifiés mis en cache.

Ajouter un hook pour filtrer le retour d’une fonction dès qu’elle retourne quelque chose. Par exemple, dans WP Rocket, vous pouvez modifier le contenu de toutes les règles qui sont ajoutées dans le fichier .htaccess :
