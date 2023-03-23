$('#inputKecamatan').typeahead({
    source: function (query, result) {
        $.ajax({
            url: "Templates/References/getDistricts",
            data: 'keyword=' + query + '&regency=' + $('#kab_id').val(),         
            dataType: "json",
            type: "POST",
            success: function (response) {
            result($.map(response, function (item) {
                return item;
            }));
            }
        });
    },
    afterSelect: function (item) {
    // do what is needed with item
    var val_item=item.split(':')[0];
    var label_item=item.split(':')[1];

    if (val_item) {          

        $('#prov_id').val('');
        $('#inputProvinsi').val('');
        $('#kab_id').val('');
        $('#inputKota').val('');           

        $.getJSON("templates/References/getDistrictsById')/" + val_item, '', function (data) {  
        
            $('#prov_id').val(data.province_id);
            $('#inputProvinsi').val(data.province_name);
            $('#kab_id').val(data.regency_id);
            $('#inputKota').val(data.regency_name);           

            }); 
            $('#inputKecamatan').val(label_item);
            $('#kec_id').val(val_item);
            $('#prov').show('fast');
            $('#village').show('fast'); 
        }      
    }
});

$('#inputKelurahan').typeahead({
source: function (query, result) {
    $.ajax({
        url: "Templates/References/getVillage",
        data: 'keyword=' + query + '&district=' + $('#kec_id').val(),             
        dataType: "json",
        type: "POST",
        success: function (response) {
            result($.map(response, function (item) {
                return item;
            }));
        }
    });
},
afterSelect: function (item) {
    // do what is needed with item
    var val_item=item.split(':')[0];
    var label_item=item.split(':')[1];
    $('#inputKelurahan').val(label_item);
    $('#kel_id').val(val_item);

    if (val_item) {          

        $.getJSON("templates/References/getVillagesById')/" + val_item, '', function (data) {                        

        $.each(data, function (i, o) {                  

            console.log(o)
            $('#kode_pos').val(o.kode_pos);

        });            

        }); 
    }      
}
});

$('#inputProvinsi').typeahead({
source: function (query, result) {
    $.ajax({
        url: "Templates/References/getProvince",
        data: 'keyword=' + query,             
        dataType: "json",
        type: "POST",
        success: function (response) {
            result($.map(response, function (item) {
                return item;
            }));
        }
    });
},
afterSelect: function (item) {
    // do what is needed with item
    var val_item=item.split(':')[0];
    var label_item=item.split(':')[1];
    $('#inputProvinsi').val(label_item);
    $('#prov_id').val(val_item); 
    // reset
    $('#kab_id').val('');
    $('#inputKota').val(''); 
    $('#inputKecamatan').val('');
    $('#kec_id').val(''); 
    $('#inputKelurahan').val('');
    $('#kel_id').val(''); 
    
    
}
});

$('#inputKota').typeahead({
source: function (query, result) {
    $.ajax({
        url: "Templates/References/getRegencies",
        data: 'keyword=' + query + '&province=' + $('#prov_id').val(),             
        dataType: "json",
        type: "POST",
        success: function (response) {
            result($.map(response, function (item) {
                return item;
            }));
        }
    });
},
afterSelect: function (item) {
    // do what is needed with item
    var val_item=item.split(':')[0];
    var label_item=item.split(':')[1];
    $('#inputKota').val(label_item);
    $('#kab_id').val(val_item);
    // reset
    $('#inputKecamatan').val('');
    $('#kec_id').val(''); 
    $('#inputKelurahan').val('');
    $('#kel_id').val('');

}
});