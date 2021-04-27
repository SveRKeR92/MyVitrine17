<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'nom de la base' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!Rv-6<LsfL{6;%d(Q!RUh%k*r8&Z}Rj@0&lzw#d:=q3$kP|0=--:%A0inA!|NLut' );
define( 'SECURE_AUTH_KEY',  'A;yX)nHjQ>r0otl<abs7F1i:Wye7EuGa.1cgA7Uy^_6]Y&G;tgr>my}fSmUlsKex' );
define( 'LOGGED_IN_KEY',    '+KfG~V}Q(5X/vHF5Z-XI2h((wn*z,i`tobR)eyuuq;CdZ1Y2Uy]/uNSZ$6IMo83}' );
define( 'NONCE_KEY',        '2F)4gDxxZ1O<VL}xgr`n9l&>%OH.30g#ZOoZ{D[~Li9L;JAZiwRAs#F*(&?bPjvl' );
define( 'AUTH_SALT',        'mw<YVv/bryg-k-{bAn:80^8OEh{+|vF<KyQfyFW6iwjT4tEIQdC0/mf2f33~(k)l' );
define( 'SECURE_AUTH_SALT', 'Ul:qf6ojdxL&9%.`)3J^t#43{W>;-Bx&bWqBSI@QT=-LCbhw.i-MGY>Ez#qmSDib' );
define( 'LOGGED_IN_SALT',   '!Se!%}g?%R7vYmj1B/F{Y #=QzOP@e5>B1!{y;G(m1H25CD->,s%Ypp=ZH6X6g<u' );
define( 'NONCE_SALT',       '%VwqN=lj8[O3Ilz`>X<> MnOb8A&w4UED?;w7a)+/s$+k 3Je(k~Wr,&YW!E MBU' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
