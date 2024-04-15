@extends('layouts.app')
 
@section('title', '料プラン登録')

@section('content')
<div class="container500vh">
	<h1 class="my-3 text-center">有料プラン登録</h1>
   	<div class="card mb-4">
        <div class="card-header text-center">
            有料プランの内容
    	</div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">・当日の2時間前までならいつでも予約可能</li>
            <li class="list-group-item">・店舗をお好きなだけお気に入りに追加可能</li>
            <li class="list-group-item">・レビューを投稿可能</li>
            <li class="list-group-item">・月額たったの300円</li>
    	</ul>
    </div>

	<div class="mb-2">
		<form id="payment-form" action="{{ route('subscription.store') }}" method="POST">
			@csrf
		    <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="カード名義人">
	    	<div class="mx-auto mb-2">
				<div class="form-group b-3">
					<div id="card-element"></div>
				</div>
			</div>
		</form>
		<div class="d-flex justify-content-center">
			<button type="submit" class="btn text-white orange-btn" id="card-button" data-secret="{{ $intent->client_secret }}">登録</button>
		</div>
		

    <script src="https://js.stripe.com/v3/"></script>
    <script>
	    const stripe = Stripe("{{ config('services.stripe.pb_key') }}")
	    const elements = stripe.elements()
	    const cardElement = elements.create('card')	
	    cardElement.mount('#card-element')
	
	    const cardHolderName = document.getElementById('card-holder-name')
	    const cardBtn = document.getElementById('card-button')
        const form = document.getElementById('payment-form')
		
	    form.addEventListener('submit', async (e) => {
	        e.preventDefault()	
	        cardBtn.disabled = true
	        const { setupIntent, error } = await stripe.confirmCardSetup(
	        	cardBtn.dataset.secret, {
	        		payment_method: {
	            	card: cardElement,
	                	billing_details: {
	                    	name: cardHolderName.value
	                	}   
	            	}
	            }
	        )
	        if(error) {	
	            cardBtn.disable = false
	        } else {
	            let token = document.createElement('input')
	            token.setAttribute('type', 'hidden')
	            token.setAttribute('name', 'token')
	            token.setAttribute('value', setupIntent.payment_method)
	            form.appendChild(token)
	            form.submit();
	        }
	    })
    </script>
</div>
@endsection