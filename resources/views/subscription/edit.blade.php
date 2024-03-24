<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>会員情報</title>
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
     <h1>お支払い方法</h1>



<div>
    <div>カード種別</div>
    <div>カード名義人</div>
    <div>カード番号</div>

</div>


<form action="{{ route('subscription.store') }}" method="post">
    @csrf
    <input type="text" placeholder="カード名義人" required>
    <br>
    <input type="text" placeholder="カード番号　月/年　CVV" required>

</form>

<div>
    <button>変更</button>
</div>

     </main>
 
     <footer>
     <hr>
         <p>&copy; NAGOYAMESHI All rights reserved.</p>
     </footer>
 </body>
 
 </html>