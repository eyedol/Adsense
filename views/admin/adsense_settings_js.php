$(document).ready(function() {
    $('#adsense_border_color').ColorPicker({
	    onSubmit: function(hsb, hex, rgb) {
		    $('#adsense_border_color').val(hex);
		},
		onChange: function(hsb, hex, rgb) {
		    $('#adsense_border_color').val(hex);
		},
	    onBeforeShow: function () {
		    $(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
	    $(this).ColorPickerSetColor(this.value);
    });

    $('#adsense_bg_color').ColorPicker({
	    onSubmit: function(hsb, hex, rgb) {
		    $('#adsense_bg_color').val(hex);
		},
		onChange: function(hsb, hex, rgb) {
		    $('#adsense_bg_color').val(hex);
		},
	    onBeforeShow: function () {
		    $(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
	    $(this).ColorPickerSetColor(this.value);
    });

    $('#adsense_link_color').ColorPicker({
	    onSubmit: function(hsb, hex, rgb) {
		    $('#adsense_link_color').val(hex);
		},
		onChange: function(hsb, hex, rgb) {
		    $('#adsense_link_color').val(hex);
		},
	    onBeforeShow: function () {
		    $(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
	    $(this).ColorPickerSetColor(this.value);
	});

    $('#adsense_text_color').ColorPicker({
	    onSubmit: function(hsb, hex, rgb) {
		    $('#adsense_text_color').val(hex);
		},
		onChange: function(hsb, hex, rgb) {
		    $('#adsense_text_color').val(hex);
		},
	    onBeforeShow: function () {
		    $(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
	    $(this).ColorPickerSetColor(this.value);
	});

    $('#adsense_uri_color').ColorPicker({
	    onSubmit: function(hsb, hex, rgb) {
		    $('#adsense_uri_color').val(hex);
		},
		onChange: function(hsb, hex, rgb) {
		    $('#adsense_uri_color').val(hex);
		},
	    onBeforeShow: function () {
		    $(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
	    $(this).ColorPickerSetColor(this.value);
	});


});

