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
            url: 'data.php',
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
            $('input#inputNama').val(event.cc_name);
            $('input#inputUrl').val(event.url);
            $('textarea#inputContent').val(event.content);
            $('textarea#inputCopywriting').val(event.copywriting);
            $('select#inputStatus').append('<option selected value="' + event.status + '">' + event.status + '</option>');
            $('select#inputPillar').append('<option selected value="' + event.cp_name + '">' + event.cp_name + '</option>');
            $('input#inputTanggal').val(event.date);
            $('input#inputJam').val(event.time);
            if (event.revision == "") {
                $('textarea#inputRevisi').addClass('d-none');
                $('label[for="inputRevisi"]').addClass('d-none');
            } else {
                $('textarea#inputRevisi').val(event.revision);
            }
            $('#viewKontenModal').modal();
        },
    });
});