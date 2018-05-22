const elementId = 'reg-form-annual-salary-input';
const hiddenElementId = 'reg-form-annual-salary-hidden';
const currencySelectorId = 'reg-form-currency-preference';

function currency_convert() {

    if (document.getElementById(hiddenElementId).value === '') return;

    let request;

    if(window.XMLHttpRequest) request = new XMLHttpRequest();
    else request = new ActiveXObject("Microsoft.XMLHTTP");

    request.open('GET', 'http://apilayer.net/api/live?access_key=6730aaf0ded444f30021d1b728d4d5c9&currencies=EUR,GBP,SEK,NOK&source=USD&format=1');

    request.onreadystatechange = function() {

        if ((request.readyState === 4) && (request.status === 200)) {

            const currencies = JSON.parse(request.responseText);

            switch (document.getElementById(currencySelectorId).value) {
                case 'USDEUR':
                    document.getElementById(elementId).value = (currencies.quotes.USDEUR * document.getElementById(hiddenElementId).value).toLocaleString("de-DE", {maximumFractionDigits: 0});
                    break;
                case 'USDGBP':
                    document.getElementById(elementId).value = (currencies.quotes.USDGBP * document.getElementById(hiddenElementId).value).toLocaleString("de-DE", {maximumFractionDigits: 0});
                    break;
                case 'USDSEK':
                    document.getElementById(elementId).value = (currencies.quotes.USDSEK * document.getElementById(hiddenElementId).value).toLocaleString("de-DE", {maximumFractionDigits: 0});
                    break;
                case 'USDNOK':
                    document.getElementById(elementId).value = (currencies.quotes.USDNOK * document.getElementById(hiddenElementId).value).toLocaleString("de-DE", {maximumFractionDigits: 0});
                    break;
                default:
                    document.getElementById(elementId).value = document.getElementById(hiddenElementId).value;
                    break;
            }
        }
    };

    request.send();
}

function currency_convert_inverse() {

    let request;

    if(window.XMLHttpRequest) request = new XMLHttpRequest();
    else request = new ActiveXObject("Microsoft.XMLHTTP");

    request.open('GET', 'http://apilayer.net/api/live?access_key=6730aaf0ded444f30021d1b728d4d5c9&currencies=EUR,GBP,SEK,NOK&source=USD&format=1');

    request.onreadystatechange = function() {

        if ((request.readyState === 4) && (request.status === 200)) {

            const currencies = JSON.parse(request.responseText);

            switch (document.getElementById(currencySelectorId).value) {
                case 'USDEUR':
                    document.getElementById(hiddenElementId).value = (document.getElementById(elementId).value / currencies.quotes.USDEUR).toLocaleString("de-DE", {maximumFractionDigits: 0});
                    break;
                case 'USDGBP':
                    document.getElementById(hiddenElementId).value = (document.getElementById(elementId).value / currencies.quotes.USDGBP).toLocaleString("de-DE", {maximumFractionDigits: 0});
                    break;
                case 'USDSEK':
                    document.getElementById(hiddenElementId).value = (document.getElementById(elementId).value / currencies.quotes.USDSEK).toLocaleString("de-DE", {maximumFractionDigits: 0});
                    break;
                case 'USDNOK':
                    document.getElementById(hiddenElementId).value = (document.getElementById(elementId).value / currencies.quotes.USDNOK).toLocaleString("de-DE", {maximumFractionDigits: 0});
                    break;
                default:
                    document.getElementById(hiddenElementId).value = (document.getElementById(elementId).value).toLocaleString("de-DE", {maximumFractionDigits: 0});
                    break;
            }
        }
    };

    request.send();
}