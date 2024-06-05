var click = 0;

function logic() {

    document.body.classList.remove("hidden_scroll_y");

    if (click > 0) {
        var myobj = document.getElementById("bodyt");
        myobj.remove();
        var newTable = document.createElement('tbody');
        head2.after(newTable);
        newTable.id = 'bodyt';
    }
    var people = document.getElementById("people").value;
    var children = document.getElementById("children").value;
    var percent = document.getElementById("percent").value;
    var sumObez = document.getElementById("sumObez").value;
    var prihod = document.getElementById("prihod").value;
    var start = document.getElementById("start").value;
    var finish = document.getElementById("finish").value;
    var dates = Date.parse(start);
    var day = new Date(dates);
    var d = day.getDate();
    var dates2 = Date.parse(finish);
    var period = dates2 - dates;
    period /= 86400000;

    var adults = people - children;
    var pmin = adults * 14958 + children * 14169;
    document.getElementById("sk").innerHTML = period + " дней.";
    var sumPay = Math.round(period / 30);
    document.getElementById("kp").innerHTML = sumPay;
    var percentByMonth = percent / 12 / 100;
    document.getElementById("mp").innerHTML = percentByMonth * 100 + "%.";
    var everyMonthPay = prihod - sumObez - pmin;
    document.getElementById("efp").innerHTML = everyMonthPay + " рублей.";
    var fullCost = everyMonthPay * sumPay
    document.getElementById("psk").innerHTML = fullCost + " рублей.";

    ka = (percentByMonth * Math.pow((1 + percentByMonth), sumPay)) / ((Math.pow((1 + percentByMonth), sumPay)) - 1);
    var tk = (everyMonthPay) / ka;
    var factGot = 0;
    var overprice = 0;
    var fullCostH = tk;
    var everyMPchange = 0;
    var factPayPercent = 0;
    var date = dates + 2592000000;
    for (let i = 0; i < sumPay; i++) {
        overprice = (fullCostH / 100) * (percentByMonth * 100);
        factPayPercent += overprice;
        everyMPchange = everyMonthPay - overprice;
        factGot += everyMPchange;
        fullCostH -= everyMPchange;
        var date2 = new Date(date);
        var month = date2.getMonth() + 1;
        var year = date2.getFullYear();
        switch (month) {
            case 1:
                month = "Январь";
                break;
            case 2:
                month = "Февраль";
                break;
            case 3:
                month = "Март";
                break;
            case 4:
                month = "Апрель";
                break;
            case 5:
                month = "Май";
                break;
            case 6:
                month = "Июнь";
                break;
            case 7:
                month = "Июль";
                break;
            case 8:
                month = "Август";
                break;
            case 9:
                month = "Сентябрь";
                break;
            case 10:
                month = "Октябрь";
                break;
            case 11:
                month = "Ноябрь";
                break;
            case 12:
                month = "Декабрь";
                break;
        }
        var str = document.createElement('tr');
        bodyt.append(str);
        str.id = "month" + (i + 1);
        for (let j = 0; j < 6; j++) {
            var stolb = document.createElement('td');
            var stold1 = document.getElementById("month" + (i + 1));
            stold1.append(stolb);
            stolb.id = "data" + i + j;
        }
        for (let m = 0; m < 6; m++) {
            if (m == 0) {
                var pom = document.getElementById("data" + i + m);
                pom.innerHTML = i + 1;
            } else if (m == 1) {
                var pom = document.getElementById("data" + i + m);
                pom.innerHTML = d + " " + month + ", " + year;
            } else if (m == 2) {
                var pom = document.getElementById("data" + i + m);
                pom.innerHTML = everyMonthPay;
            } else if (m == 3) {
                var pom = document.getElementById("data" + i + m);
                pom.innerHTML = overprice;
            } else if (m == 4) {
                var pom = document.getElementById("data" + i + m);
                pom.innerHTML = everyMPchange;
            } else {
                var pom = document.getElementById("data" + i + m);
                if (fullCostH > 0) {
                    pom.innerHTML = fullCostH;
                } else { pom.innerHTML = "0"; }
            }
        }

        date += 2592000000;
    }
    var truePercent = factPayPercent / (tk / 100);

    document.getElementById('td2').innerHTML = fullCost;
    document.getElementById('td3').innerHTML = factPayPercent;
    document.getElementById('td4').innerHTML = factGot;
    document.getElementById("sp").innerHTML = factPayPercent + " рублей";
    document.getElementById("fs").innerHTML = factGot + " рублей";
    document.getElementById("pskg").innerHTML = truePercent + " %";

    var lyricsBox = document.getElementsByClassName("none");
    lyricsBox[0].classList.remove("none");

    var scroll = document.getElementById('div1');
    scroll.scrollIntoView();

    click++;
}