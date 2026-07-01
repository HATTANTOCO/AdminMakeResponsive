<?php
/**
 * AdminMakeResponsive
 *
 * 管理画面レスポンシブ化プラグインの設定・カラー設定ファイル生成を管理するモデル
 *
 * @package    AdminMakeResponsive
 * @subpackage Model
 * @author     HATTA <https://hattantoco.com>
 * @license    MIT License
 * @link       https://github.com/HATTANTOCO/AdminMakeResponsive
 */

class AdminMakeResponsive extends AppModel {

	/**
	 * モデル名
	 *
	 * @var string
	 */
	public $name = 'AdminMakeResponsive';

	/**
	 * 設定の有効状態を取得
	 *
	 * @return mixed 有効フラグ(1) または null
	 */
	public function getEnable() {
		$data = $this->find('first');
		if (isset($data['AdminMakeResponsive']['flg_enable'])) {
			return $data['AdminMakeResponsive']['flg_enable'];
		}
		return null;
	}

	/**
	 * 設定データ一式を取得
	 *
	 * @return mixed 設定データの配列 または null
	 */
	public function getSetdatas() {
		$data = $this->find('first');
		if (isset($data['AdminMakeResponsive'])) {
			return $data['AdminMakeResponsive'];
		}
		return null;
	}

	/**
	 * 管理画面用のカスタムカラー設定CSSを生成・保存
	 * 
	 * @param array $data 送信された設定データ
	 * @return bool ファイルが存在しない場合のみfalse
	 */
	public function addColorConfig($data) {
		$configPath = APP . 'Plugin' . DS . 'AdminMakeResponsive' . DS . 'Lib' . DS . 'addcolorconfig.css';
		if (!file_exists($configPath)) {
			return false;
		}

		$File = new File($configPath);
		$config = $File->read();
		$settings = [
			'ADMINMAIN' => 'admin_color_main',
			'ADMINSUB' => 'admin_color_sub'
		];

		foreach ($settings as $key => $setting) {
			if (empty($data['AdminMakeResponsive'][$setting])) {
				$config = preg_replace("/\n.+?" . $key . ".+?\n/", "\n", $config);
			} else {
				$config = str_replace($key, '#' . $data['AdminMakeResponsive'][$setting], $config);
			}
		}

		$outputPath = APP . 'Plugin' . DS . 'AdminMakeResponsive' . DS . 'webroot' . DS . 'css' . DS . 'admin' . DS . 'addcolor_3rd.css';
		$OutputFile = new File($outputPath, true, 0644);
		$OutputFile->write($config);
		$OutputFile->close();
	}

	/**
	 * 管理ツールバーおよびログイン画面用のカスタムカラー設定CSSを生成・保存
	 * 
	 * @param array $data 送信された設定データ
	 * @return bool ファイルが存在しない場合のみfalse
	 */
	public function addColorConfigToolbar($data) {
		$configPath = APP . 'Plugin' . DS . 'AdminMakeResponsive' . DS . 'Lib' . DS . 'addcolorconfig_toolbar.css';
		if (!file_exists($configPath)) {
			return false;
		}

		$File = new File($configPath);
		$config = $File->read();
		$settings = [
			'ADMINMAIN' => 'admin_color_main',
			'ADMINSUB' => 'admin_color_sub'
		];

		foreach ($settings as $key => $setting) {
			if (empty($data['AdminMakeResponsive'][$setting])) {
				$config = preg_replace("/\n.+?" . $key . ".+?\n/", "\n", $config);
			} else {
				$config = str_replace($key, '#' . $data['AdminMakeResponsive'][$setting], $config);
			}
		}

		$outputPath = APP . 'Plugin' . DS . 'AdminMakeResponsive' . DS . 'webroot' . DS . 'css' . DS . 'admin' . DS . 'addcolor_3rd_toolbar.css';
		$OutputFile = new File($outputPath, true, 0644);
		$OutputFile->write($config);
		$OutputFile->close();
	}
}
