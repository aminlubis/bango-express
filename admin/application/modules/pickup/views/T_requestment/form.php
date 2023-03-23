<style>
    .input-inline{
        padding-bottom: 10px;
    }
</style>
<div class="row">
<!-- content here -->
<div class="page-header">
      <h1>
        <?php echo $title?>
        <small>
          <i class="ace-icon fa fa-angle-double-right"></i>
          <?php echo isset($breadcrumbs)?$breadcrumbs:''?>
        </small>
      </h1>
    </div><!-- /.page-header -->
    <div class="col-sm-12">
        <!-- #section:plugins/fuelux.wizard -->
        <div id="fuelux-wizard-container">
            <div>
                <!-- #section:plugins/fuelux.wizard.steps -->
                <ul class="steps">
                    <li data-step="1" class="active">
                        <span class="step">1</span>
                        <span class="title">About Sender</span>
                    </li>

                    <li data-step="2">
                        <span class="step">3</span>
                        <span class="title">Package Detail</span>
                    </li>
                    <li data-step="3">
                        <span class="step">5</span>
                        <span class="title">Finish</span>
                    </li>
                </ul>

                <!-- /section:plugins/fuelux.wizard.steps -->
            </div>

            <hr />

            <!-- #section:plugins/fuelux.wizard.container -->
            <div class="step-content pos-rel">
                <form class="form-horizontal" method="post" id="form-default" action="<?php echo site_url('pickup/T_requestment/process')?>" enctype="multipart/form-data" autocomplete="off">
                <!-- hidden form -->
                <input type="hidden" name="id" value="<?php echo isset($value->id)?$value->id:''?>">
                    <div class="step-pane active" data-step="1">

                        <div class="row">
                            <div class="col-md-12 input-inline">
                                <label for="form-field-11">Pick Up Location *</label>
                                <input class="form-control input-mask-date" type="text" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" name="pickup_location" value="<?php echo isset($value->pickup_location)?$value->pickup_location:''?>">
                                <!-- hidden -->
                                <input type="hidden" class="form-control" id="longitude" name="longitude" placeholder="longitude" value="<?php echo isset($value->longitude)?$value->longitude:''?>">
                                <input type="hidden" class="form-control" id="latitude" name="latitude" placeholder="latitude" value="<?php echo isset($value->latitude)?$value->latitude:''?>">
                            </div>

                            <div class="col-md-12 input-inline">
                                <label for="form-field-11">Apartment, unit, suite, or floor #</label>
                                <input name="address_detail" id="address_detail" value="<?php echo isset($value->address_detail)?$value->address_detail:''?>"  class="form-control" type="text">
                            </div>

                            <div class="col-md-3 input-inline">
                                <label for="form-field-11">City</label>
                                <input class="form-control" id="administrative_area_level_2" type="text" value="<?php echo isset($value)?$value->city:'' ?>" name="city"/>
                                <input type="hidden" name="kotaHidden" value="<?php echo isset($value)?$value->city:'' ?>" id="kotaHidden">
                            </div>

                            <div class="col-md-3 input-inline">
                                <label for="form-field-11">Province</label>
                                <input class="form-control" id="administrative_area_level_1" type="text" value="<?php echo isset($value)?$value->province:'' ?>" name="province"/>
                                    <input type="hidden" name="provinsiHidden" value="<?php echo isset($value)?$value->province:'' ?>" id="provinsiHidden">
                            </div>

                            <div class="col-md-2 input-inline">
                                <label for="form-field-11">Postal Code</label>
                                <input name="postal_code" id="postal_code" value="<?php echo isset($value->postal_code)?$value->postal_code:''?>"  class="form-control" type="text">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 input-inline">
                                <label for="form-field-11">Sender Name</label>
                                <input name="name" id="name" value="<?php echo isset($value->name)?$value->name:''?>"  class="form-control" type="text">
                            </div>

                            <div class="col-md-2 input-inline">
                                <label for="form-field-11">Phone/Hp</label>
                                <input name="telp" styid="telp" value="<?php echo isset($value->telp)?$value->telp:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                    </div>


                    <div class="step-pane" data-step="2">

                        <div class="row">
                            <div class="col-md-4 input-inline">
                                <label for="form-field-11">Item Detail</label>
                                <?php echo $this->master->custom_selection(array('table'=>'global_parameter', 'where'=>array('flag'=>'jenis_barang'), 'id'=>'value', 'name' => 'label'),isset($value)?$value->item_type:'','item_type','item_type','chosen-slect form-control','','');?>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-2 input-inline">
                                <label for="form-field-11">Qty</label>
                                <input name="qty" styid="qty" value="<?php echo isset($value->qty)?$value->qty:''?>"  class="form-control" type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="checkbox input-inline" style="padding-left: 10px">
                                <label>
                                    <input name="is_fragile" type="checkbox" class="ace" value="1" <?php echo isset($value->is_fragile)?($value->is_fragile==1)?'checked':'':''?>>
                                    <span class="lbl"> Fragile Item</span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 input-inline">
                                <label for="form-field-11">Note</label>
                                <textarea class="form-control" name="note" style="height: 60px !important"><?php echo isset($value)?$value->note:''?></textarea>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="step-pane" data-step="3">
                        <div class="center">
                            <h3 class="green">Congrats!</h3>
                            Your product is ready to ship! Click finish to continue!
                        </div>
                    </div>
                </form>
            </div>

            <!-- /section:plugins/fuelux.wizard.container -->
        </div>

        <hr />
        <div class="wizard-actions">
            <!-- #section:plugins/fuelux.wizard.buttons -->
            <button class="btn btn-sm btn-prev">
                <i class="ace-icon fa fa-arrow-left"></i>
                Prev
            </button>

            <button class="btn btn-sm btn-success btn-next" data-last="Finish">
                Next
                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
            </button>

            <!-- /section:plugins/fuelux.wizard.buttons -->
        </div>
    </div>
    
    
<!-- end content here -->
</div>

<script type="text/javascript" src="<?php echo base_url()?>assets/jquery_number/jquery.number.js"></script>
<script src="<?php echo base_url()?>assets/js/typeahead.js"></script>

<script>
    jQuery(function($) {  

        $('.format_number').number( true, 2 );

        $('.date-picker').datepicker({  
        autoclose: true,   
        todayHighlight: true,
        format: 'yyyy-mm-dd', 
        })  
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){  
        $(this).prev().focus();    
        });  

    });

    $(document).ready(function(){
      
        // change pengirim
        var kel = $('#area').val() ? $('#area').val() : 0;
        $.getJSON("<?php echo site_url('Templates/References/getRegencyById') ?>/" + kel, '', function (data) {  
            // split kode
            var str_split = kel.split(".");
            var prov_id = str_split[0];
            var kota_id = str_split[0]+'.'+str_split[1];
            var kec_id = str_split[0]+'.'+str_split[1]+'.'+str_split[2];
            
            $('#provinsiHiddenPengirim').val(prov_id);
            $('#inputProvinsiPengirim').val(data.prov);

            $('#kotaHiddenPengirim').val(kota_id);
            $('#inputKotaPengirim').val(data.kota); 

            $('#kecamatanHiddenPengirim').val(kec_id);
            $('#inputKecamatanPengirim').val(data.kec.toUpperCase());     
        }); 

    
        $('#form-default').ajaxForm({
            beforeSend: function() {
                achtungShowLoader();  
            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            complete: function(xhr) {     
                var data=xhr.responseText;
                var jsonResponse = JSON.parse(data);

                if(jsonResponse.status === 200){
                $.achtung({message: jsonResponse.message, timeout:5});
                $('#page-area-content').load('pickup/T_requestment');
                }else{
                $.achtung({message: jsonResponse.message, timeout:5, className: 'achtungFail'});
                }
                achtungHideLoader();
            }
        }); 

        $('#administrative_area_level_2').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "Templates/References/getRegencyByKeyword",
                    data: 'keyword=' + query ,         
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

                $('#administrative_area_level_2').val(label_item);
            }
        }); 

        
    })

</script>

<!-- page specific plugin scripts -->
<script src="<?php echo base_url()?>assets/js/fuelux/fuelux.wizard.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url()?>assets/js/additional-methods.js"></script>
<script src="<?php echo base_url()?>assets/js/bootbox.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.maskedinput.js"></script>
<script src="<?php echo base_url()?>assets/js/select2.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
    
    
        var $validation = false;
        $('#fuelux-wizard-container')
        .ace_wizard({
            //step: 2 //optional argument. wizard will jump to step "2" at first
            //buttons: '.wizard-actions:eq(0)'
        })
        .on('actionclicked.fu.wizard' , function(e, info){
            if(info.step == 3 && $validation) {
                if(!$('#validation-form').valid()) e.preventDefault();
            }
        })
        .on('finished.fu.wizard', function(e) {
            
            $("#form-default").submit();


            // bootbox.dialog({
            //     message: "Thank you! Your information was successfully saved!", 
            //     buttons: {
            //         "success" : {
            //             "label" : "OK",
            //             "className" : "btn-sm btn-primary"
            //         }
            //     }
            // });
            
            

        }).on('stepclick.fu.wizard', function(e){
            //e.preventDefault();//this will prevent clicking and selecting steps
        });
    
    
        //jump to a step
        /**
        var wizard = $('#fuelux-wizard-container').data('fu.wizard')
        wizard.currentStep = 3;
        wizard.setState();
        */
    
        //determine selected step
        //wizard.selectedItem().step
    
    
    
        //hide or show the other form which requires validation
        //this is for demo only, you usullay want just one form in your application
        // $('#skip-validation').removeAttr('checked').on('click', function(){
        //     $validation = this.checked;
        //     if(this.checked) {
        //         $('#sample-form').hide();
        //         $('#validation-form').removeClass('hide');
        //     }
        //     else {
        //         $('#validation-form').addClass('hide');
        //         $('#sample-form').show();
        //     }
        // })
    
    
    
        //documentation : http://docs.jquery.com/Plugins/Validation/validate
    
    
        // $.mask.definitions['~']='[+-]';
        // $('#phone').mask('(999) 999-9999');
    
        // jQuery.validator.addMethod("phone", function (value, element) {
        //     return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
        // }, "Enter a valid phone number.");
    
        // $('#validation-form').validate({
        //     errorElement: 'div',
        //     errorClass: 'help-block',
        //     focusInvalid: false,
        //     ignore: "",
        //     rules: {
        //         email: {
        //             required: true,
        //             email:true
        //         },
        //         password: {
        //             required: true,
        //             minlength: 5
        //         },
        //         password2: {
        //             required: true,
        //             minlength: 5,
        //             equalTo: "#password"
        //         },
        //         name: {
        //             required: true
        //         },
        //         phone: {
        //             required: true,
        //             phone: 'required'
        //         },
        //         url: {
        //             required: true,
        //             url: true
        //         },
        //         comment: {
        //             required: true
        //         },
        //         state: {
        //             required: true
        //         },
        //         platform: {
        //             required: true
        //         },
        //         subscription: {
        //             required: true
        //         },
        //         gender: {
        //             required: true,
        //         },
        //         agree: {
        //             required: true,
        //         }
        //     },
    
        //     messages: {
        //         email: {
        //             required: "Please provide a valid email.",
        //             email: "Please provide a valid email."
        //         },
        //         password: {
        //             required: "Please specify a password.",
        //             minlength: "Please specify a secure password."
        //         },
        //         state: "Please choose state",
        //         subscription: "Please choose at least one option",
        //         gender: "Please choose gender",
        //         agree: "Please accept our policy"
        //     },
    
    
        //     highlight: function (e) {
        //         $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        //     },
    
        //     success: function (e) {
        //         $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
        //         $(e).remove();
        //     },
    
        //     errorPlacement: function (error, element) {
        //         if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
        //             var controls = element.closest('div[class*="col-"]');
        //             if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
        //             else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        //         }
        //         else if(element.is('.select2')) {
        //             error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        //         }
        //         else if(element.is('.chosen-select')) {
        //             error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
        //         }
        //         else error.insertAfter(element.parent());
        //     },
    
        //     submitHandler: function (form) {
        //     },
        //     invalidHandler: function (form) {
        //     }
        // });
    
        
        
        
        $('#modal-wizard-container').ace_wizard();
        // $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
        
        
        /**
        $('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
            $(this).closest('form').validate().element($(this));
        });
        
        $('#mychosen').chosen().on('change', function(ev) {
            $(this).closest('form').validate().element($(this));
        });
        */
        
        
        $(document).one('ajaxloadstart.page', function(e) {
            //in ajax mode, remove remaining elements before leaving page
            $('[class*=select2]').remove();
        });
    })
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwKjP-500lfTc-2Jio-IWIf-6w3yDEg2I&libraries=places"></script>
<script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:

$( "#autocomplete" )
  .keypress(function(event) {
    var keycode =(event.keyCode?event.keyCode:event.which); 
    if(keycode == 13){
      event.preventDefault();
      $('#administrative_area_level_1').focus();
    }
});

var placeSearch, autocomplete;

var componentForm = {
//   street_number: 'short_name',
//   route: 'long_name',
//   locality: 'long_name',
  administrative_area_level_1: 'long_name',
  administrative_area_level_2: 'long_name',
//   country: 'long_name',
//   postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), 
        {types: ['geocode']}
  );

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  // autocomplete.setFields(['address_component']);
  autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
  

}



function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }

  // empty locality
  $('#kotaHidden').val('');
  $('#locality').val('');  
  
  // get geometry
  var geometry = place.geometry;
  $('#latitude').val(geometry.location.lat);
  $('#latitude').attr('disabled', false);
  $('#longitude').val(geometry.location.lng);
  $('#longitude').attr('disabled', false);
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwKjP-500lfTc-2Jio-IWIf-6w3yDEg2I&libraries=places&callback=initAutocomplete" async defer></script>

