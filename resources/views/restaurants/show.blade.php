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
     
  <br/>

<hr>

     
     <div>
     <a href="{{ route('restaurants.review') }}">レビュー投稿</a>
         <div>
         <form method="POST" action="{{ route('reviews.store') }}">
         @csrf
         <h4>評価</h4>
                 <select name="score" class="form-control m-2 review-score-color">
                 <option value="5" class="review-score-color">★★★★★</option>
                 <option value="4" class="review-score-color">★★★★</option>
                 <option value="3" class="review-score-color">★★★</option>
                 <option value="2" class="review-score-color">★★</option>
                 <option value="1" class="review-score-color">★</option>
             </select>
         <p>レビュー内容</p>
                 @error('content')
                  <strong>レビュー内容を入力してください</strong>
                 @enderror
             <textarea name="content"></textarea>
             <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
             <button type="submit">レビューを追加</button>
         </form>
         </div>
     </div>
    

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