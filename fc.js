$(document).ready(function () {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'hide',
            right: 'title'
        },
        height: 250,
        contentHeight:'auto',
        timeFormat: 'H:mm',
        eventLimit: true,
        eventLimitText: "konten lainnya",
        views: {month:{eventLimit: 2}},
        events: {
            url: 'crud/data.php?kategori=' + $('#loadKategoriKalendar').val(),
        },
        eventRender: function(event, element){
            if(event.icon) {
                element.find('.fc-title').prepend("<br/><i class='fa fa-" + event.icon + "'></i> ");
            }
        },
        eventClick: function (event) {
            _event = event;
            console.log(_event);
            // Init Variable
            const id = event.id_calendar_content;
            const category = event.ccc_name;
            const name = event.cc_name;
            const content = event.content;
            const copywriting = event.copywriting;
            const status = event.status;
            const pillarName = event.cp_name;
            const color = event.color;
            const url = event.url_content;
            const revision = event.revision;

            // Setting Waktu = getDay, getDate, getMonth, getFullYear
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const date = new Date(event.date);
            const day = days[date.getDay()];
            const dateString = day + ', ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear() + ' - ';

            // change time format to hh:mm
            const time = event.time.split(':');
            const timeString = time[0] + ':' + time[1];

            // Tampilan Detail Modal Konten
            $('#detailCategory').text(category + ' |');
            $('#detailName').text(name);
            $('#detailContent').text(content);
            $('#detailCopywriting').text(copywriting);
            $('#detailStatus').text(status);
            $('#detailStatus').css('background-color', color);
            $('#detailPillar').text(pillarName);
            $('#detailDate').text(dateString);
            $('#detailTime').text(timeString);

            // Cek ada URL atau Tidak
            if (url == "" || url == null) {
                $('#detailUrlContainer').addClass('d-none');
            } else {
                $('#detailUrl').text(url);
                $('#detailUrl').attr('href', 'https://' + url);
                $('#detailUrlContainer').removeClass('d-none');
            }

            // Status Revisi atau Tidak
            if (status === 'Revision') {
                if (revision == '' || revision == null) {
                    $('#detailRevision').text('Segera melakukan revisi konten');
                    $('#detailRevision').addClass('text-danger font-italic');
                } else {
                    $('#detailRevision').text(revision);
                }
                $('#detailRevision').removeClass('d-none');
                $('#detailRevisionContainer').removeClass('d-none');
            } else {
                $('#detailRevision').addClass('d-none');
                $('#detailRevisionContainer').addClass('d-none');
            }

            // Cek Pernah Menulis Revisi
            if (revision != '' && revision != null) {
                $('#detailRevision').removeClass('font-italic');
            }

            // Delete Konten
            $('#delKonten').attr('onclick', 'delKonten(' + id + ')');

            // Edit
            $('#editKonten').attr('onclick', 'editKonten()');

            // Tampilan Modal
            $('#viewKontenModal').modal();
        },
    });
    $('.fc-today-button').text('bulan ini');
});