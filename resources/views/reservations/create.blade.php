<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>レストラン予約</title>
 </head>
 
 <body>
     <header>
         <nav>
         <li>
           <a href="{{ route('mypage') }}">マイページ</a>
         </li>
         </nav>
         <hr>
     </header>
     
     <main>
        <div>
            <h1 class="text-center">{{ $restaurant->name }}</h1>
                @if ($restaurant->image !== "")
                    <img src="{{ asset($restaurant->image) }}" width="200" height="150"> 
                @else
                    <img src="{{ asset('img/dummy.png')}}">
                 @endif

                <p class="text-center">
                    <span class="nagoyameshi-star-rating me-1" data-rate="{{ round($restaurant->reviews->avg('score') * 2) / 2 }}"></span>
                    {{ number_format(round($restaurant->reviews->avg('score'), 2), 2) }}（{{ $restaurant->reviews->count() }}件）
                </p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('reservations.store', $restaurant) }}">
                    @csrf
                    <input type="hidden" name="restaurant_id", value="{{ $restaurant->id }}">
                    <div class="form-group row mb-3">
                        <label for="reservation_date">予約日</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="reservation_date" name="reservation_date" value="{{ old('reservation_date') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="reservation_time" class="col-md-5 col-form-label text-md-left fw-bold">時間</label>
                        <div class="col-md-7">
                            <select class="form-control form-select" id="reservation_time" name="reservation_time">
                                <option value="" hidden>選択してください</option>
                                @for ($i = 0; $i <= (strtotime($restaurant->closing_time) - strtotime($restaurant->opening_time)) / 1800; $i++)
                                    {{ $reservation_time = date('H:i', strtotime($restaurant->opening_time . '+' . $i * 30 . 'minute')) }}
                                    @if ($reservation_time == old('reservation_time'))
                                        <option value="{{ $reservation_time }}" selected>{{ $reservation_time }}</option>
                                    @else
                                        <option value="{{ $reservation_time }}">{{ $reservation_time }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="number_of_people" class="col-md-5 col-form-label text-md-left fw-bold">人数</label>

                        <div class="col-md-7">
                            <select class="form-select" id="number_of_people" name="number_of_people">
                                <option value="" hidden>選択してください</option>
                                @for ($i = 1; $i <=50; $i++)
                                    <option value="{{ $i }}">{{ $i }}名</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-center mb-4">
                        <button type="submit" class="btn text-white shadow-sm w-50 nagoyameshi-btn">予約する</button>
                    </div>
                </form>
                <a href="{{ route('restaurants.show', $restaurant->id) }}">店舗情報に戻る</a>



        </div>
  
















     </main>
 
 <footer>
     <hr>
     <p>&copy; NAGOYAMESHI All rights reserved.</p>
 </footer>
</body>

</html>