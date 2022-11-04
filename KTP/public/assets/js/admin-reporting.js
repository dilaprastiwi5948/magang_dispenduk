$(document).ready(() => {
    $('#reportingtype_id').val(null).trigger('change');
    $('#submissiontype_id').val(null).trigger('change');
    $('#explanationtype_id').val(null).trigger('change');
    setupProvince();
})

function setupProvince() {
    $.ajax({
        url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
        method: "GET",
        success: (res) => {
            $('#select2-provinsi').removeAttr('disabled')

            $("#select2-provinsi").select2({
                dropdownAutoWidth: true,
                width: '100%',
                data: res.provinsi.map((data, index) => {
                    return {'id': data.id, 'text' : data.nama}
                })
            });
            const inputValue = $("#value-province").val();
            const search = res.provinsi.find((value) => value.nama == inputValue)

            $('#select2-provinsi').val(search ? search.id : null).trigger('change');
            if(search) setupCity(search.id)

            $('#select2-provinsi').change(() => {
                const selected = $('#select2-provinsi').find(':selected')
                $("#value-province").val(selected.text())
                setupCity(selected.val())
            });
        },
        error: () => {
            setupProvince();
        }
    });
}

function setupCity(id) {
    const select = '#select2-city'
    $(select).attr('disabled', true)
    $(select).empty();
    if (!id) {
        return;
    }
    $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${id}`,
        method: "GET",
        success: (res) => {
            $(select).removeAttr('disabled')
            $(select).select2({
                dropdownAutoWidth: true,
                width: '100%',
                data: res.kota_kabupaten.map((data, index) => {
                    return {'id': data.id, 'text' : data.nama}
                })
            });
            const inputValue = $("#value-city").val();
            const search = res.kota_kabupaten.find((value) => value.nama == inputValue)

            $(select).val(search ? search.id : null).trigger('change');
            if(search) setupDistricts(search.id)

            $(select).change(() => {
                const selected = $(select).find(':selected')
                $("#value-city").val(selected.text())
                setupDistricts(selected.val())
            });
        },
    });
}

function setupDistricts(id) {
    const select = '#select2-districts'
    $(select).attr('disabled', true)
    $(select).empty();
    if (!id) {
        return;
    }
    $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${id}`,
        method: "GET",
        success: (res) => {
            $(select).removeAttr('disabled')
            $(select).select2({
                dropdownAutoWidth: true,
                width: '100%',
                data: res.kecamatan.map((data, index) => {
                    return {'id': data.id, 'text' : data.nama}
                })
            });

            const inputValue = $("#value-districts").val();
            const search = res.kecamatan.find((value) => value.nama == inputValue)

            $(select).val(search ? search.id : null).trigger('change');
            if(search) setupSubDistricts(search.id)

            $(select).change(() => {
                const selected = $(select).find(':selected')
                $("#value-districts").val(selected.text())
                setupSubDistricts(selected.val())
            });
        },
    });
}
function setupSubDistricts(id) {
    const select = '#select2-sub_districts'
    $(select).attr('disabled', true)
    $(select).empty();
    if (!id) {
        return;
    }
    $.ajax({
        url: `https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=${id}`,
        method: "GET",
        success: (res) => {
            $(select).removeAttr('disabled')
            $(select).select2({
                dropdownAutoWidth: true,
                width: '100%',
                data: res.kelurahan.map((data, index) => {
                    return {'id': data.id, 'text' : data.nama}
                })
            });
            const inputValue = $("#value-sub_districts").val();
            const search = res.kelurahan.find((value) => value.nama == inputValue)

            $(select).val(search ? search.id : null).trigger('change');

            $(select).change(() => {
                const selected = $(select).find(':selected')
                $("#value-sub_districts").val(selected.text())
            });
        },
    });
}
