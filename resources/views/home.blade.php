@extends('layouts.app')

@section('content')
<section class="my-5 lp-section">
    <div class="lp-container">
        <div class="row">
            <div class="col-sm-5 lp-top-left text-center">
                <h1 class="lp-heading text-muted">ODECOLOG</h1>
                <h2 class="text-muted mt-3 mb-4">大丈夫。私はただおでこが広いだけ。</h2>
                <a class="login-button text-muted" href="{{ route('login') }}">さっそく始める</a>
            </div>
            <div class="col-sm-7 lp-top-logo">
                <img src="https://res.cloudinary.com/tatsu/image/upload/v1601777190/k0354_2_vr5znk.png" alt="画像" class="lp-top-logo1">
                <img src="https://res.cloudinary.com/tatsu/image/upload/v1601776941/k0354_4_qthq6h.png" alt="画像" class="lp-top-logo2">
                <img src="https://res.cloudinary.com/tatsu/image/upload/v1601777195/k0354_3_yhyouz.png" alt="画像" class="lp-top-logo3">
            </div>
        </div>
    </div>
</section>
<section class="lp-section section2 py-5">
    <div class="lp-container">
        <h2 class="text-center my-5 text-muted">おでこの写真、今のうちにこっそり記録しておきませんか？</h2>
    </div>
    <div class="lp-container row">
        <div class="col-sm-4 text-center">
            <img src="https://res.cloudinary.com/tatsu/image/upload/v1601789507/k0763_5_1_lnvu0c.png" alt="悩む人" class="lp-second-logo">
        </div>
        <div class="col-sm-8">
            <div class="balloon text-muted text-center">
                <p>こんなにおでこ広かったっけ？いや、もともと広い。うん、たしかそうだ。</p>
            </div>
            <div class="balloon text-muted text-center">
                <p>おでこの写真なんてピンポイントで撮ってないしなあ</p>
            </div>
            <div class="balloon text-muted text-center">
                <p>おでこの写真スマホに保存しておくのもなんかいやだし、他の写真と混ざって管理しづらそう</p>
            </div>
            <div class="balloon text-muted text-center">
                <p>てか、おでこ気にしてるのみんなに知られたくない</p>
            </div>
            <div class="balloon text-muted text-center">
                <p>ネットで見つけた商品使ってるけど本当に効果があるんだろうか？</p>
            </div>
        </div>
    </div>
    <div class="lp-container text-center">
        <h2 class="text-muted my-5 section2-text">ODECOLOGならそんな悩みを解決できます</h2>
        <div class="triangle mx-auto"></div>
    </div>
</section>
<section class="lp-section">
    <div class="container py-5">
        <h2 class="text-center my-5 text-muted">基本機能</h2>
        <div class="row text-center">
            <div class="col-sm-4 my-4">
                <div class="box mx-auto">
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601812266/%E3%82%AB%E3%83%AC%E3%83%B3%E3%83%80%E3%83%BC%E3%81%AE%E3%83%95%E3%83%AA%E3%83%BC%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B32_2_trsiyv.png" alt="カレンダー" class="section3-image">
                    <p class="mt-4 text-muted section3-text">カレンダー形式でおでこの写真、<br>その他記録しておきたい情報も<br>保存することができます。</p>
                    <p class="text-muted section3-text">日付を選択すると<br>記録した詳細を確認できます。</p>
                </div>
            </div>
            <div class="col-sm-4 my-4">
                <div class="box mx-auto">
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601812272/%E5%86%99%E7%9C%9F%E3%81%AE%E3%83%95%E3%83%AA%E3%83%BC%E7%B4%A0%E6%9D%9011_kdauk0.png" alt="ギャラリー" class="section3-image">
                    <p class="mt-4 text-muted section3-text">登録した写真を<br>ギャラリーページでスライドのように<br>見ることもできます。</p>
                    <p class="text-muted section3-text">毎回同じ角度で撮影して記録しておくと<br>変化が分かりやすいです。</p>
                </div>
            </div>
            <div class="col-sm-4 my-4">
                <div class="box mx-auto">
                    <img src="https://res.cloudinary.com/tatsu/image/upload/v1601812276/%E8%A8%98%E4%BA%8B%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B31_2_lmnykf.png" alt="投稿" class="section3-image">
                    <p class="mt-4 text-muted section3-text">みなさんの育毛に関する<br>体験や経験を投稿して<br>ユーザー同士で情報を共有しましょう。</p>
                    <p class="text-muted section3-text">何気ない投稿によってちょっとした悩みの<br>解消につながります。<br></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="lp-section section2 py-5">
    <div class="lp-container">
        <h2 class="text-center my-5 text-muted">お知らせ</h2>
    </div>
    <div class="col-sm-8 lp-notice">
        <p class="text-muted lp-notice-text">2020/10/16<span class="notice-content">アプリ完成</span></p>
    </div>
</section>
@endsection