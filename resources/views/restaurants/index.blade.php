<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/bootstrap.min.css">
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
            <form action="{{ route('restaurants.index', $keyword) }}" method="GET">
                <div>
                    <input class="form-control samuraimart-header-search-input" name="keyword">
                    <button type="submit">検索</button>
                </div>
            </form>
        </div>
        </div>
        <div>
            @component('components.sidebar', ['categories' => $categories])
            @endcomponent
         <div>

         <div class="container">
             @if ($category !== null)
                 <a href="{{ route('top') }}">トップ</a> > {{ $category->name }}
                 <p>{{ $category->name }}の店舗が{{$total_count}}件見つかりました</p>
             @elseif ($keyword !== null)
                 <a href="{{ route('top') }}">>トップ</a> > 店舗一覧
                 <p>"{{ $keyword }}"の店舗が{{$total_count}}件見つかりました</p>
             @endif
         </div>

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
                 <a href="{{ route('restaurants.show', $restaurant) }}">店舗詳細</a>
                 
     @endforeach

     {{ $restaurants->links() }}

     @if ($category !== null)
        <a href="{{ route('restaurants.index') }}">店舗一覧に戻る</a>
     @endif
 </main>
 
 <footer>
     <hr>
     <p>&copy; NAGOYAMESHI All rights reserved.</p>
 </footer>
</body>

</html>