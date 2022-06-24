$(document).ready(function () {
    // show data onclick pillarModal
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek'
        },
        themeSystem: 'bootstrap4',
        timeFormat: 'H:mm',
        navLinks: true, // can click day/week names to navigate views
        eventLimit: true, // allow "more" link when too many events
        events: {
            url: 'data.php?kategori=' + $('#loadKategoriKalendar').val(),
        },
        eventRender: function (event, element, view) {
            // if (event.allDay === 'true') {
            //     event.allDay = true;
            // } else {
            //     event.allDay = false;
            // }
        },
        eventClick: function (event) {
            console.log(event);
            $('input#detailNama').val(event.cc_name);
            $('input#detailUrl').val(event.url);
            $('textarea#detailContent').val(event.content);
            $('textarea#detailCopywriting').val(event.copywriting);
            $('select#detailStatus').append('<option selected value="' + event.status + '">' + event.status + '</option>');
            $('select#detailPillar').append('<option selected value="' + event.cp_name + '">' + event.cp_name + '</option>');
            $('input#detailTanggal').val(event.date);
            $('input#detailJam').val(event.time);
            if (event.revision == "") {
                $('textarea#detailRevisi').addClass('d-none');
                $('label[for="detailRevisi"]').addClass('d-none');
            } else {
                $('textarea#detailRevisi').val(event.revision);
            }
            $('#viewKontenModal').modal();
        },
    });
});