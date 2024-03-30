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
         <li>
         <a href="{{ route('subscription.create') }}">有料プラン登録</a>
         </li>

         <hr>
     </header>

     <main>
     
     <div>
 </div>
 <div>
     <h1> {{$restaurant->name}}</h1>
     @if (session('flash_message'))
             <p>{{ session('flash_message') }}</p>
     @endif

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
     <a href="{{ route('reservations.create', $restaurant) }}"><strong>予約</strong></a>
 </div>

     <div>
     @guest
         <form action="{{ route('favorites.store', $restaurant->id) }}" method="post">
             @csrf
             <button type="submit">♥ お気に入り追加</button>
         </form>
     @else
         @if (Auth::user()->favorite_restaurants()->where('restaurant_id', $restaurant->id)->doesntExist())
         <form action="{{ route('favorites.store', $restaurant->id) }}" method="post">
             @csrf
             <button type="submit">♥ お気に入り追加</button>
         </form>
         @else
         <form action="{{ route('favorites.destroy', $restaurant->id) }}" method="post">
             @csrf
             @method('delete')
             <button type="submit">♥ お気に入り解除</button>
         </form>
         @endif
     @endguest
     </div>                      
  </div>

  <hr>

  <h3>レビュー</h3>
 <div>
     @foreach($reviews as $review)
         <div>
             <h3 class="review-score-color">{{ str_repeat('★', $review->score) }}</h3>
             <p>{{$review->content}}</p>
              <label>{{$review->created_at}} {{$review->user->name}}</label>
         </div>
     @endforeach
     
     <div>
        <a href="{{ route('review.create', $restaurant) }}"><strong>レビュー投稿</strong></a>
     </div>
  <br/>

<hr>

 <div>
     <a href="{{ route('restaurants.index') }}">店舗一覧に戻る</a>
 </div>

 </main>
 
 <footer>
     <hr>
     <p>&copy; NAGOYAMESHI All rights reserved.</p>
 </footer>
</body>

</html>