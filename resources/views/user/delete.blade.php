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
         <a href="{{ route('subscription.create') }}">有料プラン登録</a>
         </li>

         <li>
            <a href="{{ route('restaurants.index') }}">店舗一覧</a>
         </li>

             <form method="POST" action="{{ route('logout') }}">
             @csrf
                <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('ログアウト') }}
                </x-dropdown-link>
             </form>
             </a>

         </nav>
         
         <hr>
     </header>
 
     <main>
         <h1>退会の確認</h1>
         <div>
             <p>一度退会するとデータはすべて削除され、復旧はできません。</p>
             <form method="POST" action="{{ route('mypage.destroy') }}" onsubmit="return confirm('本当に退会しますか？');">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">退会する</button>
             </form>
         </div>
        
     </main>
 
     <footer>
         <hr>
         <p>&copy; NAGOYAMESHI All rights reserved.</p>
     </footer>
 </body>
 
 </html>