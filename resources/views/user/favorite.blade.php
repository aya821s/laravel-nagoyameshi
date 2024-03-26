<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>お気に入り一覧</title>
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
     </header>

     <hr>

     <main>
     <h1>お気に入り一覧</h1>
     @if (session('flash_message'))
        <div role="alert">
             <p>{{ session('flash_message') }}</p>
        </div>
     @endif

     <table>
     <thead>
         <tr>
            <th scope="col">店舗名</th>
            <th scope="col">郵便番号</th>
            <th scope="col">住所</th>
            <th scope="col"></th>
         </tr>
     </thead>
     <tbody>
        @foreach ($favorite_restaurants as $favorite_restaurant)
        <tr>
        <td>
            <a href="{{ route('restaurants.show', $favorite_restaurant) }}">
                {{ $favorite_restaurant->name }}
            </a>
        </td>
        <td>{{ substr($favorite_restaurant->postal_code, 0, 3) . '-' . substr($favorite_restaurant->postal_code, 3) }}</td>
        <td>{{ $favorite_restaurant->address }}</td>
        <td>
        <a href="#" data-bs-toggle="modal" data-bs-target="#removeFavoriteModal" data-restaurant-id="{{ $favorite_restaurant->id }}" data-restaurant-name="{{ $favorite_restaurant->name }}">お気に入り解除</a>
        </td>
        </tr>
        @endforeach
     </tbody>
     </table>
     
     </main>
 <hr>
     <footer>
         <p>&copy; NAGOYAMESHI All rights reserved.</p>
     </footer>
 </body>
 
 </html>