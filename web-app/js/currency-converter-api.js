function currency_convert() {

    const elementId = 'reg-form-annual-salary';
    const hiddenElementId = 'reg-form-annual-salary-hidden';
    const currencySelectorId = 'reg-form-currency-preference';

    let request;

    if(window.XMLHttpRequest) request = new XMLHttpRequest();
    else request = new ActiveXObject("Microsoft.XMLHTTP");

    request.open('GET', 'http://apilayer.net/api/live?access_key=6730aaf0ded444f30021d1b728d4d5c9&currencies=EUR,GBP,SEK,NOK&source=USD&format=1');

    request.onreadystatechange = function() {

        if ((request.readyState === 4) && (request.status === 200)) {

            const currencies = JSON.parse(request.responseText);

            switch (document.getElementById(currencySelectorId).value) {
                case 'USDEUR':
                    document.getElementById(elementId).value = (currencies.quotes.USDEUR * document.getElementById(hiddenElementId).textContent).toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    break;
                case 'USDGBP':
                    document.getElementById(elementId).value = (currencies.quotes.USDGBP * document.getElementById(hiddenElementId).textContent).toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    break;
                case 'USDSEK':
                    document.getElementById(elementId).value = (currencies.quotes.USDSEK * document.getElementById(hiddenElementId).textContent).toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    break;
                case 'USDNOK':
                    document.getElementById(elementId).value = (currencies.quotes.USDNOK * document.getElementById(hiddenElementId).textContent).toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    break;
                default:
                    document.getElementById(elementId).value = document.getElementById(hiddenElementId).textContent;
                    break;
            }
        }
    };

    request.send();
}

function currency_convert_inverse() {

    const elementId = 'reg-form-annual-salary';
    const hiddenElementId = 'reg-form-annual-salary-hidden';
    const currencySelectorId = 'reg-form-currency-preference';

    let request;

    if(window.XMLHttpRequest) request = new XMLHttpRequest();
    else request = new ActiveXObject("Microsoft.XMLHTTP");

    request.open('GET', 'http://apilayer.net/api/live?access_key=6730aaf0ded444f30021d1b728d4d5c9&currencies=EUR,GBP,SEK,NOK&source=USD&format=1');

    request.onreadystatechange = function() {

        if ((request.readyState === 4) && (request.status === 200)) {

            const currencies = JSON.parse(request.responseText);

            switch (document.getElementById(currencySelectorId).value) {
                case 'USDEUR':
                    document.getElementById(hiddenElementId).innerHTML = (document.getElementById(elementId).value / currencies.quotes.USDEUR).toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    break;
                case 'USDGBP':
                    document.getElementById(hiddenElementId).innerHTML = (document.getElementById(elementId).value / currencies.quotes.USDGBP).toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    break;
                case 'USDSEK':
                    document.getElementById(hiddenElementId).innerHTML = (document.getElementById(elementId).value / currencies.quotes.USDSEK).toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    break;
                case 'USDNOK':
                    document.getElementById(hiddenElementId).innerHTML = (document.getElementById(elementId).value / currencies.quotes.USDNOK).toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    break;
                default:
                    document.getElementById(hiddenElementId).innerText = (document.getElementById(elementId).value).toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    break;
            }
        }
    };

    request.send();
}

function get_currency($currency_preference) {

    const elementId = 'annual_salary';
    const hiddenElementId = 'annual_salary_hidden';

    let request;

    if(window.XMLHttpRequest) request = new XMLHttpRequest();
    else request = new ActiveXObject("Microsoft.XMLHTTP");

    request.open('GET', 'http://apilayer.net/api/live?access_key=6730aaf0ded444f30021d1b728d4d5c9&currencies=EUR,GBP,SEK,NOK&source=USD&format=1');

    request.onreadystatechange = function() {

        if ((request.readyState === 4) && (request.status === 200)) {

            const currencies = JSON.parse(request.responseText);

            switch ($currency_preference) {
                case 1:
                    document.getElementById(elementId).innerText = "Annual salary: " + (currencies.quotes.USDEUR * document.getElementById(hiddenElementId).textContent).toLocaleString("de-DE", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + " EUR";
                    break;
                case 2:
                    document.getElementById(elementId).innerText = "Annual salary: " + (currencies.quotes.USDGBP * document.getElementById(hiddenElementId).textContent).toLocaleString("de-DE", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + " GBP";
                    break;
                case 3:
                    document.getElementById(elementId).innerText = "Annual salary: " + (currencies.quotes.USDSEK * document.getElementById(hiddenElementId).textContent).toLocaleString("de-DE", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + " SEK";
                    break;
                case 4:
                    document.getElementById(elementId).innerText = "Annual salary: " + (currencies.quotes.USDNOK * document.getElementById(hiddenElementId).textContent).toLocaleString("de-DE", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + " NOK";
                    break;
                default:
                    document.getElementById(elementId).innerText = "Annual salary: " + (document.getElementById(hiddenElementId).value).toLocaleString("de-DE", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + " USD";
            }
        }
    };

    request.send();
}