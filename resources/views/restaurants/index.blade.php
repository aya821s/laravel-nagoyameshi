<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>レストラン一覧</title>
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
     @foreach($restaurants as $restaurant)
     <div>
        <a href="{{route('restaurants.show', $restaurant)}}">
             @if ($restaurant->image !== "")
             <img src="{{ asset($restaurant->image) }}" width="200" height="150"> 
             @else
             <img src="{{ asset('img/dummy.png')}}">
             @endif
        </a>
        <div>
             <p>
                 {{$restaurant->name}}<br>
                 <label>￥{{$restaurant->lowest_price}}〜{{$restaurant->highest_price}}</label><br>
                 <a href="{{ route('restaurants.show',$restaurant->id) }}">店舗詳細</a>
             </p>
        </div>

        <div>
     @guest
         <form action="{{ route('favorites.store', $restaurant->id) }}" method="post">
             @csrf
             <button type="submit">♡</button>
         </form>
     @else
         @if (Auth::user()->favorite_restaurants()->where('restaurant_id', $restaurant->id)->doesntExist())
         <form action="{{ route('favorites.store', $restaurant->id) }}" method="post">
             @csrf
             <button type="submit">♡</button>
         </form>
         @else
         <form action="{{ route('favorites.destroy', $restaurant->id) }}" method="post">
             @csrf
             @method('delete')
             <button type="submit">♥</button>
         </form>
         @endif
     @endguest
     </div> 

     </div>
     @endforeach

 </main>
 
 <footer>
     <hr>
     <p>&copy; NAGOYAMESHI All rights reserved.</p>
 </footer>
</body>

</html>