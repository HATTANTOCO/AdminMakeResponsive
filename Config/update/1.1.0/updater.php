<?php
/**
 * updater
 * 
 * AdminMakeResponsive 1.1.0 バージョン アップデートスクリプト
 * 
 * @package    AdminMakeResponsive
 * @subpackage Config/update
 * @author     HATTA (https://hattantoco.com)
 * @license    MIT License
 * @link       https://github.com/HATTANTOCO/AdminMakeResponsive
 */

/* admin_make_responsives テーブルの構造変更 */

if ($this->loadSchema('1.1.0', 'AdminMakeResponsive', 'admin_make_responsives', 'alter')){
  $this->setUpdateLog('admin_make_responsives テーブルの構造変更に成功しました。');
} else {
  $this->setUpdateLog('admin_make_responsives テーブルの構造変更に失敗しました。', true);
}