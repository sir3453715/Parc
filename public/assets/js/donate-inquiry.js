$(function () {

    // checkInOutdatepicker
    checkInOutdatepicker();
});



// checkInOutdatepicker
function checkInOutdatepicker() {

    if ($('.input-daterange')) {
        $('.input-daterange').each(function () {
            $(this).datepicker({
                endDate: 'today',
                format: "yyyy/mm/dd",
                language: "zh-TW",
                orientation: "bottom auto",
                autoclose: true
            });
        });

        $("#startDate").datepicker({
            format: "yyyy/mm/dd",
            language: "zh-TW",
            orientation: "bottom auto",
            autoclose: true
        });

        $("#endDate").datepicker({
            endDate: 'today',
            format: "yyyy/mm/dd",
            language: "zh-TW",
            orientation: "bottom auto",
            autoclose: true
        });
    }
}

