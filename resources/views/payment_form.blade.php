<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
</head>

<body>
    <div id="dropin-container"></div>
    <button id="submit-button">Pay Now</button>

    <script>
        var button = document.querySelector('#submit-button');
        var dropin;
        axios.get('/client-token', {
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(function(response) {
                var clientToken = response.data.clientToken;

                braintree.dropin.create({
                    authorization: clientToken,
                    container: '#dropin-container'
                }, function(createErr, instance) {
                    if (createErr) {
                        console.error('Error creating Drop-in:', createErr);
                        return;
                    }

                    button.addEventListener('click', function() {
                        instance.requestPaymentMethod(function(err, payload) {
                            if (err) {
                                console.error('Error requesting payment method:', err);
                                return;
                            }

                            // Invia il payload.nonce al server per elaborare il pagamento
                            axios.post('/process-payment', {
                                    payment_method_nonce: payload.nonce,
                                    description: 'Descrizione del pagamento', // Modifica la descrizione se necessario
                                    amount: '10.00' // Modifica l'importo del pagamento se necessario
                                })
                                .then(function(response) {
                                    // Se il pagamento è andato a buon fine, reindirizza l'utente o mostra un messaggio di successo
                                    console.log(1, response);
                                })
                                .catch(function(error) {
                                    // Gestisci eventuali errori durante il pagamento
                                    console.error('Errore durante il pagamento:', error);
                                });
                        });
                    });
                });
            })
            .catch(function(error) {
                console.error('Errore durante il recupero del token di autorizzazione:', error);
            });
    </script>
</body>

</html>
