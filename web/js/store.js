
//ข้อมูลประวัติการแพ้ยา
function get_drugallergy(HOSPCODE, PID) {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=drugallergy/index";
    //var HOSPCODE = $("#hospcode").val();
    //var PID = $("#PID").val();
    var data = {HOSPCODE: HOSPCODE, PID: PID};

    $("#drugallergy").html(loading);
    $.post(url, data, function (result) {
        $("#drugallergy").html(result);
    });
}

//ข้อมูลประวัติโรคเรื้อรัง
function chronic() {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=chronic/index";
    var HOSPCODE = $("#HOSPCODE").val();
    var PID = $("#PID").val();

    $("#chronic").html(loading);

    var data = {HOSPCODE: HOSPCODE, PID: PID};
    $.post(url, data, function (result) {
        $("#chronic").html(result);
    });
}

//ข้อมูลรายการยา ณ วันที่ นั้น ๆ ทั้ง บันทึกผู้ป่วยนอก
function drug(head) {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=drug/index";
    var HOSPCODE = $("#HOSPCODE").val();
    var PID = $("#PID").val();
    var SEQ = $("#SEQ").val();

    $("#head-popup").text(head);
    $("#popup-detail").modal();

    $("#box-show-detail").html(loading);

    var data = {
        HOSPCODE: HOSPCODE,
        PID: PID,
        SEQ: SEQ};
    $.post(url, data, function (result) {
        $("#box-show-detail").html(result);
    });
}

//ข้อมูลรายหัตถการ ณ วันที่ นั้น ๆ ทั้ง บันทึกผู้ป่วยนอก
function procedure(head) {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=procedure/index";
    var HOSPCODE = $("#HOSPCODE").val();
    var PID = $("#PID").val();
    var SEQ = $("#SEQ").val();

    $("#head-popup").text(head);
    $("#popup-detail").modal();

    $("#box-show-detail").html(loading);

    var data = {
        HOSPCODE: HOSPCODE,
        PID: PID,
        SEQ: SEQ};
    $.post(url, data, function (result) {
        $("#box-show-detail").html(result);
    });
}

//ข้อมูลการนัด 
function appoint(head) {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=appointment/view";
    var HOSPCODE = $("#HOSPCODE").val();
    var PID = $("#PID").val();
    var SEQ = $("#SEQ").val();
    var data = {
        HOSPCODE: HOSPCODE,
        PID: PID,
        SEQ: SEQ};

    $("#head-popup").text(head);
    $("#popup-detail").modal();

    $("#box-show-detail").html(loading);

    $.post(url, data, function (result) {
        $("#box-show-detail").html(result);
    });
}
//ข้อมูลการนัด ณ ตาม คิว นั้น ๆ 
function appointment() {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=appointment/index";
    var HOSPCODE = $("#HOSPCODE").val();
    var PID = $("#PID").val();
    var SEQ = $("#SEQ").val();

    $("#appointment").html(loading);

    var data = {
        HOSPCODE: HOSPCODE,
        PID: PID,
        SEQ: SEQ};
    $.post(url, data, function (result) {
        $("#appointment").html(result);
    });
}

//ข้อมูลการนัด ทั้งหมด 
function appointment_all() {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=appointment/all";
    var HOSPCODE = $("#HOSPCODE").val();
    var PID = $("#PID").val();

    $("#appointment_all").html(loading);

    var data = {
        HOSPCODE: HOSPCODE,
        PID: PID
    };
    $.post(url, data, function (result) {
        $("#appointment_all").html(result);
    });
}

//ข้อมูลการรับวัคซีน 
function epi(head) {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=epi/index";
    var CID = $("#PERSONCID").val();
    var data = {
        CID: CID
    };

    $("#head-popup").text(head);
    $("#popup-detail").modal();

    $("#box-show-detail").html(loading);

    $.post(url, data, function (result) {
        $("#box-show-detail").html(result);
    });
}

//ข้อมูลรายการค่าใช้จ่าย ผู้ป่วยนอก
function expenses(head) {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=expenses/index";
    var HOSPCODE = $("#HOSPCODE").val();
    var PID = $("#PID").val();
    var SEQ = $("#SEQ").val();
    var data = {
        HOSPCODE: HOSPCODE,
        PID: PID,
        SEQ: SEQ
    };

    $("#head-popup").text(head);
    $("#popup-detail").modal();

    $("#box-show-detail").html(loading);

    $.post(url, data, function (result) {
        $("#box-show-detail").html(result);
    });
}

//ข้อมูลแล็บ
function labfu(head) {
    var loading = "<center><i class='fa fa-spinner fa-spin text-success'></i></center>";
    var url = "index.php?r=labfu/index";
    var HOSPCODE = $("#HOSPCODE").val();
    var PID = $("#PID").val();
    var SEQ = $("#SEQ").val();
    var data = {
        HOSPCODE: HOSPCODE,
        PID: PID,
        SEQ: SEQ
    };

    $("#head-popup").text(head);
    $("#popup-detail").modal();

    $("#box-show-detail").html(loading);

    $.post(url, data, function (result) {
        $("#box-show-detail").html(result);
    });
}





