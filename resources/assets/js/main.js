/**
 * Created by User on 8/21/2016.
 */
var //cal1 = new Calendar(),
    cal = new Calendar(true, 0, true, false),
    //cal1Mode = cal1.isHijriMode(),
    calMode = cal.isHijriMode();

$(document).ready(function () {

    //var date1 = document.getElementById('date-1');
        //date2 = document.getElementById('date-2');
    var date = document.getElementById('date');
    var birthDate = document.getElementById('birth_date');

    //document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal').appendChild(cal.getElement());
    //cal1.show();
    //cal.show();
    setDateFields();

    /*cal1.callback = function() {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal.disableCallback(true);
            cal.changeDateMode();
            cal.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            calMode = cal.isHijriMode();
        }
        else
            cal.setTime(cal1.getTime());
        setDateFields();
    };*/

    /*cal.callback = function() {
        if (calMode !== cal.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            calMode = cal.isHijriMode();
        }
        else
            cal1.setTime(cal.getTime());
        setDateFields();
    };*/

    cal.callback = function() {
        if (calMode !== cal.isHijriMode()) {
            calMode = cal.isHijriMode();
        }
        else
            //cal1.setTime(cal.getTime());
        setDateFields();
    };

    function setDateFields() {
        //date1.value = cal1.getDate().getDateString();
        date.value = cal.getDate().getDateString();
        var g = cal.getDate().getGregorianDate()+"";
        birthDate.value = g.substring(0,15);

    }
    $('#selectCalendar').change(function() {
        if($(this).val() == 'h'){
            cal.changeDateMode();
            cal.show();
        }else if($(this).val() == 'g'){
            cal.changeDateMode();
            cal.show();
        }
    });




    $(document).on('keypress','#nid',function () {
        return lengthValidation(10,this);
    });
});
/*
function showCal1() {
    if (cal1.isHidden()) cal1.show();
    else cal1.hide();
}*/

function showCal() {
    if (cal.isHidden()) cal.show();
    else cal.hide();
}

function numberInput(event) {
    return event.charCode >= 48 && event.charCode <= 57
}

function lengthValidation(len, inputS) {
    //this.value = '2222';
    var input = inputS;
    //console.log('1value: '+input.value);
    if(typeof input.value !== 'undefined'){
        console.log('2value: '+input.value);

        if(input.value.length < len )
            return true;
        else
            return false;
    }else {
        return true;
    }

}
