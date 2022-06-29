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
            // Setting Waktu = getDay, getDate, getMonth, getFullYear
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const date = new Date(event.date);
            const day = days[date.getDay()];
            const dateString = day + ', ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear() + ' - ';
            
            // change time format to hh:mm
            const time = event.time.split(':');
            const timeString = time[0] + ':' + time[1];

            $('#detailCategory').text(event.ccc_name + ' |');
            $('#detailName').text(event.cc_name);
            $('#detailUrl').text(event.url);
            $('#detailContent').text(event.content);
            $('#detailCopywriting').text(event.copywriting);
            $('#detailStatus').text(event.status);
            $('#detailStatus').css('background-color', event.color);
            $('#detailPillar').text(event.pillar);
            $('#detailDate').text(dateString);
            $('#detailTime').text(timeString);
            if(event.url == "" || event.url == null){
                $('#detailUrlContainer').addClass('d-none');
            } else {
                $('#detailUrlContainer').removeClass('d-none');
            }
            if (event.status === 'Revision') {
                if (event.revision == '' || event.revision == null) {
                    $('#detailRevision').text('Belum mengisi kolom revisi');
                    $('#detailRevision').addClass('text-muted font-italic');
                } else {
                    $('#detailRevision').text(event.revision);
                }
                $('#detailRevision').removeClass('d-none');
                $('#detailRevisionContainer').removeClass('d-none');
            } else {
                $('#detailRevision').addClass('d-none');
                $('#detailRevisionContainer').addClass('d-none');
            }
            $('#viewKontenModal').modal();
        },
    });
});