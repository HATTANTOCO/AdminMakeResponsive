<?php
/**
 * AdminMakeResponsive - Admin Index View Element
 *
 * プラグインの設定画面（レスポンシブ有効化・カラーピッカーによるテーマカラー変更）を構成するビュー要素
 *
 * @package    AdminMakeResponsive
 * @subpackage View/Element
 * @author     HATTA (https://hattantoco.com)
 * @license    MIT License
 * @link       https://github.com/HATTANTOCO/AdminMakeResponsive
 */

$this->BcBaser->css('admin/colpick', ['inline' => false]);
$this->BcBaser->js(['admin/vendors/colpick'], false);
?>

<script type="text/javascript">
$(function () {
    // カラーピッカーの初期化と制御
    $(".color-picker").each(function () {
        var $this = $(this);
        var color = $this.val() ? $this.val() : 'ffffff';
        
        if ($this.val()) {
            $this.css('border-right', '36px solid #' + color);
        }
        
        $this.colpick({
            layout: 'hex',
            color: color,
            onSubmit: function (hsb, hex, rgb, el) {
                $(el).val(hex).css('border-right', '36px solid #' + hex);
                $(el).colpickHide();
            }
        });
    });
});
</script>

<style>
/* プラグイン専用の説明文エリア */
.alh-description {
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eeeeea;
}
.alh-description ul {
    padding-left: 1em;
}
.bca-form-table__input span {
    display: inline-block;
}
</style>

<div class="alh-description">
    <p>管理画面（admin-second / admin-third対応）のレスポンシブ化を有効にします。</p>
    <ul>
        <li>画面のレイアウトが崩れるなど表示がおかしい場合は、baserCMSおよびブラウザのキャッシュをクリアしてください。</li>
        <li>問題が改善しない場合は、チェックボックスをオフにしてください。</li>
    </ul>
    
    <?php if (Configure::read('BcSite.admin_theme') === 'admin-third' || $this->BcBaser->siteConfig['admin_theme'] === 'admin-third'): ?>
        <br>
        <p>管理画面（admin-thirdのみ対応）のテーマカラーを変更します。</p>
        <ul>
            <li>デフォルトの管理テーマカラーを変更することで、各種アイコン、ボタン、リンクカラー等を設定したテーマカラーに合わせて一括変更できます。</li>
            <li>この設定は、admin-third管理テーマのみ有効です（admin-secondはアイコンが画像データのため、カラーの変更ができません）。</li>
        </ul>
    <?php endif; ?>
</div>

<?php echo $this->BcForm->create('AdminMakeResponsive', ['url' => ['controller' => 'admin_make_responsive', 'action' => 'index']]) ?>
<?php echo $this->BcForm->hidden('AdminMakeResponsive.id') ?>

<table cellpadding="0" cellspacing="0" id="AdminMakeResponsiveTable" class="form-table bca-form-table">
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('AdminMakeResponsive.flg_enable', '管理画面 レスポンシブ化') ?>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->input('AdminMakeResponsive.flg_enable', ['type' => 'checkbox', 'label' => '有効にする', 'value' => '1']) ?>
            <?php echo $this->BcForm->error('AdminMakeResponsive.flg_enable') ?>
        </td>
    </tr>
    
    <?php if (Configure::read('BcSite.admin_theme') === 'admin-third' || $this->BcBaser->siteConfig['admin_theme'] === 'admin-third'): ?>
        <tr>
            <th class="col-head bca-form-table__label">
                <?php echo __d('baser', '管理テーマカラー') ?>
            </th>
            <td class="col-input bca-form-table__input">
                <div>
                    <?php echo $this->BcForm->input('AdminMakeResponsive.admin_color_enable', ['type' => 'checkbox', 'label' => '有効にする', 'value' => '1']) ?>
                    <?php echo $this->BcForm->error('AdminMakeResponsive.admin_color_enable') ?>
                </div>
                <span>
                    <small>[<?php echo __d('baser', 'メイン') ?>]</small>
                    #<?php echo $this->BcForm->input('AdminMakeResponsive.admin_color_main', ['type' => 'text', 'size' => 6, 'class' => 'color-picker bca-textbox-color__input']) ?>
                </span>
                <span>
                    <small>[<?php echo __d('baser', 'サブ') ?>]</small>
                    #<?php echo $this->BcForm->input('AdminMakeResponsive.admin_color_sub', ['type' => 'text', 'size' => 6, 'class' => 'color-picker bca-textbox-color__input']) ?>
                </span>
                <i class="bca-icon--question-circle btn help bca-help"></i>
                
                <div id="helptextFormalName" class="helptext">
                    <ul>
                        <li><?php echo __('デフォルトのスタイルは、メイン「#6fa83d」 サブ「#639536」になっています。') ?></li>
                    </ul>
                </div>
            </td>
        </tr>
    <?php endif; ?>
</table>

<div class="submit bca-actions">
    <?php echo $this->BcForm->button(__d('baser', '保存'), [
        'div' => false,
        'class' => 'button bca-btn bca-actions__item',
        'data-bca-btn-type' => 'save',
        'data-bca-btn-size' => 'lg',
        'data-bca-btn-width' => 'lg',
    ]); ?>
</div>

<?php echo $this->BcForm->end() ?>
