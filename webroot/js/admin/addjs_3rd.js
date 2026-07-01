/**
 * AdminMakeResponsive - Sidebar Toggle Script
 *
 * 管理画面（画面幅768px以下）でサイドバーをレスポンシブ開閉するためのナビゲーション制御スクリプト
 *
 * @package    AdminMakeResponsive
 * @subpackage JavaScript
 * @author     HATTA (https://hattantoco.com)
 * @license    MIT License
 * @link       https://github.com/HATTANTOCO/AdminMakeResponsive
 */

$(function() {
    // 画面構成要素の動的生成
    $('#ContentsBody .bca-main__header').prepend(
        '<div class="toggle_btn"><span></span><span></span><span></span><span></span></div>'
    );
    $('#Wrap').append('<div id="mask"></div>');

    var $body = $('body');
    var $btn = $('.toggle_btn');
    var $mask = $('#mask');
    var $nav = $('.bca-nav');

    /**
     * サイドバーを閉じる共通処理
     * アニメーション完了後に、レイアウト崩れを防ぐためクリーンアップを実行
     */
    function closeSidebar() {
        $body.addClass('close').removeClass('open');
        window.scrollTo(0, 0);

        // nav自身のアニメーション完了のみを確実にキャッチ
        $nav.one('animationend', function(e) {
            if (e.target === this) {
                $body.removeClass('close');
            }
        });
    }

    // トグルボタンクリック時の開閉制御
    $btn.on('click', function() {
        if (!$body.hasClass('open')) {
            $body.removeClass('close').addClass('open');
            window.scrollTo(0, 0);
        } else {
            closeSidebar();
        }
    });

    // マスク部分クリック時にサイドバーを閉じる
    $mask.on('click', function() {
        closeSidebar();
    });
});
