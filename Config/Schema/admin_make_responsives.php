<?php 
/**
 * alter_admin_make_responsives
 * 
 * AdminMakeResponsive スキーマ
 * 
 * @package    AdminMakeResponsive
 * @subpackage Schema
 * @author     HATTA (https://hattantoco.com)
 * @license    MIT License
 * @link       https://github.com/HATTANTOCO/AdminMakeResponsive
 */

class AdminMakeResponsivesSchema extends CakeSchema {

	public $file = 'admin_make_responsives.php';

	public function before($event = []) {
		return true;
	}

	public function after($event = []) {
	}

	public $admin_make_responsives = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'],
		'flg_enable' => ['type' => 'boolean', 'null' => true, 'default' => null, 'comment' => 'レスポンシブ有効化'],
		'admin_color_enable' => ['type' => 'boolean', 'null' => true, 'default' => null, 'comment' => 'テーマカラー有効化'],
		'admin_color_main' => ['type' => 'text', 'null' => true, 'default' => null, 'comment' => 'メインカラー'],
		'admin_color_sub' => ['type' => 'text', 'null' => true, 'default' => null, 'comment' => 'サブカラー'],
		'modified' => ['type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'],
		'created' => ['type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'],
		'indexes' => [
			'PRIMARY' => ['column' => 'id', 'unique' => 1]
		],
		'tableParameters' => []
	];

}