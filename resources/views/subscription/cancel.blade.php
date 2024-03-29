<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>有料プラン解約</title>
 </head>
 
 <body>
     <header>
         <nav>
         <li>
           <a href="{{ route('mypage') }}">マイページ</a>
         </li>
         <li>
            <a href="{{ route('restaurants.index') }}">店舗一覧</a>
         </li>
         </nav>
         <hr>
     </header>
 
     <main>
     <h1>有料プラン解約</h1>
     <p>有料プランを解約すると以下の特典を受けられなくなります。本当に解約してもよろしいですか？</p>
     <div>
     <div>有料プランの内容</div>
        <ul>
         <li>当日の2時間前までならいつでも予約可能</li>
         <li>店舗をお好きなだけお気に入りに追加可能</li>
         <li>レビューを投稿可能</li>
         <li>月額たったの300円</li>
        </ul>
     </div>

     <div>
     <form id="cardForm" action="{{ route('subscription.destroy') }}" method="post">
       @csrf
    <button>解約</button>
    </div>
     </main>
 
     <footer>
     <hr>
         <p>&copy; NAGOYAMESHI All rights reserved.</p>
     </footer>
 </body>
 
 </html>