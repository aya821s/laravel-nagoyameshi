<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>レストラン詳細</title>
 </head>
 
 <body>
     <header>
         <nav>
         <li>
           <a href="{{ route('mypage') }}">マイページ</a>
         </li>
         </nav>
     </header>

     <main>
     
     <div>
 </div>
 <div>
     <h1> {{$restaurant->name}}</h1>
     @if ($restaurant->image !== "")
     <img src="{{ asset($restaurant->image) }}" width="200" height="150"> 
     @else
      <img src="{{ asset('img/dummy.png')}}">
    　@endif
 </div>
 
 <div>
     {{$restaurant->description}}
 </div>

 <br>

 <div>
     <strong>営業時間</strong>
     {{ $restaurant->opening_time }}〜{{ $restaurant->closing_time }}
 </div>

 <div>
     <strong>平均予算</strong>
     {{ $restaurant->lowest_price }}〜{{ $restaurant->highest_price }}
 </div>

 <div>
     <strong>住所</strong>
     {{ $restaurant->postal_code }} {{ $restaurant->address }}
 </div>

 <div>
     <strong>電話番号</strong>
     {{ $restaurant->phone_number }}
 </div>

 <div>
     <strong>定休日</strong>
     {{ $restaurant->holidays }}
 </div>

 <div>
     <a href="{{ route('restaurants.index') }}">店舗一覧に戻る</a>
 </div>

 </main>
 
 <footer>
     <p>&copy; NAGOYAMESHI All rights reserved.</p>
 </footer>
</body>

</html>