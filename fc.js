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
            url: 'crud/data.php?c=' + $('#dataByCategory').val(),
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
            const id = event.id_content;
            const category = event.name_category;
            const name = event.name_content;
            const content = event.content_content.replace(/\n/g, '<br/>');
            const copywriting = event.copywriting_content.replace(/\n/g, '<br/>');
            const status = event.status_content;
            const pillarName = event.name_pillar;
            const color = event.color;
            const url = event.url_content;
            const revision = event.revision;
            if (revision != null) {
                revision.replace(/\n/g, "<br />");
            }
            const reviewer = event.reviewer;

            // Setting Waktu = getDay, getDate, getMonth, getFullYear
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const date = new Date(event.date_content);
            const day = days[date.getDay()];
            const dateString = day + ', ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear() + ' - ';

            // change time format to hh:mm
            const time = event.time_content.split(':');
            const timeString = time[0] + ':' + time[1];

            // change datetime created_at with time
            const createdAtRevision = new Date(event.created_at_revision);
            const updatedAtRevision = new Date(event.updated_at_revision);
            // handle zero value on hour and minute
            const createdAtRevisionString = createdAtRevision.getDate() + ' ' + months[createdAtRevision.getMonth()] + ' ' + createdAtRevision.getFullYear() + ' - ' + (createdAtRevision.getHours() < 10 ? '0' + createdAtRevision.getHours() : createdAtRevision.getHours()) + ':' + (createdAtRevision.getMinutes() < 10 ? '0' + createdAtRevision.getMinutes() : createdAtRevision.getMinutes());
            const updatedAtRevisionString = updatedAtRevision.getDate() + ' ' + months[updatedAtRevision.getMonth()] + ' ' + updatedAtRevision.getFullYear() + ' - ' + (updatedAtRevision.getHours() < 10 ? '0' + updatedAtRevision.getHours() : updatedAtRevision.getHours()) + ':' + (updatedAtRevision.getMinutes() < 10 ? '0' + updatedAtRevision.getMinutes() : updatedAtRevision.getMinutes());

            // Tampilan Detail Modal Konten
            $('#detailCategory').text(category + ' |');
            $('#detailName').text(name);
            $('#detailContent').html(content);
            $('#detailCopywriting').html(copywriting);
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
                    $('#detailRevision').text('Belum ada pesan revisi untuk konten ini');
                    $('#detailReviewer').text('Belum ada reviewer');
                    $('#detailReviewer').addClass('font-italic');
                    $('#detailRevision').addClass('font-italic');
                } else {
                    $('#detailRevision').html(revision);
                    $('#detailReviewer').removeClass('font-italic');
                    $('#detailReviewer').html(reviewer + '<br/><i class="far fa-clock"></i> ' + (updatedAtRevisionString ? updatedAtRevisionString : createdAtRevisionString));
                }
                $('#detailRevision').removeClass('d-none');
                $('#detailRevisionContainer').removeClass('d-none');
                $('#detailReviewer').removeClass('d-none');
                $('#detailReviewerContainer').removeClass('d-none');
            } else {
                $('#detailRevision').addClass('d-none');
                $('#detailRevisionContainer').addClass('d-none');
                $('#detailReviewer').addClass('d-none');
                $('#detailReviewerContainer').addClass('d-none');
            }

            // Cek Pernah Menulis Revisi
            if (revision != '' && revision != null) {
                $('#detailRevision').removeClass('font-italic');
            }

            // Delete Konten
            $('#delContent').attr('onclick', 'delContent(' + id + ')');

            // Edit
            $('#editContent').attr('onclick', 'editContent()');

            // Tampilan Modal
            $('#viewKontenModal').modal();
        },
    });
    $('.fc-today-button').text('bulan ini');
});