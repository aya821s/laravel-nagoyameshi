<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>レビュー投稿</title>
 </head>
 
 <body>
 <header>
         <nav>
         <li>
           <a href="{{ route('mypage') }}">マイページ</a>
         </li>
         </nav>
         <li>
         <a href="{{ route('restaurants.index') }}">店舗一覧</a>
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

     @auth
     <div>
        <h3>レビュー投稿</h3>
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
     @endauth

 </main>
 
 <footer>
     <hr>
     <p>&copy; NAGOYAMESHI All rights reserved.</p>
 </footer>
</body>

</html>