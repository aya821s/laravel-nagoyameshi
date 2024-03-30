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
        
        <h1 class="mb-3 text-center">予約一覧</h1>

                @if (session('flash_message'))
                    <div class="alert alert-info" role="alert">
                        <p class="mb-0">{{ session('flash_message') }}</p>
                    </div>
                @endif

                @if (session('error_message'))
                    <div class="alert alert-danger" role="alert">
                        <p class="mb-0">{{ session('error_message') }}</p>
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">店舗名</th>
                            <th scope="col">予約日時</th>
                            <th scope="col">人数</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>
                                    <a href="{{ route('restaurants.show', $reservation->restaurant) }}">
                                        {{ $reservation->restaurant->name }}
                                    </a>
                                </td>
                                <td>{{ date('Y年n月j日 G時i分', strtotime($reservation->reserved_datetime)) }}</td>
                                <td>{{ $reservation->number_of_people }}名</td>
                                <td>
                                    @if ($reservation->reserved_datetime > now())

                                    <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('予約をキャンセルしてもよろしいですか？');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">キャンセル</button>
                                     </form>

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $reservations->links() }}
                </div>
            </div>
        </div>


 </main>
 
 <footer>
     <hr>
     <p>&copy; NAGOYAMESHI All rights reserved.</p>
 </footer>
</body>

</html>