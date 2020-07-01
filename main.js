function validateNo() {
    let number = document.forms["signup"]["contact"].value;
    if(number[0]==='0'){
        var len = number.length;
        if(len!=10){
            document.getElementById("span").style.display = "";
            return false;
        }
        return true;
    }
}

    //document.getElementById("submit").addEventListener("click",validateNo());