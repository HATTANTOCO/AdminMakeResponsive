# 管理画面レスポンシブ化 プラグイン for baserCMS 4 
baserCMSのadmin-third、admin-secondの両テーマ共にレスポンシブ化するプラグインです。
（admin-secondは、Daruma&Namio(tsukurun)さん作成の「adminGoResponsiveプラグイン」のcssおよびjsを利用させていただきました。）


https://user-images.githubusercontent.com/96756270/163811189-062c44cd-e944-46b2-a772-52588098460c.mp4


## 要件・仕様など
本プラグインは、プラグインをインストール後レスポンシブ化設定を有効にすると、使用している管理テーマを判定して、レスポンシブ化に必要なcssをアドオンします。
また、admin-third管理テーマのみ、管理テーマカラーを設定の上、有効にすると、各種アイコン、ボタン、LINKカラー等を管理テーマカラーに合わせて変更することができます。

admin-third管理テーマについては、基本的にデフォルトのstyle.cssのブレークポイントを利用してレスポンシブ化対応を行いました。
- タブレット対応 max-width:768px（既存のブレークポイント）
- スマホ対応 max-width:499px を追加。レイアウトが崩れない最小表示幅を350pxとして設計。

対応バージョンは、baserCMS4系のみ。
- v.4.2.0（管理テーマ切り替え機能が初めて実装された）以降のバージョンに対応。
個人的に、管理テーマ内の全ての機能を利用しるわけではないため、特定の機能のUIなどにデバッグが行き届いていない部分もあると思いますが、よければ試してみてください。
- なお、v.4.1.8以前は、管理テーマ切り替え機能自体が未実装ですが、admin-secondのレスポンシブ化のみ動作すると思います。


## インストール
1. CodeボタンあるいはReleasesからダウンロードした圧縮ファイルを解凍後、生成されたフォルダ名 AdminMakeResponsive［-masterやバージョン名］を AdminMakeResponsive にリネームし、/app/Plugin/AdminMakeResponsive として配置します。
2. 管理画面のプラグイン管理に入り、表示されている AdminMakeResponsive プラグイン をインストールして下さい。
3. プラグインのインストール後、AdminMakeResponsive 管理ページにアクセスして設定を行なってください。


## アップデート
1. CodeボタンあるいはReleasesからダウンロードした圧縮ファイルを解凍後、生成されたフォルダ名 AdminMakeResponsive［-masterやバージョン名］を AdminMakeResponsive にリネームし、既存の/app/Plugin/AdminMakeResponsive を上書きします。
2. 管理画面のプラグイン管理に入り、表示されている AdminMakeResponsive プラグイン をアップデートして下さい。


## ご注意
- 管理画面の改造などをされている場合は、画面が崩れる可能性があります。
画面のレイアウトが崩れるなど表示かおかしい場合は、baserCMSおよびブラウザのキャッシュをクリアするなどしてみてください。
それでも画面のレイアウトが崩れるなどの問題が改善しない場合は、チェックボックスをオフにして使用を停止してください。
- バージョンが更新され、admin-third管理テーマのCSSが大幅に変更された場合は、画面が崩れるケースもありますのでその点はご承知ください。
- Daruma&Namio(tsukurun)さん作成の「adminGoResponsiveプラグイン」を有効にした状態で本プラグインを使用した場合、表示が崩れます。同時使用は避けてください。


## 謝辞
本プラグイン作成に際し、Daruma&Namio(tsukurun)さん作成の「adminGoResponsiveプラグイン」を参考にさせていただきました。
また、admin-second管理テーマのレスポンシブ化に関しては、ログイン画面の一部レイアウトの修正を行いましたが、ほぼ、「adminGoResponsiveプラグイン」のCSSおよびjsをそのまま使用させていただいています。
ありがとうございました。


## ライセンス
Copyright (c) 2022 HATTA (https://hattantoco.com)
Released under the MIT license
https://opensource.org/licenses/mit-license.php

また、このプラグインの主要なデザインは、daruma&namio(tsukurun)さんの「AdminGoResponsive」プラグインを参考にしており、「AdminGoResponsive」プラグインに記載のライセンス表記と同様のライセンスが適用されます。

以下は、daruma&namio(tsukurun)さん製作の「AdminGoResponsive」プラグインに記載されたオリジナルのライセンスです。

 @link			http://www.tsukurun.co.jp/
 @link			http://web-model.com/
 @author			daruma&namio(tsukurun)
 @license			MIT
