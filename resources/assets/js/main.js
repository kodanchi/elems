/**
 * Created by User on 8/21/2016.
 */

$('[data-submenu]').submenupicker();

function showCal() {
    if (cal.isHidden()) cal.show();
    else cal.hide();
}

function numberInput(event) {
    return event.charCode >= 48 && event.charCode <= 57
}

function lengthValidation(len, inputS) {
    var input = inputS;
    if(typeof input.value !== 'undefined'){
        if(input.value.length < len )
            return true;
        else
            return false;
    }else {
        return true;
    }

}
