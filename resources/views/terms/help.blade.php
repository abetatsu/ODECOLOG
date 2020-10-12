@extends('layouts.app')

@section('content')
@auth
@include('layouts.menu')
@endauth
<h1 class="text-center text-muted my-5">ODECOLOGとは？</h1>
<div class="col-md-6 mx-auto my-5 text-muted">
     <div class="card-post py-4 text-center my-5 px-5">
          <h2 class="mb-4 my-5 text-left">おでこの広さを記録しよう</h2>
          <p class="text-left">前髪をかき上げた時に「ハゲてきてない？」って言われたことはありませんか？</p>
          <p class="text-left">おでこの後退が気になって昔の写真見返してませんか？</p>
          <p class="text-left">でもピンポイントにおでこの写真なんてないし、できればこっそり記録しておきたい。</p>
          <p class="text-left">そんな方のためにODECOLOGを作りました。</p>
          <p class="text-left">ODECOLOGコア機能はおでこの記録ができることです。</p>
          <p class="text-left">カレンダー形式で写真やその他の情報も保存でき、写真ギャラリーで生え際の変化を確認できます。</p>
          <img src="https://res.cloudinary.com/tatsu/image/upload/v1601878737/%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88_2020-10-05_15.17.28_ang5w1.png" alt="カレンダー" class="help-image">
     </div>
     <div class="card-post text-center px-5 py-4 my-5">
          <h2 class="text-left mb-4 my-5">気軽に育毛に関する情報を投稿しあおう</h2>
          <p class="text-left">生え際は気になるけど一体どうやっておでこの後退を防いだらいいかわからない。</p>
          <p class="text-left">巷にはアフィリエイト目的の記事が多くて実際どれが効果があるのかわからない。</p>
          <p class="text-left">病院やクリニックってどうなんだろう、どこがいいんだろう？</p>
          <p class="text-left">他の人がおでこの後退を防ぐために日常的にしていることってなんだろう？</p>
          <p class="text-left">ODECOLOGはサブ機能として育毛に関する情報を共有することができます。</p>
          <p class="text-left">このODECOLOGを利用するユーザーの方々はおでこの一進一退の攻防に関心がある方々の集まりです。</p>
          <p class="text-left">同じような悩みを持った人達どうしで育毛に関する良質な情報をシェアしましょう。</p>
          <p class="text-left">気になっていることがあるなら質問を投稿しても構いません。</p>
          <img src="https://res.cloudinary.com/tatsu/image/upload/v1601891643/%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88_2020-10-05_18.50.59_iffhjq.png" alt="コメント画像" class="help-image">
     </div>
     <div class="card-post text-left px-5 py-4 my-5">
          <h2 class="mb-4 my-5">目標とお願い</h2>
          <p>ここまでお読みお読みいただき誠にありがとうございます。</p>

          <p>ODECOLOGは記録を残すツールですが</p>
          <p>最終的には育毛で「良いものは良い、悪いものは悪い」とわかるような世界を目指します。</p>
          <p>世の中には育毛に関するいい情報、怪しい情報があります。</p>
          <p>医学は日々進歩しているので正解は分かりませんが、みなさんの貴重な経験にはとても価値があります。</p>
          <p>ODECOLOGはまだ始まったばかりのサービスで目標の実現のためにはみなさまの協力が必要不可欠です。</p>
          <p>おでこの記録をとるだけでなく</p>
          <p>同じ悩みを持ったユーザーどうし、あなたの貴重な経験や失敗談、おすすめ等をどんどん投稿してください。</p>
          <p>よろしくお願いします。</p>
          <p>また、サービスの改善やご要望にも真摯に対応いたしますので、お問い合わせフォームよりお寄せください。</p>

          <p>最後までお読みいただきありがとうございました。</p>
          <p>2020年10月 ODECOLOG運営</p>
     </div>
</div>
@endsection
