<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'nathalieMota' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         '}lnhFFJYw?mjQiRYh_4n~NwF6.8yJ^jU4^=kr*4esof>u9==C)3y[(-oe1*Eg$,~' );
define( 'SECURE_AUTH_KEY',  'YeQ]{kD`UPe<eSq,N3Uof^+KrfS()yZ<fyFIqodf=7O(Uzn))|PNVXB+kk7miHWm' );
define( 'LOGGED_IN_KEY',    '&{+d6aE57%V3E|QDBW%Z+#S@U71ID:T8,LGGVXCulbq/oV;dMY=s=4AhI08hAIjl' );
define( 'NONCE_KEY',        'pQYQ-U*UVhj26_dK&G5*(VKw4|=&EyJ2ZtxClfD8EKl>m*E0u!(`{Fx%tjte59}]' );
define( 'AUTH_SALT',        'oakjvo/O+$*KDdEkbTMRcTbaB;7jv2_ajsHS7/5c(l:BcS[3L_cd#(40W0mlS!3~' );
define( 'SECURE_AUTH_SALT', '+I{Lu3:Aj[/B;*v`5;Qz!y;`}qlWz~ew]`N]uHEYxhiU);0e`:]N-3pjEr6DYs!p' );
define( 'LOGGED_IN_SALT',   '~)X8L0fDayMa(`vd50[ FY{&j>N ~Xp;N3LS<=P2?}%DjcC5o*Y9jK#f;J+Cp?:.' );
define( 'NONCE_SALT',       '_%C7s/$XsOs?4Zf7Iwc0s`v,Kck0Fn0-yLy.ia2U=YMu(KYo~4Nu7w@ LADJp!/L' );
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
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 1);
define('WP_MEMORY_LIMIT', '256M');


/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
