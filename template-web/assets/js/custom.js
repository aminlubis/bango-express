const BangoExpress = function () {

    let $formRequestDelivery = $('#formRequestDelivery');

    return {

        formErrorMessage: function () {
            $.extend($.validator.messages, {
                required: "Form ini wajib diisi",
                email: "Harap masukan email yang valid",
                digits: "Masukan hanya angka tanpa huruf atau symbol"
            });
        },

        formValidation: function () {
            $formRequestDelivery.validate({
                errorPlacement: function errorPlacement(error, element) {
                    if ( element.parent().hasClass('input-group') ) {
                        error.insertAfter(element.parent());
                    } else {
                        element.after(error);
                    }
                },
                rules: {
                    // FORM PENGIRIM
                    nama_pengirim: {
                        required: true
                    },
                    nomor_telepon_pengirim: {
                        required: true,
                        digits: true
                    },
                    alamat_pengirim: {
                        required: true
                    },
                    // FORM PENERIMA
                    nama_penerima: {
                        required: true
                    },
                    nomor_telepon_penerima: {
                        required: true,
                        digits: true
                    },
                    alamat_penerima: {
                        required: true
                    },
                    // FORM BARANG
                    jumlah_barang: {
                        required: true,
                        digits: true
                    },
                    berat: {
                        required: true,
                        digits: true
                    },
                    luas_volume: {
                        required: true,
                        digits: true
                    }
                    // FORM PEMBAYARAN
                }
            });
        },

        requestDelivery: function () {
            $formRequestDelivery.steps({
                headerTag: 'h3',
                bodyTag: "fieldset",
                transitionEffect: "slideLeft",
                labels: {
                    finish: 'Pesan Sekarang',
                    next: 'Berikutnya',
                    previous: 'Sebelumnya'
                },
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Allways allow previous action even if the current form is not valid!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }
                    // Needed in some cases if the user went back (clean up)
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $formRequestDelivery.find(".body:eq(" + newIndex + ") label.error").remove();
                        $formRequestDelivery.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                    }
                    $formRequestDelivery.validate().settings.ignore = ":disabled,:hidden";
                    // return $formRequestDelivery.valid();
                    return true;
                },
                onFinishing: function (event, currentIndex)
                {
                    $formRequestDelivery.validate().settings.ignore = ":disabled";
                    return $formRequestDelivery.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    // TODO: Ajax disini

                }
            });
        },

        init: function () {
            BangoExpress.formErrorMessage();
            BangoExpress.formValidation();
            BangoExpress.requestDelivery();
        }

    };

}();

$(function () {
    BangoExpress.init();
});