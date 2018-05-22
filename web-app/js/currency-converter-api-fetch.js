function get_currency($currency_preference) {

    const baseValue = parseInt(document.getElementById('annual-salary-hidden').innerHTML);

    let destinationElement = document.getElementById('annual-salary');

    let request;

    if(window.XMLHttpRequest) request = new XMLHttpRequest();
    else request = new ActiveXObject("Microsoft.XMLHTTP");

    request.open('GET', 'http://apilayer.net/api/live?access_key=6730aaf0ded444f30021d1b728d4d5c9&currencies=EUR,GBP,SEK,NOK&source=USD&format=1');

    request.onreadystatechange = function() {

        if ((request.readyState === 4) && (request.status === 200)) {

            const currencies = JSON.parse(request.responseText);

            switch ($currency_preference) {
                case 1:
                    destinationElement.innerHTML = "Annual salary: " + (currencies.quotes.USDEUR * baseValue).toLocaleString("de-DE", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + " EUR";
                    break;
                case 2:
                    destinationElement.innerHTML = "Annual salary: " + (currencies.quotes.USDGBP * baseValue).toLocaleString("de-DE", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + " GBP";
                    break;
                case 3:
                    destinationElement.innerHTML = "Annual salary: " + (currencies.quotes.USDSEK * baseValue).toLocaleString("de-DE", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + " SEK";
                    break;
                case 4:
                    destinationElement.innerHTML = "Annual salary: " + (currencies.quotes.USDNOK * baseValue).toLocaleString("de-DE", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + " NOK";
                    break;
                default:
                    destinationElement.innerHTML = "Annual salary: " + baseValue.toLocaleString("de-DE", {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " USD";
            }
        }
    };

    request.send();
}