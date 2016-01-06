function get_drugallergy(HOSPCODE, PID) {
    var url = "index.php?r=drugallergy/index";
    //var HOSPCODE = $("#hospcode").val();
    //var PID = $("#PID").val();

    var data = {HOSPCODE: HOSPCODE, PID: PID};
    $.post(url, data, function (result) {
        $("#drugallergy").html(result);
    });
}

