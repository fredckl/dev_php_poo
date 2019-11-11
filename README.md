# La programmation orienté objet (POO)
La programmation par objet ( POO ) a été intégrée au langage PHP dans sa version 4. Mais à cette époque, le modèle objet de PHP était beaucoup trop sommaire. Nous ne pouvions réellement parler de programmation orientée objet. Les développeurs de PHP se sont alors penchés sur la question et ont amélioré ce modèle objet qui, depuis laversion 5, n'a plus rien à envier aux autres langages objets.

### Qu'est-ce qu'un objet ?
#### Définitions
Un « objet » est une représentation d'une chose matérielle ou immatérielle du réel à laquelle on associe des propriétés et des actions.

Exemple : une voiture, une personne, un personnage, un animal, un nombre ou bien un compte bancaire peuvent être vus comme des objets.

#### Attributs ou données membres
Les « attributs » (aussi appelés « données membres ») sont les caractères propres à un objet.

Exemple : Une personne, par exemple, possèdent différents attributs qui lui sont propres comme le nom, le prénom, la couleur des yeux, le sexe, la couleur des cheveux, la taille...

#### Méthodes
Les « méthodes » sont les actions applicables à un objet.

Exemple : Un objet personne dispose des actions suivantes : manger, dormir, boire, marcher, courir...

### Qu'est-ce-qu'une classe ? 
Une classe est une entité regroupant des variables et des fonctions. 
Chacune de ces fonctions aura accès aux variables de cette entité. 
Dans le cas du voiture, nous aurons une fonction rouler(). 
Cette fonction devra simplement modifier la variable $kilomètre de la voiture en fonction de la variable $vitesse. 
Une classe est donc un regroupement logique de variables et fonctions que tout objet issu de cette classe possédera.

Sachez qu'en réalité, on ne les appelle pas comme ça : il s'agit d'attributs (ou propriétés) et de méthodes.

Un attribut désigne une variable et une méthode désigne une fonction.

### Qu'est-ce-qu'une instance ?
Une instance, c'est tout simplement le résultat d'une instanciation. Une instanciation, c'est le fait d'instancier une classe. 
Instancier une classe, c'est se servir d'une classe afin qu'elle nous crée un objet. 
En gros, une instance est un objet.

Une instance est une représentation particulière d'une classe.

Lorsque l'on crée un objet, on réalise ce que l'on appelle une « instance de la classe ». 
C'est à dire que du moule, on en extrait un nouvel objet qui dispose de ses attributs et de ses méthodes. 
L'objet ainsi créé aura pour type le nom de la classe.

### Le principe d'encapsulation
L'un des gros avantages de la POO est que l'on peut masquer le code à l'utilisateur (l'utilisateur est ici celui qui se servira de la classe, pas celui qui chargera la page depuis son navigateur). Le concepteur de la classe a englobé dans celle-ci un code qui peut être assez complexe et il est donc inutile voire dangereux de laisser l'utilisateur manipuler ces objets sans aucune restriction. Ainsi, il est important d'interdire à l'utilisateur de modifier directement les attributs d'un objet.

Prenons l'exemple d'un avion où sont disponibles des centaines de boutons. Chacun de ces boutons constituent des actions que l'on peut effectuer sur l'avion. C'est l'interface de l'avion. Le pilote se moque de quoi est composé l'avion : son rôle est de le piloter. Pour cela, il va se servir des boutons afin de manipuler les composants de l'avion. Le pilote ne doit pas se charger de modifier manuellement ces composants : il pourrait faire de grosses bêtises.

Le principe est exactement le même pour la POO : l'utilisateur de la classe doit se contenter d'invoquer les méthodes en ignorant les attributs. Comme le pilote de l'avion, il n'a pas à les trifouiller. Pour instaurer une telle contrainte, on dit que les attributs sont privés.

#### Déclaration d'une classe
Nous venons de définir le vocabulaire propre à la programmation orientée objet. Entrons à présent dans le vif du sujet, c'est à dire la déclaration et l'instanciation d'une classe. Nous allons déclarer une classe Personne qui nous permettra ensuite de créer autant d'instances (objets) de cette classe que nous le souhaitons.

Exemple : création d'une classe Db pour l'accès à la base de données.

```php
<?php

class Db {}

```

Ajouter des attributs dans la classe :
```php
<?php

class Db 
{
    /**
     * Définition de l'hôte
     **/
    private $host = null;
    /**
     * Définition du nom d'utilisateur à l'accès à la base de données
     **/
    private $user = null;
    /**
     * Définition du mot de passe pour l'accès à la base de données
     **/
    private $password = null;
}

```

Nous venons de définir quelques attributs dans la classe qui nous permmettra plus tard de réaliser une connexion à la base de données.

A ce stade, tous nos attibuts n'ont aucune valeur. Nous devons donc créer une fonction qui enrichira ces attributs.

Toutes les classes possédent une une fonction spéciale qui permet de construire un nouvel objet après l'instanciation de celle-ci.

Voyons comment nous pouvons l'utiliser pour quelle réalise ce que nous souhaitons faire.
```php
<?php

class Db 
{
    /**
     * Définition de l'hôte
     **/
    private $host = null;
    /**
     * Définition de la base de données
     **/
    private $dbname = null;
    /**
     * Définition du nom d'utilisateur à l'accès à la base de données
     **/
    private $user = null;
    /**
     * Définition du mot de passe pour l'accès à la base de données
     **/
    private $password = null;
    
    /**
     * Définition de la future instance PDO
     **/
    private $pdo = null;

    public function __construct($dbname, $user, $password, $host = 'localhost') 
    {
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
    }

    /**
     * Instanciation et récupétation d'une nouvelle instance PDO
     */
    public function getPdo ()
    {
        $this->pdo = new PDO('mysql:host='. $this->host . ';dbname=' . $this->dbname , $this->user, $this->password);
        return $this->pdo; 
    }
}

?>
```

A ce stade, nous venons de créer une classe permettant de créer un nouvel objet PDO.
Nous devons encore instancier celle si pour pouvoir l'utiliser, comme ceci.

```php
<?php

class Db {
    // ... 
}
$db = new Db('monsite', 'root', 'secret', 'localhost');

?>
```

Il nous reste plus qu'a tester la récupération des utilisateurs pour voir si tout fonctionne correctement
> Pour le test, vous devez avoir une table contenant les utilisateurs. 
> Si ce n'est pas le cas, vous pouvez utiliser la table de votre choix.

```php
<?php
// ... code précédant 
$pdo = $db->getPdo();
$users = $pdo->query("SELECT * FROM users");
foreach ($users as $user) {
    var_dump($user['email']);
}
?>
```

En conclusion, nous venons de créer une simple classe permettant de faire une instanciation PDO. 

Pour aller plus loin, nous pourrions imaginer créer une classe par tables de votre base de données qui appelerais cette classe Db.

Exemple : 
```php
<?php

class DB
{
    // .... définitions
}

class UsersTable
{
    /**
     * Instance de la classe Db
     */ 
    private $db = null;
    
    /**
     * Nom de la base de données
     */
    private $table = 'users';
    
    
    public function __construct($db) 
    {
        $this->db = $db;
    }

    public function findAll ()
    {
        $pdo = $this->db->getPdo();
        return $pdo->query(sprintf("SELECT * FROM %s", $this->table));
    }
}

?>
```

Il nous reste a tester si tout fonctionne correctement.

```php
<?php
// ... code
$usersTable = new UsersTable($db);
$allUsers = $usersTable->findAll();
foreach ($allUsers as $allUser) {
    var_dump($allUser['email']);
}
?>
```

Vous devriez avoir le même résultat qu'auparavant mais nous pouvous constater que noter code est mieux organiser et plus simple à maintenir. 




