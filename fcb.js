/**
 * Set Defualt Date and Time
 */

var setDefaultDate = function () {
    var date = new Date();
    // day and month with leading zeros
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    if (day < 10) {
        day = '0' + day;
    }
    if (month < 10) {
        month = '0' + month;
    }
    var date = year + '-' + month + '-' + day;
    $('#inputTanggal').val(date);
};

var setDefaultTime = () => {
    var date = new Date();
    var hours = date.getHours();
    if (hours < 10) {
        hours = '0' + hours;
    }
    var minutes = date.getMinutes();
    if (minutes < 10) {
        minutes = '0' + minutes;
    }
    var time = hours + ':' + minutes;
    $('#inputJam').val(time);
};

// Memunculkan tooltip di view modal konten
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// Show/Hide Textarea Revisi di Add Konten
$('#selectStatus').change(function () {
    var status = $('#selectStatus').val();
    if (status == 'Revision') {
        $('#inputRevisiContainer').removeClass('d-none');
    } else {
        $('#inputRevisiContainer').addClass('d-none');
    }
});

// Show/Hide Textarea Revisi di Edit Konten
$('#updateStatus').change(function () {
    var status = $('#updateStatus').val();
    if (status == 'Revision') {
        $('#updateRevisiContainer').removeClass('d-none');
    } else {
        $('#updateRevisiContainer').addClass('d-none');
    }
});

/**
 * All Create Function
 */

// Create Categori
$('#addCategory').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: 'crud/create.php',
        type: 'POST',
        dataType: 'json',
        data: {
            nameCategory: $('#inputKategori').val(),
            addCategory: true,
        },
        success: function (response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
                dataCategory();
                $('form').trigger('reset');
            } else {
                // swal.fire gives the error message
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        },
    });
});

// Create Pillar
$('#addPillar').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: 'crud/create.php',
        type: 'POST',
        dataType: 'json',
        data: {
            namePillar: $('#inputPillar').val(),
            addPillar: true,
        },
        success: function (response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
                dataPillar();
                $('form').trigger('reset');
            } else {
                // swal.fire gives the error message
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        },
    });
});

// Create Content
$('#addContent').submit(function (e) {
    e.preventDefault();
    var name = $('#inputNama').val();
    var content = $('#inputContent').val();
    var copywriting = $('#inputCopywriting').val();
    // allow nama, content, copywriting use quotes
    var name = name.replace(/'/g, "''");
    var name = name.replace(/"/g, '""');
    var content = content.replace(/'/g, "''");
    var content = content.replace(/"/g, '""');
    var copywriting = copywriting.replace(/'/g, "''");
    var copywriting = copywriting.replace(/"/g, '""');
    $.ajax({
        url: 'crud/create.php',
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            url: $('#inputUrl').val(),
            content: content,
            copywriting: copywriting,
            status: $('#selectStatus').val(),
            date: $('#inputTanggal').val(),
            time: $('#inputJam').val(),
            revision: $('#inputRevisi').val(),
            pillar: $('#selectPillar').val(),
            team: $('#inputTeam').val(),
            category: window.location.search.split('=')[1],
            addContent: true,
        },
        success: function (response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
                $('#kontenModal').modal('hide');
                // reset form
                $('form').trigger('reset');
                $('#calendar').fullCalendar('refetchEvents');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        },
    });
});

/**
 * All Update Function
 */

// Update Category
var editCategory = function (id, name) {
    var timerInterval;
    Swal.fire({
        title: 'Loading',
        timer: 500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector('b');
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft();
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        },
    });
    setTimeout(() => {
        $('#kategoriModal').modal('hide');
        $('#kategoriEditModal').modal('show');
        $('input#idKategori').val(id);
        $('input#updateKategori').val(name);
    }, 500);
    $('#editCategory').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'crud/update.php',
            type: 'POST',
            dataType: 'json',
            data: {
                idCategory: $('#idKategori').val(),
                nameCategory: $('#updateKategori').val(),
                updateCategory: true,
            },
            success: function (response) {
                if (response.status == 200) {
                    setTimeout(() => {
                        $('#kategoriEditModal').modal('hide');
                        $('#kategoriModal').modal('show');
                        dataCategory();
                    }, 1000);
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1000,
                    });
                } else {
                    // swal.fire gives the error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1000,
                    });
                }
            },
        });
    });
};

// Update Pillar
var editPillar = function (id, name) {
    var timerInterval;
    Swal.fire({
        title: 'Loading',
        timer: 500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector('b');
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft();
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        },
    });
    setTimeout(() => {
        $('#pillarModal').modal('hide');
        $('#pillarEditModal').modal('show');
        $('input#idPillar').val(id);
        $('input#updatePillar').val(name);
    }, 500);
    $('#editPillar').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'crud/update.php',
            type: 'POST',
            dataType: 'json',
            data: {
                idPillar: $('#idPillar').val(),
                namePillar: $('#updatePillar').val(),
                updatePillar: true,
            },
            success: function (response) {
                if (response.status == 200) {
                    setTimeout(() => {
                        $('#pillarModal').modal('show');
                        $('#pillarEditModal').modal('hide');
                        dataPillar();
                    }, 1000);
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1000,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1000,
                    });
                }
            },
        });
    });
};

// Update Content
var editContent = function () {
    // check team_id on updatecontent must be same with team_id on content
    // user tidak boleh edit konten user lain
    if (_event.team_id_content != _session.team_id && _session.role == 3) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Anda tidak dapat mengubah konten yang bukan milik anda',
            showConfirmButton: false,
            timer: 1500,
        });
        return false;
    }
    checkDataPillar();
    if (_event.status_content == 'Revision') {
        $('#updateRevisiContainer').removeClass('d-none');
    } else {
        $('#updateRevisiContainer').addClass('d-none');
    }
    // Loading Saat Klik Edit
    var timerInterval;
    Swal.fire({
        title: 'Loading',
        timer: 500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector('b');
            timerInterval = setInterval(() => {}, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        },
    });
    setTimeout(() => {
        $('#idKonten').val(_event.id_content);
        $('#updateNama').val(_event.name_content);
        $('#updateUrl').val(_event.url_content);
        $('#updateContent').val(_event.content_content);
        $('#updateCopywriting').val(_event.copywriting_content);
        $('#updateStatus').val(_event.status_content);
        $('#updateTanggal').val(_event.date_content);
        $('#updateJam').val(_event.time_content);
        $('#updateRevisi').val(_event.revision);
        $('#updatePillarContent').val(_event.pillar_id_content);
        $('#viewKontenModal').modal('hide');
        $('#kontenEditModal').modal('show').css('overflow-y', 'auto');
    }, 500);

    $('#editContentForm').submit(function (e) {
        e.preventDefault();
        var name = $('#updateNama').val();
        var url = $('#updateUrl').val();
        var content = $('#updateContent').val();
        var copywriting = $('#updateCopywriting').val();
        var status = $('#updateStatus').val();
        var date = $('#updateTanggal').val();
        var time = $('#updateJam').val();
        var revision = $('#updateRevisi').val();
        var pillar = $('#updatePillarContent').val();
        var category = window.location.search.split('=')[1];
        // allow nama, content, copywriting use quotes
        var name = name.replace(/'/g, "''");
        var name = name.replace(/"/g, '""');
        var content = content.replace(/'/g, "''");
        var content = content.replace(/"/g, '""');
        var copywriting = copywriting.replace(/'/g, "''");
        var copywriting = copywriting.replace(/"/g, '""');
        $.ajax({
            url: 'crud/update.php',
            type: 'POST',
            dataType: 'json',
            data: {
                idContent: $('#idKonten').val(),
                name: name,
                url: url,
                content: content,
                copywriting: copywriting,
                status: status,
                date: date,
                time: time,
                revision: revision,
                pillar: pillar,
                team: _event.team_id_content,
                category: category,
                updateContent: true,
            },
            success: function (response) {
                if (response.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    $('#kontenEditModal').modal('hide');
                    $('#calendar').fullCalendar('refetchEvents');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            },
        });
    });
};

/**
 * All Function Delete
 */

// Delete Category
var delCategory = function (id) {
    $.ajax({
        url: 'crud/delete.php',
        type: 'POST',
        dataType: 'json',
        data: {
            idCategory: id,
            deleteCategory: true,
        },
        success: function (response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
                dataCategory();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        },
    });
};

// Delete Pillar
var delPillar = function (id) {
    $.ajax({
        url: 'crud/delete.php',
        type: 'POST',
        dataType: 'json',
        data: {
            idPillar: id,
            deletePillar: true,
        },
        success: function (response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
                dataPillar();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        },
    });
};

// Delete Content
var delContent = function (id) {
    // check condition delete or no with swal
    if (_event.team_id_content != _session.team_id && _session.role == 3) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Anda tidak dapat menghapus konten yang bukan milik anda',
            showConfirmButton: false,
            timer: 1500,
        });
        return false;
    }
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: 'Konten ini akan dihapus!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'crud/delete.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    idContent: id,
                    deleteContent: true,
                },
                success: function (response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        $('#calendar').fullCalendar('refetchEvents');
                        $('#viewKontenModal').modal('hide');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                },
            });
        }
    });
};

/**
 * All Function Refresh Data
 */

// Refresh Data Category on Modal
var dataCategory = function () {
    $.ajax({
        url: 'crud/read.php',
        type: 'POST',
        data: {
            readCategoryModal: true,
        },
        success: function (data) {
            $('#dataCategory').html(data);
            $('#tableKategori').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 20, 30, 40, 50],
                searching: false,
            });
        },
    });
};

// Refresh Data Pillar on Modal
var dataPillar = function () {
    $.ajax({
        url: 'crud/read.php',
        type: 'POST',
        data: {
            readPillarModal: true,
        },
        success: function (data) {
            $('#dataPillar').html(data);
            $('#tablePillar').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 20, 30, 40, 50],
                searching: false,
            });
        },
    });
};

// Load Data Pillar di Add/Edit Modal Konten
var checkDataPillar = () => {
    checkURL();
    setDefaultDate();
    setDefaultTime();
    $.ajax({
        url: 'crud/read.php',
        type: 'POST',
        data: {
            readPillarContent: true,
        },
        success: function (data) {
            $('#selectPillar').html(data);
            $('#updatePillarContent').html(data);
        },
    });
};

// Check Parameter URL Found ?c or not, if not pushState to ?c
var checkURL = function () {
    var url = window.location.href;
    var urlSplit = url.split('?');
    var idCategory = $('#dataByCategory').val();
    if (urlSplit[1] == undefined) {
        window.history.pushState('', '', '?c=' + idCategory);
    }
};

// Refresh Halaman Setelah Memilih Kategori
var checkDataCategory = () => {
    checkURL();
    $.ajax({
        url: 'crud/read.php',
        type: 'POST',
        data: {
            readCategoryCalendar: true,
        },
        success: function (data) {
            $('#dataByCategory').html(data);
            // Search Paramater URL
            var url = new URL(window.location.href);
            var searchParams = new URLSearchParams(url.search);
            var kategori = searchParams.get('c');
            $('#dataByCategory').val(kategori);
            if (kategori) {
                $('#dataByCategory').on('change', function (e) {
                    var load = $('#dataByCategory').val();
                    window.location.href = '?c=' + load;
                    // window.history.pushState('', '', '?c=' + load); // Masih belum nemu caranya
                    $('#calendar').fullCalendar('refetchEvents');
                });
            }
        },
    });
};

// Logout
var logout = function () {
    $.ajax({
        url: 'config/auth.php',
        type: 'POST',
        data: {
            logout: true,
        },
        success: function () {
            // swal confirm info logout or not
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan keluar dari akun!',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar!',
            }).then((result) => {
                if (result.value) {
                    var timerInterval;
                    Swal.fire({
                        title: 'Logout...',
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const b =
                                Swal.getHtmlContainer().querySelector('b');
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft();
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        },
                    });
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 1000);
                }
            });
        },
    });
};
