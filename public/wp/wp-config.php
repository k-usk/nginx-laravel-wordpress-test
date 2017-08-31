<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'wp_db');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'wp_user');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'wp_passwd');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bGzV{uuGJi>@QK[&&7|]{`ZuOLYTo&Tm.G09i^K=|cO[:4+*fI(-iU (P&^>b`,S');
define('SECURE_AUTH_KEY',  'jHe9W}|.4S#)HX591Dbvj-vD,m*|#Nh}J.u(mXOsgM];~Mi,Oa@E(*s#dS-vt,>g');
define('LOGGED_IN_KEY',    '`;r?6-brd8UuY9sc!&N3IcYp,^YI-H!,hQ$G)Zbs<-D`?Rkz.-^o<O}ovXlh035f');
define('NONCE_KEY',        '/<TDbk?T;.%Vdvc3/-t `vRr0pf1]*:!~9GV.npSJ3+|  #Z^hSfKCzj-h`@T Da');
define('AUTH_SALT',        '.8Fsr!%;-hC@5dqr-Mm[1Ac9GM>)*}|;YJ.Oy7iU0Cy-MiAZ_;6x~]I5qcm LJ3,');
define('SECURE_AUTH_SALT', '$?^47ee)pwCI-y:G-Vv.ZiwQ$4?OkZL,&Id@9#S3RaUDFkR#st7QSal27#=(Ib]?');
define('LOGGED_IN_SALT',   'G5mNH91d]<c0fRt),%m*3Iy2$@qLU}jKadpP+k$lL(J=Hjo0h`fI~wMDlK=o=|tU');
define('NONCE_SALT',       'CV-*J~Wb?RvN>0Y~3@OPRlKgTu)8iM-9Efyj-~vxAnP*>peca|BqDSY57}DP--5R');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
