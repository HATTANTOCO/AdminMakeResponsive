<?php
/**
 * AdminMakeResponsiveController
 *
 * baserCMS4系の管理画面および管理ツールバーの設定を管理するコントローラー
 *
 * @package    AdminMakeResponsive
 * @subpackage Controller
 * @author     HATTA
 * @license    MIT License
 * @link       https://github.com/HATTANTOCO/AdminMakeResponsive
 */

class AdminMakeResponsiveController extends AppController {

	public $uses = ['Content', 'AdminMakeResponsive.AdminMakeResponsive'];

	public $components = ['BcAuth', 'Cookie', 'BcAuthConfigure'];

	/**
	 * 設定画面の初期表示および更新処理
	 *
	 * @return void
	 */
	public function admin_index() {
		if (empty($this->request->data)) {
			// 初期表示：設定データの取得
			$this->data = $this->AdminMakeResponsive->find('first');
		} else {
			// 更新処理：カラー設定の生成
			$this->AdminMakeResponsive->addColorConfig($this->request->data);
			$this->AdminMakeResponsive->addColorConfigToolbar($this->request->data);
			
			// データの保存（saveの引数に直接データを渡すのが安全です）
			if ($this->AdminMakeResponsive->save($this->request->data)) {
				$this->setMessage('管理画面 レスポンシブ化プラグインの設定を更新しました。', false, true);
				clearViewCache();
				$this->redirect(['controller' => 'admin_make_responsive', 'action' => 'index']);
				return; // リダイレクト後は確実に処理を終了
			} else {
				$this->setMessage('エラーが発生しました。入力内容を確認してください。', true);
			}
		}

		$this->set('flg_enable', $this->AdminMakeResponsive->getEnable());
		$this->pageTitle = '管理画面 レスポンシブ化設定';
		$this->render('index');	
	}
}
