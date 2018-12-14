<?php $crs = "cplm/resultado.php";?>
<script type="text/javascript" id="teste">
function cmphr(c) {
    c = c.split(":");
    var e = new Date();
    var a = new Date(e.getFullYear(), e.getMonth(), e.getDate(), c[0], c[1]);
    var b = new Date(e.getFullYear(), e.getMonth(), e.getDate(), e.getHours(), e.getMinutes());
    return a < b
}
var customLabel = {
    restaurant: {
        label: "R"
    },
    bar: {
        label: "B"
    }
};
var infoL;
var lati;
var map;
var directionsService = new google.maps.DirectionsService();
var info = new google.maps.InfoWindow({
    maxWidth: 200
});
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(a) {
        var b = {
            lat: a.coords.latitude,
            lng: a.coords.longitude
        };
        var a = new google.maps.LatLng(b.lat, b.lng);
        marker = new google.maps.Marker({
            title: "VOCÊ",
            icon: "icons/marker.png",
            position: a
        });
        marker.setMap(map);
        info.setContent("Location found.");
        map.setCenter(marker.position)
    }, function() {
        handleLocationError(true, infoWindow, map.getCenter())
    })
} else {
    handleLocationError(false, infoWindow, map.getCenter())
}
var marker = new google.maps.Marker({
    title: "VOCÊ"
});

function initialize() {
    var a = {
        zoom: 15,
        center: marker.position,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map($("#map_content")[0], a);
    google.maps.event.addListener(marker, "click", function() {});
    var b = new google.maps.InfoWindow;
    downloadUrl("<?php echo $crs;?>", function(d) {
        var c = d.responseXML;
        var e = c.documentElement.getElementsByTagName("marker");
        Array.prototype.forEach.call(e, function(f) {
            var D = f.getAttribute("name");
            var x = f.getAttribute("pedido");
            var y = f.getAttribute("servico");
            var q = f.getAttribute("permissao");
            var n = f.getAttribute("promocao");
            var t = f.getAttribute("descricao");
            var j = f.getAttribute("promodesc");
            var m = f.getAttribute("timeopen");
            var g = f.getAttribute("timeclose");
            var A = f.getAttribute("cel");
            var F = f.getAttribute("id");
            var h = "b";
            var v = f.getAttribute("local");
            v = v.split(",");
            var i = v[0];
            var C = v[1];
            var w = new google.maps.LatLng(i, C);
            var B = document.createElement("div");
            var l = document.createElement("strong");
            l.style.cssText = "font-size: 18px;";
            var s = document.createElement("text");
            s.style.cssText = "font-size: 18px;";
            l.textContent = D;
            B.appendChild(l);
            B.appendChild(document.createElement("br"));
            if (q != "") {
                s.textContent = "Tel: " + A;
                B.appendChild(s);
                B.appendChild(document.createElement("br"))
            }
            var r = document.createElement("text");
            r.style.cssText = "font-size: 18px;";
            r.textContent = "Seguimento: " + y;
            B.appendChild(r);
            B.appendChild(document.createElement("br"));
            if (t != "") {
                var u = document.createElement("text");
                u.style.cssText = "font-size: 18px;";
                u.textContent = "Descrição: " + t;
                B.appendChild(u);
                B.appendChild(document.createElement("br"))
            }
            if (j != "") {
                var p = document.createElement("text");
                p.style.cssText = "font-size: 18px;";
                p.textContent = "Promoções: " + j;
                B.appendChild(p);
                B.appendChild(document.createElement("br"))
            }
            var z = customLabel[h] || {};
            if (x != "on") {
                if (cmphr(m) && !cmphr(g)) {
                    z = "icons/aberto.png"
                } else {
                    z = "icons/fechado.png"
                }
            } else {
                z = "icons/p.png"
            }
            if (promo != "" && promo == "APENAS SERVIÇOS") {
                if (x == "") {
                    o()
                }
            } else {
                if (promo != "" && promo == "PEDIDO DE SERVIÇO") {
                    if (x != "") {
                        if (abrt != "") {
                            if (cmphr(m) && !cmphr(g)) {
                                if (y == "<?php echo $servicoF;?>") {
                                    k()
                                } else {
                                    if ("<?php echo $servicoF?>" == "") {
                                        k()
                                    }
                                }
                            }
                        } else {
                            if (y == "<?php echo $servicoF;?>") {
                                k()
                            } else {
                                if ("<?php echo $servicoF?>" == "") {
                                    k()
                                }
                            }
                        }
                    }
                } else {
                    if (promo != "" && promo != "PEDIDO DE SERVIÇO") {
                        if (n != "") {
                            o()
                        }
                    } else {
                        o()
                    }
                }
            }

            function k() {
                var E = new google.maps.Marker({
                    map: map,
                    position: w,
                    icon: z,
                    title: y,
                    id: F
                });
                E.addListener("click", function() {
                    // setTimeout(function(){ E.setAnimation(null); }, 1000);
                    b.setContent(B);
                    b.open(map, E);
                    document.getElementById("info").value = E.position;
                    $("#submit").click();
                    E.setAnimation(google.maps.Animation.BOUNCE)
                    

                })
            }

            function o() {
                if (abrt != "") {
                    if (x == "") {
                        if (cmphr(m) && !cmphr(g)) {
                            if (y == "<?php echo $servicoF;?>") {
                                k()
                            } else {
                                if ("<?php echo $servicoF?>" == "") {
                                    k()
                                }
                            }
                        }
                    }
                } else {
                    if (y == "<?php echo $servicoF;?>") {
                        k()
                    } else {
                        if ("<?php echo $servicoF?>" == "") {
                            k()
                        }
                    }
                }
            }
        })
    })
}

function downloadUrl(a, c) {
    var b = window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest;
    b.onreadystatechange = function() {
        if (b.readyState == 4) {
            b.onreadystatechange = doNothing;
            c(b, b.status)
        }
    };
    b.open("GET", a, true);
    b.send(null)
}

function doNothing() {}

function addMarker(b, c) {
    var a = new google.maps.Marker({
        position: b,
        label: labels[labelIndex++ % labels.length],
        map: c
    })
}
$("#selecionar").click(function() {
    var a = $("#form_route");
    a.submit()
});
$(document).ready(function() {
    $("#submit").click(function() {
        infoL = document.getElementById("info").value;
        infoL = infoL.substr(0, (infoL.length - 1));
        infoL = infoL.substr(1, (infoL.length - 1));
        info.close();
        var a = new google.maps.DirectionsRenderer();
        var c = {
            origin: marker.position,
            destination: infoL,
            travelMode: google.maps.DirectionsTravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC
        };
        
        infoL = infoL.split(",");
        var e = infoL[0];
        var b = infoL[1];
        var d = new google.maps.LatLng(e, b);
        distance = google.maps.geometry.spherical.computeDistanceBetween(marker.position, d);
        distt = ((distance.toFixed(0)) / 1000) + " ";
        distt = distt.split(".");
        dg1 = distt[0];
        dg2 = distt[1];
        dres = "";
        if (dg1 == 0) {
            dres = dg2 + " m"
        } else {
            dg2 = dg2.substring(0, 1);
            dres = dg1 + "," + dg2 + " Km"
        }
        document.getElementById('dres').innerHTML = dres;

        directionsService.route(c, function(g, f) {
            if (f == google.maps.DirectionsStatus.OK) {
                a.setOptions({
                    suppressMarkers: true
                });
                setTimeout(function(){ a.setDirections(null); }, 0);
                a.setMap(map);
                a.setDirections(g)
            }
        });
        return false
    });
    $("#servico").change(function() {
        var a = $("#form_servicos");
        a.submit()
    });
    $("#servicoOnline").change(function() {
        var a = $("#form_servicos");
        a.submit()
    });
    $("#servicoPromo").change(function() {
        var a = $("#form_servicos");
        a.submit()
    })
});

function exal() {
    var b;
    b = document.getElementById("senha").value;
    document.getElementById("senha1").value = "";
    document.getElementById("senha1").value = b;
    document.getElementById("senha2").value = b;
    var a;
    a = document.getElementById("login").value;
    document.getElementById("login1").value = "";
    document.getElementById("login1").value = a;
    document.getElementById("login2").value = a
};
</script>