# NoteFlow

Application web de gestion de notes personnelles développée en PHP natif selon une architecture MVC. Chaque utilisateur dispose de son propre espace sécurisé pour créer, consulter, modifier et supprimer ses notes personnelles.

---

## Fonctionnalités

### Authentification

* Inscription avec nom, email, mot de passe et confirmation
* Mot de passe sécurisé avec `password_hash()`
* Connexion avec vérification via `password_verify()`
* Déconnexion avec destruction de la session
* Réinitialisation du mot de passe par token unique
* Expiration du token après 1 heure
* Mise à jour du profil avec confirmation du mot de passe actuel

### Gestion des notes

* Création de notes
* Consultation de toutes les notes personnelles
* Affichage détaillé d'une note
* Modification d'une note
* Suppression d'une note avec confirmation
* Isolation complète des données entre utilisateurs

### Sécurité

* Pages protégées par authentification
* Vérification de propriété des notes avant affichage, modification ou suppression
* Protection contre les injections SQL grâce aux requêtes préparées PDO
* Protection contre les attaques XSS avec `htmlspecialchars()`
* Sessions PHP sécurisées

---

## Technologies utilisées

* PHP 8+
* MySQL
* PDO
* HTML5
* CSS3
* Architecture MVC

---

## Structure du projet

```text
NoteFlow/
├── config/
│   └── Database.php
│
├── controllers/
│   ├── AuthController.php
│   ├── NoteController.php
│   └── ProfileController.php
│
├── core/
│   ├── Auth.php
│   └── Router.php
│
├── models/
│   ├── User.php
│   └── Note.php
│
├── public/
│   ├── css/
│   ├── images/
│   └── js/
│
├── views/
│   ├── auth/
│   │   ├── login.php
│   │   ├── register.php
│   │   ├── forgot_password.php
│   │   └── reset_password.php
│   │
│   ├── notes/
│   │   ├── index.php
│   │   ├── create.php
│   │   ├── show.php
│   │   └── edit.php
│   │
│   ├── profile/
│   │   └── profile.php
│   │
│   └── layout/
│       ├── header.php
│       └── footer.php
│
├── database.sql
├── index.php
└── README.md
```

---

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/elmouhilih044-a11y/NoteFlow.git
cd NoteFlow
```

### 2. Importer la base de données

Créer une base de données MySQL puis importer le fichier SQL :

```bash
mysql -u root -p < database.sql
```

Ou via phpMyAdmin :

* Créer une base de données nommée `NoteFlow`
* Importer le fichier `database.sql`

Le fichier `database.sql` crée automatiquement les tables `users` et `notes`, et insère deux comptes de test avec quelques notes associées (voir section *Comptes de test* ci-dessous).

---

### 3. Configurer la connexion

Modifier les informations de connexion dans :

```text
config/Database.php
```

Exemple :

```php
private static $instance = null;

public static function getInstance()
{
    if (self::$instance === null) {
        self::$instance = new PDO(
            "mysql:host=localhost;dbname=NoteFlow",
            "root",
            ""
        );
    }

    return self::$instance;
}
```

---

### 4. Lancer l'application

Avec XAMPP :

```text
htdocs/NoteFlow
```

Puis accéder à :

```text
http://localhost/NoteFlow/index.php
```

Ou avec le serveur PHP intégré :

```bash
php -S localhost:8000
```

Puis ouvrir :

```text
http://localhost:8000/index.php
```

---

## Comptes de test

Le fichier `database.sql` insère automatiquement deux utilisateurs de test, chacun avec quelques notes, pour permettre une démo immédiate sans passer par l'inscription.

| Email | Mot de passe |
| --- | --- |
| hajar@example.com | password123 |
| sara@example.com | azerty123 |

Ces deux comptes sont utiles pour tester directement la vérification du 403 : connecte-toi avec un compte, puis essaie d'accéder à une note appartenant à l'autre utilisateur via l'URL `index.php?page=notes&action=show&id=X` — l'accès doit être refusé.

---

## Base de données

### Table users

| Champ              | Type      |
| ------------------ | --------- |
| id                 | INT       |
| name               | VARCHAR   |
| email              | VARCHAR   |
| password           | VARCHAR   |
| reset_token        | VARCHAR   |
| reset_token_expiry | DATETIME  |
| created_at         | TIMESTAMP |

### Table notes

| Champ      | Type      |
| ---------- | --------- |
| id         | INT       |
| user_id    | INT       |
| title      | VARCHAR   |
| content    | TEXT      |
| created_at | TIMESTAMP |

---

## Architecture MVC

### Models

Responsables de l'accès aux données :

#### User

* findByEmail()
* findById()
* create()
* update()
* findByToken()
* saveResetToken()
* updatePassword()

#### Note

* findByUser()
* findById()
* create()
* update()
* delete()

---

### Controllers

Responsables de la logique métier.

#### AuthController

* register()
* login()
* logout()
* forgotPassword()
* resetPassword()

#### NoteController

* index()
* create()
* show()
* edit()
* delete()

#### ProfileController

* update()

---

### Views

Responsables de l'affichage des interfaces utilisateur.

* Authentification
* Gestion des notes
* Gestion du profil
* Layout commun (Header / Footer)

---

## Mesures de sécurité

### Authentification

Les mots de passe sont hashés avec :

```php
password_hash($password, PASSWORD_DEFAULT);
```

Vérification :

```php
password_verify($password, $user['password']);
```

---

### Requêtes SQL

Toutes les requêtes utilisent des Prepared Statements PDO :

```php
$stmt = $db->prepare(
    "SELECT * FROM users WHERE email = ?"
);

$stmt->execute([$email]);
```

Aucune concaténation de variables SQL n'est utilisée.

---

### Protection des notes

Chaque action sur une note vérifie son propriétaire :

```php
if ($note['user_id'] != Auth::id()) {
    http_response_code(403);
    exit('Accès interdit');
}
```

---

### Réinitialisation du mot de passe

Token sécurisé :

```php
$token = bin2hex(random_bytes(32));
```

Le token :

* Expire après 1 heure
* Est invalidé après utilisation
* Est vérifié avant toute réinitialisation

---

### Protection XSS

Affichage sécurisé :

```php
htmlspecialchars($note['title']);
htmlspecialchars($note['content']);
```

---

## Parcours de démonstration

### Authentification

1. Créer un compte (ou utiliser un compte de test)
2. Se connecter
3. Modifier son profil
4. Se déconnecter

### Gestion des notes

1. Créer une note
2. Afficher une note
3. Modifier une note
4. Supprimer une note

### Réinitialisation du mot de passe

1. Accéder à "Mot de passe oublié"
2. Générer un token
3. Réinitialiser le mot de passe
4. Se reconnecter

### Sécurité

1. Se connecter avec le compte hajar@example.com
2. Tenter d'accéder à une note appartenant à sara@example.com
3. Vérifier le retour HTTP 403

---

## Auteur

Projet réalisé par **Hajar Elmouhili** dans le cadre d'un projet PHP MVC.

---

© 2026 - NoteFlow