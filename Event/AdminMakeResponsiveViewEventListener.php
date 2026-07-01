<?php
/**
 * AdminMakeResponsiveViewEventListener
 *
 * baserCMS4系の管理画面および管理ツールバーをレスポンシブ化・カラーカスタマイズするためのイベントリスナー
 *
 * @package    AdminMakeResponsive
 * @subpackage Event
 * @author     HATTA (https://hattantoco.com)
 * @license    MIT License
 * @link       https://github.com/HATTANTOCO/AdminMakeResponsive
 */

class AdminMakeResponsiveViewEventListener extends BcViewEventListener {
	public $events = [
		'beforeLayout',
	];

	public function beforeLayout(CakeEvent $event) {
		$View = $event->subject();
		
		App::import('Model', 'AdminMakeResponsive.AdminMakeResponsive');
		$_setdatas = new AdminMakeResponsive();
		$setdatas = $_setdatas->getSetdatas();

		// 設定フラグの取得
		$responsiveEnabled = (isset($setdatas['flg_enable']) && $setdatas['flg_enable'] == 1);
		$colorEnabled = (isset($setdatas['admin_color_enable']) && $setdatas['admin_color_enable'] == 1);

		// 両方の機能が無効な場合は処理を終了
		if (!$responsiveEnabled && !$colorEnabled) {
			return;
		}

		// 現在のテーマが 'admin-third' かどうかを判定
		$isAdminThird = (Configure::read('BcSite.admin_theme') === 'admin-third' || 
		                 (isset($this->BcBaser->siteConfig['admin_theme']) && $this->BcBaser->siteConfig['admin_theme'] === 'admin-third'));

		$AdminMakeResponsive = '';
		$View->start('admin_make_responsive');

		// ユーザーの状態（ログイン・ログオフ）およびテーマに応じたアセットの読み込み
		if (BcUtil::loginUser()) {
			// --- ログイン時 ---
			if ($isAdminThird) {
				if (BcUtil::isAdminSystem()) {
					// admin-third：管理画面用アセット
					if ($responsiveEnabled) {
						$AdminMakeResponsive .= $View->element('AdminMakeResponsive.admin/admin_make_responsive_addfiles', ['setdatas' => $setdatas]);
					}
					if ($colorEnabled) {
						$AdminMakeResponsive .= $View->element('AdminMakeResponsive.admin/admin_make_responsive_addcolorfiles', ['setdatas' => $setdatas]);
					}
				} else {
					// admin-third：ユーザー画面上の管理ツールバー用アセット
					if ($responsiveEnabled) {
						$AdminMakeResponsive .= $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles', ['setdatas' => $setdatas]);
					}
					if ($colorEnabled) {
						$AdminMakeResponsive .= $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addcolorfiles', ['setdatas' => $setdatas]);
					}
				}
			} elseif ($responsiveEnabled) {
				// admin-second：管理画面・管理ツールバー共通アセット
				$AdminMakeResponsive .= $View->element('AdminMakeResponsive.admin/admin_go_responsive_addfiles', ['setdatas' => $setdatas]);
			}
		} else {
			// --- ログオフ時（ログイン画面対象） ---
			if ($isAdminThird) {
				if ($responsiveEnabled) {
					$AdminMakeResponsive .= $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles', ['setdatas' => $setdatas]);
				}
				if ($colorEnabled) {
					$AdminMakeResponsive .= $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addcolorfiles', ['setdatas' => $setdatas]);
				}
			} elseif ($responsiveEnabled) {
				// admin-second：ログイン画面用アセット
				$AdminMakeResponsive .= $View->element('AdminMakeResponsive.admin/admin_go_responsive_toolbar_addfiles', ['setdatas' => $setdatas]);
			}
		}

		$View->end();

		// 該当するCSSファイルが存在する場合のみビューに追加
		if (!empty($AdminMakeResponsive)) {
			$View->append('css', $AdminMakeResponsive);
		}
	}
}
