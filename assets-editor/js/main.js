"use strict";

$(function() {

    var shirtData = {
        "1":{ // unique ID
            "filename":"men1", // images/shirts/men1_color_front.png
            "color":[
                {"id":"1","filename":"blue","color":"0268b0"},
                {"id":"2","filename":"white","color":"ffffff"}
            ]
        },
        "2":{
            "filename":"women",
            "color":[
                {"id":"3","filename":"black","color":"000000"},
                {"id":"4","filename":"white","color":"ffffff"}
            ]
        }
    };

    var canvas, canvas_front, canvas_back;
    var shirtWidth = 570; // width: 600, margin: 15
    var intCornerSize = 20;
    var shirtSide = 'front';
    var textWidth = {};
    var canvas_width = 260;
    var canvas_height = 350;
    var canvas_top = 155;
    var canvas_exportwidth = 1000;
    var canvas_review_width = 250;
    
    canvas_front = new fabric.Canvas('mainCanvas_front', {
        preserveObjectStacking: true
    });
    canvas_back = new fabric.Canvas('mainCanvas_back', {
        preserveObjectStacking: true
    });
    canvas = canvas_front;
    resizeAll();
    
    // Add demo objects
    fabric.Image.fromURL('images/album/image1.png', function(oImg) {
        canvas.add(oImg);
        oImg.scaleToWidth(canvas.get('width')*0.8);
        oImg.viewportCenter().setCoords();
        canvas.renderAll();
    });
    var demoText = new fabric.IText('Hello', {fill: '#ff0000', stroke: '#000', fontSize: canvas_exportwidth});
    canvas.add(demoText);
    demoText.scaleToWidth(canvas.get('width')/2);
    demoText.viewportCenterH().setCoords();
    canvas.renderAll();

    // events: object selected
    canvas_front.on('selection:created', event_object_select);
    canvas_back.on('selection:created', event_object_select);
    canvas_front.on('selection:updated', event_object_select);
    canvas_back.on('selection:updated', event_object_select);
    function event_object_select(options) {
        options.target.set({
            cornerSize: intCornerSize
        });
        check_image_scale(options);
        $('.cvtoolbox', '#centerLayoutContainer').show();
        if (options.target.isType('i-text')) {
            prepare_texttoolbox(options.target);
            $('.texttoolbox', '#rightLayoutContainer').show();
        } else {
            $('.texttoolbox', '#rightLayoutContainer').hide();
        }
    };
    
    // events: selection cleared
    canvas_front.on('selection:cleared', event_selection_cleared);
    canvas_back.on('selection:cleared', event_selection_cleared);
    function event_selection_cleared(options) {
        $('.cvtoolbox', '#centerLayoutContainer').hide();
        $('.cvtoolbox_info', '#centerLayoutContainer').hide();
        $('.texttoolbox', '#rightLayoutContainer').hide();
    };
    
    // events: object modified
    canvas_front.on('object:modified', event_object_modified);
    canvas_back.on('object:modified', event_object_modified);
    function event_object_modified(options) {
        check_image_scale(options);
        if (options.target.isType('i-text')) {
            if (options.target.get('text').length==0) canvas.remove(options.target);
        }
    };
    
    // warning if the scaled image is larger than the original image
    function check_image_scale(options) {
        if ( options.target.isType('image') && (options.target.get('scaleX') > 1 || options.target.get('scaleY') > 1) ) {
            show_cvtoolbox_warn("<i class='fa fa-warning'></i> The scaled image is larger than the original image. The quality may decrease.");
        } else if (options.target.isType('group')) {
            var objs = options.target.getObjects();
            var sclX = options.target.get('scaleX');
            var sclY = options.target.get('scaleY');
            var isLarge = false;
            for (var i=0; i<objs.length; i++) {
                if ( objs[i].isType('image') && (objs[i].get('scaleX')*sclX > 1 || objs[i].get('scaleY')*sclY > 1) ) {
                    show_cvtoolbox_warn("<i class='fa fa-warning'></i> The scaled image is larger than the original image. The quality may decrease.");
                    isLarge = true;
                    break;
                }
            }
            if (!isLarge) show_cvtoolbox_info('');
        } else {
            show_cvtoolbox_info('');
        }
    };
    
    // events: text editing entered
    canvas_front.on('text:editing:entered', event_text_editing_entered);
    canvas_back.on('text:editing:entered', event_text_editing_entered);
    function event_text_editing_entered(options) {
        var rightMargin = 10;
        textWidth[$(canvas.getElement()).attr('id')] = {'width': canvas.get('width')/canvas.getZoom()-options.target.get('left')-rightMargin, 'scaleX': options.target.get('scaleX')};
        options.target.setSelectionEnd(options.target.get('text').length);
        options.target.setSelectionStart(options.target.get('text').length);
        canvas.renderAll();
        prepare_texttoolbox(options.target);
    };
    
    // events: text editing exited
    canvas_front.on('text:editing:exited', event_text_editing_exited);
    canvas_back.on('text:editing:exited', event_text_editing_exited);
    function event_text_editing_exited(options) {
        if (options.target.isType('i-text')) {
            prepare_texttoolbox(options.target);
        }
    };
    
    // events: text changed
    canvas_front.on('text:changed', event_text_changed);
    canvas_back.on('text:changed', event_text_changed);
    function event_text_changed(options) {
        options.target.initDimensions();
        if (options.target.get('text').length > 0){
            var id = $(canvas.getElement()).attr('id');
            var ratio = textWidth[id]['width'] / options.target.getScaledWidth();
            if (ratio < 1 || textWidth[id]['scaleX'] > options.target.get('scaleX')) {
                if (options.target.get('scaleX') * ratio > textWidth[id]['scaleX']) ratio = textWidth[id]['scaleX'] / options.target.get('scaleX');
                options.target.set('scaleX', options.target.get('scaleX') * ratio);
                options.target.set('scaleY', options.target.get('scaleY') * ratio);
                options.target.setCoords();
                canvas.renderAll();
            }
        }
    };
    
    $(window).on('resize',function(){
        resizeAll();
    });
    
    // toolboxes
    $('#toolbox_left').on('click', function() {
        show_cvtoolbox_info('Move left');
        var obj = canvas.getActiveObject();
        if (obj) {
            obj.set('left', obj.get('left') - 1/getZoom()).setCoords();
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_right').on('click', function() {
        show_cvtoolbox_info('Move right');
        var obj = canvas.getActiveObject();
        if (obj) {
            obj.set('left', obj.get('left') + 1/getZoom()).setCoords();
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_up').on('click', function() {
        show_cvtoolbox_info('Move up');
        var obj = canvas.getActiveObject();
        if (obj) {
            obj.set('top', obj.get('top') - 1/getZoom()).setCoords();
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_down').on('click', function() {
        show_cvtoolbox_info('Move down');
        var obj = canvas.getActiveObject();
        if (obj) {
            obj.set('top', obj.get('top') + 1/getZoom()).setCoords();
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_center').on('click', function() {
        show_cvtoolbox_info('Center');
        var obj = canvas.getActiveObject();
        if (obj) {
            obj.viewportCenter().setCoords();
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_centerh').on('click', function() {
        show_cvtoolbox_info('Center horizontally');
        var obj = canvas.getActiveObject();
        if (obj) {
            obj.viewportCenterH().setCoords();
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_centerv').on('click', function() {
        show_cvtoolbox_info('Center vertically');
        var obj = canvas.getActiveObject();
        if (obj) {
            obj.viewportCenterV().setCoords();
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_flipx').on('click', function() {
        show_cvtoolbox_info('Flip vertically');
        var obj = canvas.getActiveObject();
        if (obj) {
            obj.set('flipX', !obj.get('flipX'));
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_flipy').on('click', function() {
        show_cvtoolbox_info('Flip horizontally');
        var obj = canvas.getActiveObject();
        if (obj) {
            obj.set('flipY', !obj.get('flipY'));
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_totop').on('click', function() {
        show_cvtoolbox_info('Bring to front');
        var obj = canvas.getActiveObject();
        if (obj) {
            canvas.bringToFront(obj);
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_tobottom').on('click', function() {
        show_cvtoolbox_info('Send to back');
        var obj = canvas.getActiveObject();
        if (obj) {
            canvas.sendToBack(obj);
            canvas.renderAll();
        }
        return false;
    });
    $('#toolbox_remove').on('click', function() {
        show_cvtoolbox_info('Remove');
        var activeObject = canvas.getActiveObject();
        var activeGroup = canvas.getActiveObjects();
        if (activeGroup.length > 1) {
            canvas.discardActiveObject();
            activeGroup.forEach(function(object) {
                canvas.remove(object);
            });
        } else if (activeObject) {
            canvas.remove(activeObject);
        }
        return false;
    });
    
    // event: when user change the shirt type
    $('input[name=form_shirt_type]', '#leftLayoutContainer').on('change', function() {
        var data = '';
        for(var i=0; i<shirtData[this.value]['color'].length; i++){
            data += '<div class="btn colorButton '+(i==0?'active':'')+'" style="background-color: #'+shirtData[this.value]['color'][i]['color']+';"><input type="radio" name="form_shirt_color" value="'+shirtData[this.value]['color'][i]['id']+'" autocomplete="off" '+(i==0?'checked':'')+' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>';
        }
        
        if (shirtData[this.value]['color'].length < 2) {
            $('#div_colors_title').hide();
            $('#div_colors').html(data).hide();
        } else {
            $('#div_colors_title').show();
            $('#div_colors').html(data).show();
        }
        
        $('#img_shirt').attr('src', 'images/shirts/'+shirtData[this.value]['filename']+'_'+shirtData[this.value]['color'][0]['filename']+'_'+shirtSide+'.png');
        return false;
    });
    
    // event: when user change the shirt color
    $('#div_colors').on('change', function(e) {
        if ( $(e.target).is('input') ) {
            change_shirt_color();
        }
        return false;
    });
    
    // event: when user change the shirt side
    $('input[name=form_shirt_side]', '#centerLayoutContainer').on('change', function() {
        shirtSide = this.value;
        if (shirtSide == 'front') {
            canvas = canvas_front;
            $('#div_canvas_back').hide();
            $('#div_canvas_front').show();
        } else {
            canvas = canvas_back;
            $('#div_canvas_front').hide();
            $('#div_canvas_back').show();
        }
        if (canvas.getActiveObject()) {
            $('.cvtoolbox', '#centerLayoutContainer').show();
            var obj = canvas.getActiveObject();
            if (obj && obj.isType('i-text')) {
                prepare_texttoolbox(obj);
                $('.texttoolbox', '#rightLayoutContainer').show();
            } else {
                $('.texttoolbox', '#rightLayoutContainer').hide();
            }
        } else {
            $('.cvtoolbox', '#centerLayoutContainer').hide();
            $('.cvtoolbox_info', '#centerLayoutContainer').hide();
            $('.texttoolbox', '#rightLayoutContainer').hide();
        }
        change_shirt_color();
        return false;
    });
    
    // event: album click
    $('#albumModal').on('click', function(e) {
        var t = $(e.target);
        if ( t.is('img') && t.attr('bgsrc') ) {
            useAlbumPic(t.attr('bgsrc'));
	        return false;
        }
    });
    
    // event: upload image
    $('input[name=image_upload]', '#leftLayoutContainer').on('change', function() {
        if (this.value && this.files && this.files[0]) {
            var label = $('#frm_upload label i');
            var msg = $("#leftLayoutContainer .message");
            label.removeClass('fa-picture-o').addClass('fa-spinner fa-pulse');
            msg.text('');
            
            var reader = new FileReader();
            reader.onload = function (e) {
                $("input[name=image_upload]", '#leftLayoutContainer').val('');
                label.removeClass('fa-spinner fa-pulse').addClass('fa-picture-o');
                msg.text('');
                fabric.Image.fromURL(e.target.result, function(oImg) {
                    canvas.add(oImg);
                    if (oImg.get('width')*getZoom() > canvas.get('width')/2) oImg.scaleToWidth(canvas.get('width')/2);
                    oImg.viewportCenter().setCoords();
                    canvas.setActiveObject(oImg);
                    canvas.renderAll();
                });
            }
            reader.readAsDataURL(this.files[0]);
        }
        return false;
    });				
    
    // add text
    $('#btn_addtext').on('click', function() {
        $("#leftLayoutContainer .message").text('');
        var text = new fabric.IText('Abc', {fill: '#000', stroke: '#000', fontSize: canvas_exportwidth});
        canvas.add(text);
        text.scaleToWidth(canvas.get('width')/2);
        text.viewportCenter().setCoords();
        canvas.setActiveObject(text);
        canvas.renderAll();
        return false;
    });
    
    // event: preview design
    $("#reviewModal").on('show.bs.modal', function () {
        canvas.discardActiveObject();
        canvas.renderAll();
        
        var shirtdesign = $('#reviewModal .shirtdesign');
        var shirt = $('#reviewModal .shirt');
        shirtdesign.find('img').attr( 'src', canvas.toDataURL({format: 'png', multiplier: Math.ceil(10000 / (getZoom()*canvas_exportwidth/canvas_review_width)) / 10000}) );
        shirt.find('img').attr( 'src', $('#img_shirt').attr('src') );
        
        shirtdesign.width(canvas_review_width);
        shirt.width(canvas_review_width * shirtWidth / canvas_width);
        $('#reviewModal .modal-body').height(shirt.width());
        shirtdesign.css('margin-top', (canvas_top) * shirt.width() / shirtWidth);
    });
    
    // fix modal in iOS
    if ( navigator.userAgent.match(/iPhone|iPad|iPod/i) ) {
        $('.modal').on('show.bs.modal', function() {
            $(this)
                .css({
                    position: 'absolute',
                    marginTop: $(window).scrollTop() + 'px',
                    bottom: 'auto'
                });
        });
    }
    
    // preload shirt images
    $.each(shirtData, function(i, d) {
        for (i = 0; i < d.color.length; i++) {
            new Image().src = 'images/shirts/'+d.filename+'_'+d.color[i].filename+'_front.png';
            new Image().src = 'images/shirts/'+d.filename+'_'+d.color[i].filename+'_back.png';
        }
    })

    // replace the shirt image when color changed
    function change_shirt_color() {
        var typeID = $('input[name=form_shirt_type]:checked', '#leftLayoutContainer').val();
        var colorID = $('input[name=form_shirt_color]:checked', '#leftLayoutContainer').val();
        var color = $.grep(shirtData[typeID]['color'], function(e){ return e.id == colorID; });
        if (color.length > 0) {
            $('#img_shirt').attr('src', 'images/shirts/'+shirtData[typeID]['filename']+'_'+color[0]['filename']+'_'+shirtSide+'.png');
        }
    }

    // resize all canvases
    function resizeAll() {
        $('#centerLayoutContainer').height($('#centerLayoutContainer div.shirt').width());
        var scale = getScale();
        $('#div_canvas_front').css('margin-top', canvas_top * scale);
        $('#div_canvas_back').css('margin-top', canvas_top * scale);
        canvas_front.setWidth(canvas_width * scale);
        canvas_front.setHeight(canvas_height * scale);
        canvas_front.setZoom(getZoom());
        canvas_front.renderAll();
        canvas_back.setWidth(canvas_width * scale);
        canvas_back.setHeight(canvas_height * scale);
        canvas_back.setZoom(getZoom());
        canvas_back.renderAll();
    }

    function getScale() {
        return $('#centerLayoutContainer div.shirt').width() / shirtWidth;
    }

    function getZoom() {
        return canvas_width * getScale() / canvas_exportwidth;
    }

    function show_cvtoolbox_info(value) {
        $('.cvtoolbox_info div span', '#centerLayoutContainer').text(value);
        $('.cvtoolbox_info', '#centerLayoutContainer').removeClass('warning_msg').show();
    }

    function show_cvtoolbox_warn(value) {
        $('.cvtoolbox_info div span', '#centerLayoutContainer').html(value);
        $('.cvtoolbox_info', '#centerLayoutContainer').addClass('warning_msg').show();
    }

    // render the toolbox
    function prepare_texttoolbox(obj) {
        var data = '<div class="btn-group" data-toggle="buttons">';
        if (obj.get('fontWeight')=='bold') {
            data += '<label class="btn btn-default active" id="texttoolbox_bold"><input type="checkbox" autocomplete="off" istool="bold" checked><i class="fa fa-bold"></i></label>';
        } else {
            data += '<label class="btn btn-default" id="texttoolbox_bold"><input type="checkbox" autocomplete="off" istool="bold"><i class="fa fa-bold"></i></label>';
        }
        
        if (obj.get('fontStyle')=='italic') {
            data += '<label class="btn btn-default active" id="texttoolbox_italic"><input type="checkbox" autocomplete="off" istool="italic" checked><i class="fa fa-italic"></i></label>';
        } else {
            data += '<label class="btn btn-default" id="texttoolbox_italic"><input type="checkbox" autocomplete="off" istool="italic"><i class="fa fa-italic"></i></label>';
        }
        
        if (obj.get('underline')) {
            data += '<label class="btn btn-default active" id="texttoolbox_underline"><input type="checkbox" autocomplete="off" istool="underline" checked><i class="fa fa-underline"></i></label>';
        } else {
            data += '<label class="btn btn-default" id="texttoolbox_underline"><input type="checkbox" autocomplete="off" istool="underline"><i class="fa fa-underline"></i></label>';
        }
        
        if (obj.get('linethrough')) {
            data += '<label class="btn btn-default active" id="texttoolbox_strikethrough"><input type="checkbox" autocomplete="off" istool="strikethrough" checked><i class="fa fa-strikethrough"></i></label>';
        } else {
            data += '<label class="btn btn-default" id="texttoolbox_strikethrough"><input type="checkbox" autocomplete="off" istool="strikethrough"><i class="fa fa-strikethrough"></i></label>';
        }
        
        if (obj.isEditing) {
            data += '<label class="btn btn-default active" id="texttoolbox_edit"><input type="checkbox" autocomplete="off" istool="edit" checked><i class="fa fa-pencil-square-o fa-lg"></i></label>';
        } else {
            data += '<label class="btn btn-default" id="texttoolbox_edit"><input type="checkbox" autocomplete="off" istool="edit"><i class="fa fa-pencil-square-o fa-lg"></i></label>';
        }
        data += '</div>';
        data += '<div class="input-group colorpicker-component" id="texttoolbox_color">';
        data += 'Text color&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="btn btn-default add-on"><i></i></span>';
        data += '</div>';
        data += '<div class="input-group">';
        data += 'Font&nbsp;<select id="texttoolbox_font" style="width: calc(100% - 40px);"><option value="Times New Roman">Times New Roman</option><option value="Pacifico">Pacifico</option><option value="VT323">VT323</option><option value="Quicksand">Quicksand</option><option value="Inconsolata">Inconsolata</option></select>';
        data += '</div>';
        $('.texttoolbox', '#rightLayoutContainer').html(data);
        $('#texttoolbox_color').colorpicker({
            format: "hex",
            color: obj.get('fill')
        }).on('changeColor', texttoolbox_color_change);
        $('#texttoolbox_font').val(obj.get('fontFamily'));
        $('#texttoolbox_font').on('change', function(e) {
            var obj = canvas.getActiveObject();
            if (obj && obj.isType('i-text')) {
                if (this.value !== 'Times New Roman') {
                    loadAndUse(this.value, obj);
                } else {
                    obj.set("fontFamily", this.value);
                    canvas.renderAll();
                }
            }
        });
    }

    // texttoolbox events
    $('.texttoolbox', '#rightLayoutContainer').on('change', function(e) {
        var t = $(e.target);
        if ( t.is('input') && t.attr('istool') ) {
            switch (t.attr('istool')) {
                case 'bold':
                    texttoolbox_bold_change();
                    break;
                case 'italic':
                    texttoolbox_italic_change();
                    break;
                case 'underline':
                    texttoolbox_underline_change();
                    break;
                case 'strikethrough':
                    texttoolbox_strikethrough_change();
                    break;
                case 'edit':
                    texttoolbox_edit_change();
                    break;
            }
	        return false;
        }
    });
    
    $('#btnDownloadDesign').on('click', function(e) {
        var link = document.createElement('a');
        link.href = canvas.toDataURL({format: 'png', multiplier: Math.ceil(10000 / (getZoom()*canvas_exportwidth/canvas_review_width)) / 10000});
        link.download = 'download.png';
        link.style.display = 'none';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        e.preventDefault();
    });
    
    $('#btnDownloadShirt').on('click', function(e) {
        var ratio = shirtWidth/(shirtWidth + 30);
        mergeImages([
            { src: $('#img_shirt').attr('src'), x: 0, y: 0 },
            { 
                src: canvas.toDataURL({format: 'png', multiplier: Math.ceil(10000 / ((getZoom()*canvas_exportwidth/canvas_review_width)*ratio)) / 10000}), 
                x: (shirtWidth + 30 - canvas_review_width/ratio) / 2,
                y: canvas_top / ratio
            }
        ]).then(function(b64) {
            var link = document.createElement('a');
            link.href = b64;
            link.download = 'download.png';
            link.style.display = 'none';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
        e.preventDefault();
    });
    
    function loadAndUse(font, obj) {
        var myfont = new FontFaceObserver(font);
        myfont.load().then(function() {
            // when font is loaded, use it.
            obj.set("fontFamily", font);
            canvas.renderAll();
        });
    }
    function texttoolbox_color_change(e) {
            var obj = canvas.getActiveObject();
            if (obj && obj.isType('i-text')) {
                obj.set('fill', e.color.toHex());
                canvas.renderAll();
            }
    }
    function texttoolbox_bold_change() {
            var obj = canvas.getActiveObject();
            if (obj && obj.isType('i-text')) {
                if ($('#texttoolbox_bold input').prop('checked')) {
                    obj.set('fontWeight', 'bold');
                } else {
                    obj.set('fontWeight', 'normal');
                }
                canvas.renderAll();
            }
    }
    function texttoolbox_italic_change() {
            var obj = canvas.getActiveObject();
            if (obj && obj.isType('i-text')) {
                if ($('#texttoolbox_italic input').prop('checked')) {
                    obj.set('fontStyle', 'italic');
                } else {
                    obj.set('fontStyle', 'normal');
                }
                canvas.renderAll();
            }
    }
    function texttoolbox_underline_change() {
            var obj = canvas.getActiveObject();
            if (obj && obj.isType('i-text')) {
                if ($('#texttoolbox_underline input').prop('checked')) {
                    obj.set('underline', true);
                } else {
                    obj.set('underline', false);
                }
                canvas.renderAll();
            }
    }
    function texttoolbox_strikethrough_change() {
            var obj = canvas.getActiveObject();
            if (obj && obj.isType('i-text')) {
                if ($('#texttoolbox_strikethrough input').prop('checked')) {
                    obj.set('linethrough', true);
                } else {
                    obj.set('linethrough', false);
                }
                canvas.renderAll();
            }
    }
    function texttoolbox_edit_change() {
            var obj = canvas.getActiveObject();
            if (obj && obj.isType('i-text')) {
                if ($('#texttoolbox_edit input').prop('checked')) {
                    obj.enterEditing();
                } else {
                    obj.exitEditing();
                }
                canvas.renderAll();
            }
    }

    function useAlbumPic(filename) {
        $('#albumModal').modal("hide");
        fabric.Image.fromURL(filename, function(oImg) {
            canvas.add(oImg);
            if (oImg.get('width')*getZoom() > canvas.get('width')/2) oImg.scaleToWidth(canvas.get('width')/2);
            oImg.viewportCenter().setCoords();
            canvas.setActiveObject(oImg);
            canvas.renderAll();
        });
    }    
});
