function currency_convert(){
    var request;
    if(window.XMLHttpRequest){
        request = new XMLHttpRequest();
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    request.open('GET', 'http://apilayer.net/api/live?access_key=6730aaf0ded444f30021d1b728d4d5c9&currencies=EUR,GBP,SEK,NOK&source=USD&format=1');

    request.onreadystatechange = function(){
        if((request.readyState===4) && (request.status===200)){
            var currencies = JSON.parse(request.responseText);
            //console.log(currencies);
            if(document.getElementById('currency_selector').value === 'USD')
            {document.getElementById('annual_salary').innerText = "Annual salary: " + document.getElementById('salary_base').textContent;}

            if(document.getElementById('currency_selector').value === 'USDEUR')
            {document.getElementById('annual_salary').innerHTML = "Annual salary: " + currencies.quotes.USDEUR * document.getElementById('salary_base').textContent;}

            if(document.getElementById('currency_selector').value === 'USDGBP')
            {document.getElementById('annual_salary').innerHTML = "Annual salary: " + currencies.quotes.USDGBP * document.getElementById('salary_base').textContent;}

            if(document.getElementById('currency_selector').value === 'USDSEK')
            {document.getElementById('annual_salary').innerHTML = "Annual salary: " + currencies.quotes.USDSEK * document.getElementById('salary_base').textContent;}

            if(document.getElementById('currency_selector').value === 'USDNOK')
            {document.getElementById('annual_salary').innerHTML = "Annual salary: " + currencies.quotes.USDNOK * document.getElementById('salary_base').textContent;}
        }
    }
    request.send();
}