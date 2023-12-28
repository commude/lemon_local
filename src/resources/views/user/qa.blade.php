@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper other_page">
    <div class="content_area">
        <p class="title">
            キャンペーンQ&A
        </p>
        <section class="qa_section">
            <p class="text">以下よりお探しのカテゴリを選択してください。</p>
            <ul class="qa_list">
                <li class="item"><a href="#q1" onclick="dataLayer.push({event:'gaEvent',params:['qa_list-q1','click', 'q1']});">1.キャンペーン応募について</a></li>
                <li class="item"><a href="#q2" onclick="dataLayer.push({event:'gaEvent',params:['qa_list-q2','click', 'q2']});">2.抽選方法について</a></li>
                <li class="item"><a href="#q3" onclick="dataLayer.push({event:'gaEvent',params:['qa_list-q3','click', 'q3']});">3.スタンプについて</a></li>
                <li class="item"><a href="#q4" onclick="dataLayer.push({event:'gaEvent',params:['qa_list-q4','click', 'q4']});">4.通信トラブルについて</a></li>
                <li class="item"><a href="#q5" onclick="dataLayer.push({event:'gaEvent',params:['qa_list-q5','click', 'q5']});">5.賞品について</a></li>
                <li class="item"><a href="#q6" onclick="dataLayer.push({event:'gaEvent',params:['qa_list-q6','click', 'q6']});">6.発送について</a></li>
            </ul>
        </section>
        <section class="qa_section" id="q1">
            <h2 class="qa_title">1.キャンペーン応募について</h2>
            <ul class="qa_list">
                <li class="item"><a href="#q1-1" onclick="dataLayer.push({event:'gaEvent',params:['qa_q1list-q1-1','click', 'q1-1']});">Q1:応募方法を教えてください。</a></li>
                <li class="item"><a href="#q1-2" onclick="dataLayer.push({event:'gaEvent',params:['qa_q1list-q1-2','click', 'q1-2']});">Q2:応募期間を教えてください。</a></li>
                <li class="item"><a href="#q1-3" onclick="dataLayer.push({event:'gaEvent',params:['qa_q1list-q1-3','click', 'q1-3']});">Q3:対象商品を教えてください。</a></li>
                <li class="item"><a href="#q1-4" onclick="dataLayer.push({event:'gaEvent',params:['qa_q1list-q1-4','click', 'q1-4']});">Q4:1人で応募できる回数の上限はありますか？</a></li>
                <li class="item"><a href="#q1-5" onclick="dataLayer.push({event:'gaEvent',params:['qa_q1list-q1-5','click', 'q1-5']});">Q5:応募は複数口まとめてできますか？</a></li>
                <li class="item"><a href="#q1-6" onclick="dataLayer.push({event:'gaEvent',params:['qa_q1list-q1-6','click', 'q1-6']});">Q6:スマートフォンがありませんが、応募できますか？</a></li>
                <li class="item"><a href="#q1-7" onclick="dataLayer.push({event:'gaEvent',params:['qa_q1list-q1-7','click', 'q1-6']});">Q7:推奨環境を教えてください。</a></li>
                <li class="item"><a href="#q1-8" onclick="dataLayer.push({event:'gaEvent',params:['qa_q1list-q1-8','click', 'q1-7']});">Q8:応募にお金はかかりますか？</a></li>
            </ul>
            <ul class="qa_content_list">
                <li class="qa_content" id="q1-1">
                    <p class="qa_content_q">応募方法を教えてください。</p>
                    <p class="qa_content_a">
                        LINEアカウントでログインのうえ、カメラを起動し対象商品のJANコード（バーコード）を読み込むとスタンプが１個貯まります。スタンプを3個貯めるごとに「3兄弟直伝！至高の楽しみ方セット」にご応募いただけます。<br>
                        <span class="indent">●2種類のフレーバーをご登録いただくと当選確率が2倍、3種類以上のフレーバーをご登録いただくと当選確率が3倍となります。</span><br>
                        <span class="indent">●スタンプはキャンペーン期間内に1日1個貯めていただけます。</span><br>
                        <span class="indent">●JANコード（バーコード）が読み込めない場合は、JANコード（バーコード）下部に記載の数字（13桁）を入力いただくとスタンプを貯めていただけます。</span><br>
                        <span class="indent">●このキャンペーンはスマートフォンからのみご応募いただけます。</span><br>
                        <span class="indent">●LINEアカウントでのログインについて、日本国外で契約した端末およびFacebookアカウントで認証している場合は、システム認証ができません。</span><br>
                        <span class="indent">●お一人様何口でもご応募いただけます。
                    </p>
                </li>
                <li class="qa_content" id="q1-2">
                    <p class="qa_content_q">応募期間を教えてください。</p>
                    <p class="qa_content_a">
                        応募期間は2021年7月12日（月）9：00～2021年8月31日（火）23：59です。
                    </p>
                </li>
                <li class="qa_content" id="q1-3">
                    <p class="qa_content_q">対象商品を教えてください。</p>
                    <p class="qa_content_a">
                        対象商品については以下の通りとなっております。<br>
                        こだわり酒場のレモンサワー<br>
                        こだわり酒場のレモンサワー〈キリッと男前〉<br>
                        こだわり酒場のレモンサワー〈追い足しレモン〉<br>
                        350ml缶/500ml缶/350ml 6缶パック/500ml 6缶パック<br>
                        <br>
                        こだわり酒場のレモンサワー〈夏の塩レモン〉　<br>
                        350ml缶/500ml缶<br>
                        <span class="indent">※一部店舗では取扱いのない商品もございます。</span>
                    </p>
                </li>
                <li class="qa_content" id="q1-4">
                    <p class="qa_content_q">1人で応募できる回数の上限はありますか？</p>
                    <p class="qa_content_a">
                        応募期間中であれば、お1人様何回でもご応募いただけます。
                    </p>
                </li>
                <li class="qa_content" id="q1-5">
                    <p class="qa_content_q">応募は複数口まとめてできますか？</p>
                    <p class="qa_content_a">
                        複数口まとめてご応募はできません。<br>
                        スタンプを3個貯めるごとに、スタンプカード下部の「抽選開始」ボタンをタップして抽選を開始してください。
                    </p>
                </li>
                <li class="qa_content" id="q1-6">
                    <p class="qa_content_q">スマートフォンがありませんが、応募できますか？</p>
                    <p class="qa_content_a">
                        このキャンペーンはインターネットに接続できるスマートフォンからのご応募のみとなっております。<br>
                        パソコンや携帯電話、固定電話、ハガキ、封書でのご応募は受け付けておりませんのでご了承ください。
                    </p>
                </li>
                <li class="qa_content" id="q1-7">
                    <p class="qa_content_q">推奨環境を教えてください。</p>
                    <p class="qa_content_a">
                        推奨環境については以下の通りとなっております。<br>
                        <br>
                        【推奨環境】<br>
                        推奨環境のスマートフォンでご応募いただけます。ただしOSバージョンや機種特有の問題も多いため、一部の端末では正常に動作しない場合や、ご対応できない場合もございます。あらかじめご了承ください。<br>
                        <br>
                        ■iPhone<br>
                        ・iOS13、14<br>
                        　Safari<br>
                        ■Android<br>
                        ・Android 8、9、10<br>
                        　Google Chrome<br>
                        <br>
                        <span class="indent">※OSのバージョンアップ方法などにつきましては、各端末メーカー、または携帯電話会社へお問い合わせください。</span>
                    </p>
                </li>
                <li class="qa_content" id="q1-8">
                    <p class="qa_content_q">応募にお金はかかりますか？</p>
                    <p class="qa_content_a">
                        ご応募は無料です。<br>
                        キャンペーンサイトにアクセスしていただく際のインターネット通信料・接続料はお客様のご負担となります。<br>
                        通信料および接続料は、お客様のご契約されている通信会社および接続会社によって異なります。詳しくは各契約会社との契約内容をご確認ください。
                    </p>
                </li>
            </ul>
        </section>
        <section class="qa_section" id="q2">
            <h2 class="qa_title">2.抽選方法について</h2>
            <ul class="qa_list">
                <li class="item"><a href="#q2-1" onclick="dataLayer.push({event:'gaEvent',params:['qa_q2list-q2-1','click', 'q2-1']});">Q1:どのような抽選ですか？</a></li>
                <li class="item"><a href="#q2-2" onclick="dataLayer.push({event:'gaEvent',params:['qa_q2list-q2-2','click', 'q2-2']});">Q2:抽選結果を知りたい。</a></li>
            </ul>
            <ul class="qa_content_list">
                <li class="qa_content" id="q2-1">
                    <p class="qa_content_q">どのような抽選ですか？</p>
                    <p class="qa_content_a">
                        LINEアカウントでログインのうえ、カメラを起動し対象商品に印刷されたJANコード（バーコード）を読み取ると、スタンプが1個貯まります。スタンプを3個貯めるごとに、抽選に参加いただけます。抽選結果はご応募後すぐに画面に表示されます。当選された方は、発送先登録フォームより発送先登録期間内に賞品の発送先をご登録ください。<br>
                        <span class="indent">※2種類のフレーバーをご登録いただくと当選確率が2倍、3種類以上のフレーバーをご登録いただくと当選確率が3倍となります。</span><br>
						<span class="indent">※当選確率はご応募いただく時点での当選確率を適用させていただきます。複数回ご応募いただく場合は、それぞれのご応募時点での当選確率にて抽選させていただきます。なお、当選確率アップはキャンペーン期間中継続されます。</span>
                    </p>
                </li>
                <li class="qa_content" id="q2-2">
                    <p class="qa_content_q">抽選結果を知りたい。</p>
                    <p class="qa_content_a">
                        サイトでの抽選結果をもって、ご当選の発表とさせていただきます。
                    </p>
                </li>
            </ul>
        </section>
        <section class="qa_section" id="q3">
            <h2 class="qa_title">3.スタンプについて</h2>
            <ul class="qa_list">
                <li class="item"><a href="#q3-1" onclick="dataLayer.push({event:'gaEvent',params:['qa_q3list-q3-1','click', 'q3-1']});">Q1:スタンプはどうやったら獲得できますか？</a></li>
                <li class="item"><a href="#q3-2" onclick="dataLayer.push({event:'gaEvent',params:['qa_q3list-q3-2','click', 'q3-2']});">Q2:飲み比べで当選確率アップとはどういう意味ですか？</a></li>
                <li class="item"><a href="#q3-3" onclick="dataLayer.push({event:'gaEvent',params:['qa_q3list-q3-3','click', 'q3-3']});">Q3:一度スマートフォンの画面を閉じた後、どうやったら貯めたスタンプを確認できますか？</a></li>
                <li class="item"><a href="#q3-4" onclick="dataLayer.push({event:'gaEvent',params:['qa_q3list-q3-4','click', 'q3-4']});">Q4:何回抽選ができますか？</a></li>
                <li class="item"><a href="#q3-5" onclick="dataLayer.push({event:'gaEvent',params:['qa_q3list-q3-5','click', 'q3-5']});">Q5:JANコード（バーコード）が見つかりません。</a></li>
                <li class="item"><a href="#q3-6" onclick="dataLayer.push({event:'gaEvent',params:['qa_q3list-q3-6','click', 'q3-6']});">Q6:カメラが起動しません。</a></li>
                <li class="item"><a href="#q3-7" onclick="dataLayer.push({event:'gaEvent',params:['qa_q3list-q3-7','click', 'q3-7']});">Q7:JANコード（バーコード）が読み込めません。</a></li>
                <li class="item"><a href="#q3-8" onclick="dataLayer.push({event:'gaEvent',params:['qa_q3list-q3-8','click', 'q3-8']});">Q8:いずれの手順を試してもカメラで読み込みができません。</a></li>
            </ul>
            </ul>
            <ul class="qa_content_list">
                <li class="qa_content" id="q3-1">
                    <p class="qa_content_q">スタンプはどうやったら獲得できますか？</p>
                    <p class="qa_content_a">
                        キャンペーンサイト内の「バーコードを読み込む」をタップしてカメラを起動し、対象商品に印刷されたJANコード（バーコード）を読み取ると、スタンプを1日1個獲得できます。
                    </p>
                </li>
                <li class="qa_content" id="q3-2">
                    <p class="qa_content_q">飲み比べで当選確率アップとはどういう意味ですか？</p>
                    <p class="qa_content_a">
                        対象商品4種のフレーバーから複数ご登録いただくと、当選確率が上がります。対象商品2種のフレーバーをご登録いただくと当選確率が2倍に、対象商品3種以上のフレーバーをご登録いただくと、当選確率が3倍になります。当選確率はマイページで確認できます。マイページは、キャンペーンサイトよりLINEアカウントでログインいただくと表示されます。
                    </p>
                </li>
                <li class="qa_content" id="q3-3">
                    <p class="qa_content_q">一度スマートフォンの画面を閉じた後、どうやったら貯めたスタンプを確認できますか？</p>
                    <p class="qa_content_a">
                        キャンペーンサイトより再度LINEアカウントでログインいただくと、マイページに遷移します。スタンプはマイページに蓄積されますので、マイページにて貯めたスタンプを確認することや、スタンプを3個貯めて抽選に参加いただくことができます。
                    </p>
                </li>
                <li class="qa_content" id="q3-4">
                    <p class="qa_content_q">何回抽選ができますか？</p>
                    <p class="qa_content_a">
                        キャンペーン期間中であれば、何度でもご応募いただけます。
                    </p>
                </li>
                <li class="qa_content" id="q3-5">
                    <p class="qa_content_q">JANコード（バーコード）が見つかりません。</p>
                    <p class="qa_content_a">
                        対象商品の缶および6缶パックの段ボールに印刷されています。
                    </p>
                </li>
                <li class="qa_content" id="q3-6">
                    <p class="qa_content_q">カメラが起動しません。</p>
                    <p class="qa_content_a">
                        ブラウザおよび端末のカメラ設定が有効になっていない可能性があります。以下手順をお試しください。<br>
                        ①ブラウザおよび端末のカメラ設定<br>
                        ブラウザおよび端末のカメラ設定を有効になっているかご確認いただけますでしょうか。<br>
                        ・iOS<br>
                        設定＞Safari＞カメラとマイクのアクセスを有効に変更<br>
                        ・Android<br>
                        Chrome設定＞サイト設定＞カメラ＞有効に変更<br>
                        <br>
                        ②「https://kodawarisakabacp.jp/」のドメイン許可<br>
                        Chromeの場合、カメラ設定が有効でも「https://kodawarisakabacp.jp/」が拒否されているとカメラが起動できませんので、 「https://kodawarisakabacp.jp/」を許可してください。<br>
                        <br>
                        ・Chromeアプリ（Android）<br>
                        Chromeアプリ のアドレスバーの右のその他アイコン＞設定＞サイト設定＞カメラ＞「ブロック中」 のサイトに「https://kodawarisakabacp.jp/」がある場合は許可に変更<br>
                        <span class="indent">※必ず「Chromeアプリ」にてご確認ください。</span>
                    </p>
                </li>
                <li class="qa_content" id="q3-7">
                    <p class="qa_content_q">JANコード（バーコード）が読み込めません。</p>
                    <p class="qa_content_a">
                        通信状況による可能性があるため、良好な場所で再度お試しください。また、アクセス時にエラー表記が出なかったかご確認ください。もし表示されない場合は、ご利用のスマートフォンの環境をご確認ください。<br>
                        <br>
                        ＜推奨環境＞<br>
                        ■iPhone<br>
                        ・iOS13、14<br>
                        　Safari<br>
                        ■Android<br>
                        ・Android 8、9、10<br>
                        　Google Chrome<br>
                        <span class="indent">※OSバージョンや機種特有の問題も多いため、一部の端末では正常に動作しない場合や、ご対応できない場合がございます。</span><br>
						<span class="indent">※OSのバージョンアップ方法などにつきましては、各端末メーカーまたは携帯電話会社へお問い合わせください。</span>
                    </p>
                </li>
                <li class="qa_content" id="q3-8">
                    <p class="qa_content_q">いずれの手順を試してもカメラで読み込みができません。</p>
                    <p class="qa_content_a">
                        キャンペーンサイトページ下部の「カメラ読み込みができない方はこちらへ」よりJANコード（バーコード）の入力ができます。こちらをお試しください。
                    </p>
                </li>
            </ul>
        </section>
        <section class="qa_section" id="q4">
            <h2 class="qa_title">4.通信トラブルについて</h2>
            <ul class="qa_list">
                <li class="item"><a href="#q4-1" onclick="dataLayer.push({event:'gaEvent',params:['qa_q4list-q4-1','click', 'q4-1']});">Q1:アクセスできません・つながりません。</a></li>
                <li class="item"><a href="#q4-2" onclick="dataLayer.push({event:'gaEvent',params:['qa_q4list-q4-2','click', 'q4-2']});">Q2:応募の途中で接続が切れてしまいました。</a></li>
            </ul>
            <ul class="qa_content_list">
                <li class="qa_content" id="q4-1">
                    <p class="qa_content_q">アクセスできません・つながりません。</p>
                    <p class="qa_content_a">
                        アクセスが集中する正午前後、および夕方から深夜の時間帯は、接続しづらい場合がございますので、この時間帯を避けてアクセスしていただくことをお勧めいたします。<br>
                        <span class="indent">※キャンペーン最終日はキャンペーンサイトへのアクセスが集中するため、接続しづらい状態となる場合がございます。</span>
                    </p>
                </li>
                <li class="qa_content" id="q4-2">
                    <p class="qa_content_q">応募の途中で接続が切れてしまいました。</p>
                    <p class="qa_content_a">
                        再度、キャンペーンサイト（<a href="https://kodawarisakabacp.jp/" onclick="dataLayer.push({event:'gaEvent',params:['qa_q4-1-a','click', 'kodawarisakabacp']});">https://kodawarisakabacp.jp/</a>）にアクセスしてください。<br>
                        抽選中やJANコード（バーコード）の読み込み途中だった場合は、お手数ですが再度ご確認ください。 <br>
                        <br>
                        以上をお試しいただいた後も問題が解決しない場合は、大変お手数ですが、サントリーキャンペーン事務局までお電話ください。<br>
                        その際にマイページ内に表示されている「マイページID」をご用意ください。
                    </p>
                </li>
            </ul>
        </section>
        <section class="qa_section" id="q5">
            <h2 class="qa_title">5.賞品について</h2>
            <ul class="qa_list">
                <li class="item"><a href="#q5-1" onclick="dataLayer.push({event:'gaEvent',params:['qa_q5list-q5-1','click', 'q5-1']});">Q1:賞品は何ですか？</a></li>
            </ul>
            <ul class="qa_content_list">
                <li class="qa_content" id="q5-1">
                    <p class="qa_content_q">賞品は何ですか？</p>
                    <p class="qa_content_a">
                        以下の賞品が1,000名様に当たります。<br>
                        3兄弟直伝！至高の楽しみ方セット<br>
                        ＜内容＞<br>
                        <span class="indent">・サントリー天然水スパークリング 500ml</span><br>
						<span class="indent">・こだわり酒場のレモンサワーの素 500ml瓶</span><br>
						<span class="indent">・こだわり酒場のレモンサワーの素〈濃いめ〉 500ml瓶</span><br>
						<span class="indent">・こだわり酒場 オリジナルタンブラー</span>
                    </p>
                </li>
            </ul>
        </section>
        <section class="qa_section" id="q6">
            <h2 class="qa_title">6.発送について</h2>
            <ul class="qa_list">
                <li class="item"><a href="#q6-1" onclick="dataLayer.push({event:'gaEvent',params:['qa_q6list-q6-1','click', 'q6-1']});">Q1:当選賞品はいつ届きますか？</a></li>
                <li class="item"><a href="#q6-2" onclick="dataLayer.push({event:'gaEvent',params:['qa_q6list-q6-2','click', 'q6-2']});">Q2:賞品発送先住所を変更したい。</a></li>
            </ul>
            <ul class="qa_content_list">
                <li class="qa_content" id="q6-1">
                    <p class="qa_content_q">当選賞品はいつ届きますか？</p>
                    <p class="qa_content_a">
                        サイトでの抽選結果をもって、ご当選の発表とさせていただきます。<br>
                        賞品の発送は2021年9月中旬を予定しております。<br>
                        諸事情により、賞品の発送が遅れることもございますので、あらかじめご了承ください。 <br>
                        <span class="indent">※ご当選後、賞品の発送先登録が完了されたお客様に登録完了メールを送らせていただきます。</span>
                    </p>
                </li>
                <li class="qa_content" id="q6-2">
                    <p class="qa_content_q">賞品発送先住所を変更したい。</p>
                    <p class="qa_content_a">
                        発送先登録された後のご住所の変更は、インターネット上からは行えません。<br>
                        お電話にてサントリーキャンペーン事務局までお問い合わせください。
                    </p>
                </li>
            </ul>
        </section>
    </div>
    <div class="fixed_wrapper">
        <a href="#top" onclick="dataLayer.push({event:'gaEvent',params:['qa_page-top','click', 'page-top']});" class="top_btn"><img src="{{ asset('user/img') }}/other/top.png"></a>
        <button class="btn"  onclick="window.close()"><img src="{{ asset('user/img') }}/other/btn3.png"></button>
    </div>
</div>

<script src="{{ asset('user/js') }}/iscroll.js"></script>

@endsection
