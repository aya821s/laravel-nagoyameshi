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
     </div>
     @endforeach




    <!--
    <table> 
     <tr>
         <th>店名</th>
         <th>カテゴリー</th>
         <th>写真</th>
         <th>説明</th>
         <th>開店時間</th>
         <th>閉店時間</th>
         <th>最低価格</th>
         <th>最高価格</th>
         <th>郵便番号</th>
         <th>住所</th>
         <th>電話番号</th>
         <th>定休日</th>

     </tr>
     @foreach ($restaurants as $restaurant)
     <tr>
         <td>{{ $restaurant->name }}</td>
         <td>{{ $restaurant->category_id }}</td>
         <td>{{ $restaurant->image }}</td>
         <td>{{ $restaurant->description }}</td>
         <td>{{ $restaurant->opening_time }}</td>
         <td>{{ $restaurant->closing_time }}</td>
         <td>{{ $restaurant->lowest_price }}</td>
         <td>{{ $restaurant->highest_price }}</td>
         <td>{{ $restaurant->postal_code }}</td>
         <td>{{ $restaurant->address }}</td>
         <td>{{ $restaurant->phone_number }}</td>
         <td>{{ $restaurant->holidays }}</td>

         
         <td>
             
         </td>
     </tr>
     @endforeach
 </table> 

 -->

 </main>
 
 <footer>
     <hr>
     <p>&copy; NAGOYAMESHI All rights reserved.</p>
 </footer>
</body>

</html>