/*!

 * WebCodeCamJQuery 2.1.0 javascript Bar-Qr code decoder 

 * Author: Tóth András

 * Web: http://atandrastoth.co.uk

 * email: atandrastoth@gmail.com

 * Licensed under the MIT license

 */

 (function(undefined) {

    var scannerLaser = $(".scanner-laser"),

    imageUrl = $("#image-url"),

    decodeLocal = $("#decode-img"),

    play = $("#play"),

    scannedImg = $("#scanned-img"),

    scannedQR = $("#scanned-QR"),

    grabImg = $("#grab-img"),

    pause = $("#pause"),

    stop = $("#stop"),

    contrast = $("#contrast"),

    contrastValue = $("#contrast-value"),

    zoom = $("#zoom"),

    zoomValue = $("#zoom-value"),

    brightness = $("#brightness"),

    brightnessValue = $("#brightness-value"),

    threshold = $("#threshold"),

    thresholdValue = $("#threshold-value"),

    sharpness = $("#sharpness"),

    sharpnessValue = $("#sharpness-value"),

    grayscale = $("#grayscale"),

    grayscaleValue = $("#grayscale-value"),

    flipVertical = $("#flipVertical"),

    flipVerticalValue = $("#flipVertical-value"),

    flipHorizontal = $("#flipHorizontal"),

    flipHorizontalValue = $("#flipHorizontal-value");

    var args = {

        autoBrightnessValue: 100,

        resultFunction: function(res) {

            [].forEach.call(scannerLaser, function(el) {

                $(el).fadeOut(300, function() {

                    $(el).fadeIn(300);

                });

            });

            scannedImg.attr("src", res.imgData);

            scannedQR.text(res.format + ": " + res.code);

            if(res.code.includes("re") && res.code.includes("rr") && res.code.includes("tt") && res.code.includes("id")){

                console.log(res.code);

                var code = res.code.split("?");

                var arrayTokens = code[1].split("&");

                var re, rr, tt, id;

                arrayTokens.forEach(function(element) {

                    if(element.includes("id")){
                        id = element.substring(3);
                    }

                    if(element.includes("re")){
                        re = element.substring(3);
                    }

                    if(element.includes("rr")){
                        rr = element.substring(3);
                    }

                    if(element.includes("tt")){
                        tt = element.substring(3);
                    }

                });        

                console.log("--- Valicaciones de lectura ---");

                console.log("re = " + re);
                console.log("rr = " + rr);
                console.log("tt = " + tt);
                console.log("id = " + id);
                /*alert("re = " + re);
                alert("rr = " + rr);
                alert("tt = " + tt);
                alert("id = " + id);*/
                
                //Variables test

                var test_1, test_2, test_3, test_4, test_5, test_6 = false;

                //validaciones folio fiscal

                console.log("--- Test id ---");

                if(id.length == 36){
                    console.log("Test length = " + true);
                    test_1 = true;
                }
                else
                {
                    console.log("Test length = " + false);
                    //alert("Test length["+id.length+"] = " + false);
                }

                var patron = /^[a-zA-Z0-9.-]*$/; //Admite cualquier una cadena alfanumérico y el guión "-"

                if(id.search(patron)){

                    console.log("Test caracter no válido  = " + false);
                    //alert("Test caracter no válido = " + false);
                }
                else
                {
                    console.log("Test caracter no válido  = " + true);
                    test_2 = true;
                } 

                var patron_formato = /^[a-zA-Z0-9]{8}[.-][a-zA-Z0-9]{4}[.-][a-zA-Z0-9]{4}[.-][a-zA-Z0-9]{4}[.-][a-zA-Z0-9]{12}$/; // Expresión regular para el formato del folio fiscal

                if(id.search(patron_formato)){
                    console.log("Test formato no válido  = " + false);
                    //alert("Test formato no válido["+id+"] = " + false);
                }
                else
                {
                    console.log("Test formato no válido  = " + true);
                    test_3 = true;
                } 

                console.log("--- RFC ---");

                if(re.length >= 12 && rr.length <= 15){
                    console.log("Test length ["+re+"] = " + true);
                    test_4 = true;
                }
                else{

                    console.log("Test length ["+re+"] = " + false);
                    //alert("Test length ["+re+"] = " + false);
                }

                if(rr.length >= 12 && rr.length <= 15){
                    console.log("Test length ["+rr+"] = " + true);
                    test_5 = true;
                }
                else
                {
                    console.log("Test length ["+rr+"] = " + false);
                    //alert("Test length ["+rr+"] = " + false);
                }

                console.log("--- TT ---");

                if(tt.length > 4){

                    console.log("Test length ["+tt+"] = " + true);
                    test_6 = true;
                }
                else
                {
                    console.log("Test length ["+tt+"] = " + false);
                    //alert("Test length ["+tt+"] = " + false);
                }

                if(test_1&&test_2&&test_3&&test_4&&test_5&&test_6){

                    var serialize = "re="+re+"&rr="+rr+"&tt="+tt+"&id="+id;

                    $.ajax({

                        url: 'form.php',

                        type: 'POST',

                        data: serialize,

                        success: function (jsonObject) {

                            console.log(jsonObject);

                            var object = $.parseJSON(jsonObject);

                            swal({

                              title: object.title,

                              text: object.message,

                              type: object.type,

                              confirmButtonText: "Aceptar"

                          });

                        },

                        failed: function(result) {

                            console.log("failed");

                        }

                    }); 

                    return false;

                }

                else {

                    console.log("Mala lectura.");

                    swal({

                        title: "Ups!",

                        text: "Hubo una mala lectura. Favor de intentarlo de nuevo.",

                        type: "warning",

                        confirmButtonText: "Aceptar"

                    });

                }



            }

            else {

                console.log("No es un código QR válido :(");

                swal({

                    title: "Ups!",

                    text: "No es un código QR válido o hubo una mala lectura. Favor de intentarlo de nuevo.",

                    type: "warning",

                    confirmButtonText: "Aceptar"

                });

            }



            //console.log("Si los Test arrojan resultado en 'false', es porque hubo alguna mala de lectura al escanear el código");



            /*var noValidos = [ "", "&" , "$", "#" , "!", "" ];

            for (var i = 0 ; noValidos.length > i; i++) {

                console.log(noValidos[i]);

                if(id.includes(noValidos[i])){

                    console.log("Test caracter no valido ["+ noValidos[i]+"] = " + false);

                }else{

                    console.log("Test caracter no valido ["+ noValidos[i]+"] = " + true);

                }

            }



            $.ajax({

                url: 'form.php',

                type: 'POST',

                data: 'contarTotales',

                success: function (jsonObject) {

                    console.log(jsonObject);

                    var object = $.parseJSON(jsonObject);

                    var status = $(".status-item");

                    for (var i = 0 ;  i < status.length; i++) {

                        var item = $(status[i]).parents(".item");

                        var id = $(item).attr("id");

                        if(object[id] != 0){

                            $("#" + id).addClass("item-selected");

                            $("#" + id + " .buttons").html("<button class='btn btn-count'>0</button><button class='btn btn-minus' name='agregar' onclick='javascript:submit(this);'><i class='fa fa-plus' aria-hidden='true'></i></button><button class='btn btn-minus' name='eliminar' onclick='javascript:submit(this);'><i class='fa fa-minus' aria-hidden='true'></i></button>");

                            $("#" + id + " .status-item").html("EN LISTA <i class='fa fa-check' aria-hidden='true'></i>");

                            $("#" + id + " .status-item").val("true");

                            $("#" + id + " .btn-count").html(object[id]);

                            $("#compras").html(object.puntos);

                        }

                    }

                },

                failed: function(result) {

                    console.log("failed");

                }

            }); 

            return false;*/



        },

        getDevicesError: function(error) {

            var p, message = "Error detected with the following parameters:\n";

            for (p in error) {

                message += (p + ": " + error[p] + "\n");

            }

            alert(message);

        },

        getUserMediaError: function(error) {

            var p, message = "Error detected with the following parameters:\n";

            for (p in error) {

                message += (p + ": " + error[p] + "\n");

            }

            alert(message);

        },

        cameraError: function(error) {

            var p, message = "Error detected with the following parameters:\n";

            if (error.name == "NotSupportedError") {

                var ans = confirm("Your browser does not support getUserMedia via HTTP!\n(see: https://goo.gl/Y0ZkNV).\n You want to see github demo page in a new window?");

                if (ans) {

                    window.open("https://andrastoth.github.io/webcodecamjs/");

                }

            } else {

                for (p in error) {

                    message += p + ": " + error[p] + "\n";

                }

                alert(message);

            }

        },

        cameraSuccess: function() {

            grabImg.removeClass("disabled");

        }

    };

    var decoder = $("#webcodecam-canvas").WebCodeCamJQuery(args).data().plugin_WebCodeCamJQuery;

    decoder.buildSelectMenu("#camera-select", "environment|back").init();

    

    scannedQR.text("Scanning ...");

    grabImg.removeClass("disabled");

    decoder.play();



    decodeLocal.on("click", function() {

        Page.decodeLocalImage();

    });

    play.on("click", function() {

        scannedQR.text("Scanning ...");

        grabImg.removeClass("disabled");

        decoder.play();

    });

    grabImg.on("click", function() {

        scannedImg.attr("src", decoder.getLastImageSrc());

    });

    pause.on("click", function(event) {

        scannedQR.text("Paused");

        decoder.pause();

    });

    stop.on("click", function(event) {

        grabImg.addClass("disabled");

        scannedQR.text("Stopped");

        decoder.stop();

    });

    Page.changeZoom = function(a) {

        if (decoder.isInitialized()) {

            var value = typeof a !== "undefined" ? parseFloat(a.toPrecision(2)) : zoom.val() / 10;

            zoomValue.text(zoomValue.text().split(":")[0] + ": " + value.toString());

            decoder.options.zoom = value;

            if (typeof a != "undefined") {

                zoom.val(a * 10);

            }

        }

    };

    Page.changeContrast = function() {

        if (decoder.isInitialized()) {

            var value = contrast.val();

            contrastValue.text(contrastValue.text().split(":")[0] + ": " + value.toString());

            decoder.options.contrast = parseFloat(value);

        }

    };

    Page.changeBrightness = function() {

        if (decoder.isInitialized()) {

            var value = brightness.val();

            brightnessValue.text(brightnessValue.text().split(":")[0] + ": " + value.toString());

            decoder.options.brightness = parseFloat(value);

        }

    };

    Page.changeThreshold = function() {

        if (decoder.isInitialized()) {

            var value = threshold.val();

            thresholdValue.text(thresholdValue.text().split(":")[0] + ": " + value.toString());

            decoder.options.threshold = parseFloat(value);

        }

    };

    Page.changeSharpness = function() {

        if (decoder.isInitialized()) {

            var value = sharpness.prop("checked");

            if (value) {

                sharpnessValue.text(sharpnessValue.text().split(":")[0] + ": on");

                decoder.options.sharpness = [0, -1, 0, -1, 5, -1, 0, -1, 0];

            } else {

                sharpnessValue.text(sharpnessValue.text().split(":")[0] + ": off");

                decoder.options.sharpness = [];

            }

        }

    };

    Page.changeGrayscale = function() {

        if (decoder.isInitialized()) {

            var value = grayscale.prop("checked");

            if (value) {

                grayscaleValue.text(grayscaleValue.text().split(":")[0] + ": on");

                decoder.options.grayScale = true;

            } else {

                grayscaleValue.text(grayscaleValue.text().split(":")[0] + ": off");

                decoder.options.grayScale = false;

            }

        }

    };

    Page.changeVertical = function() {

        if (decoder.isInitialized()) {

            var value = flipVertical.prop("checked");

            if (value) {

                flipVerticalValue.text(flipVerticalValue.text().split(":")[0] + ": on");

                decoder.options.flipVertical = value;

            } else {

                flipVerticalValue.text(flipVerticalValue.text().split(":")[0] + ": off");

                decoder.options.flipVertical = value;

            }

        }

    };

    Page.changeHorizontal = function() {

        if (decoder.isInitialized()) {

            var value = flipHorizontal.prop("checked");

            if (value) {

                flipHorizontalValue.text(flipHorizontalValue.text().split(":")[0] + ": on");

                decoder.options.flipHorizontal = value;

            } else {

                flipHorizontalValue.text(flipHorizontalValue.text().split(":")[0] + ": off");

                decoder.options.flipHorizontal = value;

            }

        }

    };

    Page.decodeLocalImage = function() {

        if (decoder.isInitialized()) {

            decoder.decodeLocalImage(imageUrl.val());

        }

        imageUrl.val(null);

    };

    var getZomm = setInterval(function() {

        var a;

        try {

            a = decoder.getOptimalZoom();

        } catch (e) {

            a = 0;

        }

        if (!!a && a !== 0) {

            Page.changeZoom(a);

            clearInterval(getZomm);

        }

    }, 500);

    $("#camera-select").on("change", function() {

        if (decoder.isInitialized()) {

            decoder.stop().play();

        }

    });

}).call(window.Page = window.Page || {});