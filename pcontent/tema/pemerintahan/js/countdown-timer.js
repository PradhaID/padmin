var sec = 0;   // set the seconds
//var min=60;
function confirmationSub() {
    var answer = confirm("Apakah anda yakin?")
    if (answer){
        document.forms["soalForm"].submit();
    } else {
        //countDown();
    }
}
function countDown(min) {
    min=parseInt(min);
    if (min<=0 && sec<=00){
        time="-";
        sec = "00"; window.clearTimeout(SD);
        document.getElementById("theTime").innerHTML="-";
    }
    if (sec<=9) {
        sec = "0" + sec;
    }
    time = (min<=9 ? "0" + min : min) + " menit dan " + sec + " detik ";
    if (time!="unlimited" && document.getElementById) {
        theTime.innerHTML = time;
    }
    sec--;
    if (sec == -01) {
        sec = 59;
        min = min - 1;
    } else {
        min = min;
    }
    SD=window.setTimeout("countDown();", 1000);
    if (min == '00' && sec == '00') {
        sec = "00"; window.clearTimeout(SD);
    }
}
