<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'work-wp');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'c-bRtnxy &f+Pj=9w/e/7#H1N v~KzTJL{_a}(A,0#WLBWydmVkpM,R3;VE+}4-|');
define('SECURE_AUTH_KEY',  'hWKpQ1Aj=x{jv~Rd0GTi<yd1,2DTA_X+c4QE77}tt$K9VbW^6wrXZrnm6e+5]i}.');
define('LOGGED_IN_KEY',    'D#z}+Sc(xt*jPLc)B}+<QUgXzu*J 1-c&iwXx>R?+~jB1#2hPK0yCg$lanp:Ak3,');
define('NONCE_KEY',        'co@O+5WW=16oEtK$atU#0} C2ww^4/LMi,{gUi[9.P^]ic}-?#rER,LH%vD&Yte0');
define('AUTH_SALT',        'Mm5@0H1Ex&](`)u]J3sY1+]1|0iwF7&0I>l{DwH~AnC5T^k y[oeZ_+EI)8nePUL');
define('SECURE_AUTH_SALT', ';/-spo!Te!{;+n}b=Osh&Y;,QHP4sdNwWpB2fJ`/vql%VPy>NmTmcI:uv|)TCp}w');
define('LOGGED_IN_SALT',   '|}F$01l5]Q8xKBi~nlpTqERxg=3XnaxC0-M8I^Ke:fPu2vqviZSu=|>8qJ;@i<Kl');
define('NONCE_SALT',       '~TJ&5FAycE*J5Uxt)N:x,#Dn5[?=|xp>j3vT(,.d6sS-Sr+f4H& lPj&MRGw^=:)');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');