<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <form id="payment-form" action="{{ route('admin.operator-sponsorship.store', $operator_id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="sponsorship">Inserisci sponsorizzazione</label>
            <select id="sponsorship" name="sponsorship">
                @for($i=0; $i<sizeof($sponsorships); $i++)
                    <option value="{{ $sponsorships[$i]->id }}">{{ $sponsorships[$i]->duration }}</option>
                @endfor    
            </select>
        </div>
        <div id="dropin-container"></div>
        <input type="hidden" id="payment_method_nonce" name="payment_method_nonce">
        <button type="submit">Paga</button> <!-- Aggiunto il pulsante di pagamento -->
    </form>
</body>
</html>
<script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var clientToken = "{{ $clientToken }}";

    braintree.dropin.create({
        authorization: clientToken,
        container: '#dropin-container'
    }, function (createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }
                document.querySelector('#payment_method_nonce').value = payload.nonce;
                form.submit();
                
            });
        });
    });
</script>
