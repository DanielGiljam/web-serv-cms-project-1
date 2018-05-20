function currency_convert() {

    let request;

    if(window.XMLHttpRequest) request = new XMLHttpRequest();
    else request = new ActiveXObject("Microsoft.XMLHTTP");

    request.open('GET', 'http://apilayer.net/api/live?access_key=6730aaf0ded444f30021d1b728d4d5c9&currencies=EUR,GBP,SEK,NOK&source=USD&format=1');

    request.onreadystatechange = function() {

        if ((request.readyState === 4) && (request.status === 200)) {

            const currencies = JSON.parse(request.responseText);

            switch (document.getElementById('currency_selector').value) {
                case 'USDEUR':
                    document.getElementById('annual_salary').innerHTML = "Annual salary: " +
                        currencies.quotes.USDEUR * document.getElementById('annual_salary_hidden').textContent;
                    break;
                case 'USDGBP':
                    document.getElementById('annual_salary').innerHTML = "Annual salary: " +
                        currencies.quotes.USDGBP * document.getElementById('annual_salary_hidden').textContent;
                    break;
                case 'USDSEK':
                    document.getElementById('annual_salary').innerHTML = "Annual salary: " +
                        currencies.quotes.USDSEK * document.getElementById('annual_salary_hidden').textContent;
                    break;
                case 'USDNOK':
                    document.getElementById('annual_salary').innerHTML = "Annual salary: " +
                        currencies.quotes.USDNOK * document.getElementById('annual_salary_hidden').textContent;
                    break;
                default:
                    document.getElementById('annual_salary').innerText = "Annual salary: " +
                        document.getElementById('annual_salary_hidden').textContent;
                    break;
            }
        }
    };

    request.send();
}