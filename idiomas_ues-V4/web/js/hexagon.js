$(document).ready(function () {

    positionHexagon();
    $("#esconder").click(function(){
        $("li.hexagon").slideToggle(800);
    })
});

//Hexagonos de linea en linea PEGADOS
function positionHexagon() {
    //CANTIDAD DE HEXAGONOS
    var espacio = [1, 1, 1]; //Cantidad de exagonos en una linea

    //POSICION DE HEXAGONOS 
    hexagon = document.querySelectorAll("li.hexagon");
    width_hexagon = parseInt($(hexagon[0]).css("width"));
    separation = 2; //Distancia entre hexagonos

    left_hexagon = [10, 10]; //Distancia de separacion entre el DIV (X)
    left_hexagon.push((width_hexagon / 2) + (separation / 2) + left_hexagon[0]);
    top_hexagon = -30; //Distancia de separacion entre el DIV (Y)

    for (var i = 0; i < hexagon.length; i++) {
        if (i >= espacio[1]) {
            espacio[1] = espacio[1] + espacio[0];
            top_hexagon = top_hexagon + width_hexagon - (width_hexagon / 7) + separation;
        }
        if (left_hexagon[1] == (width_hexagon + separation) * espacio[0] + left_hexagon[0]) {
            left_hexagon[1] = left_hexagon[2];
        } else if (left_hexagon[1] == (width_hexagon + separation) * espacio[0] + left_hexagon[2]) {
            left_hexagon[1] = left_hexagon[0];
        }
        $(hexagon[i]).css({
            "top": top_hexagon,
            "left": left_hexagon[1],
        });
        left_hexagon[1] = left_hexagon[1] + (width_hexagon + separation);
    }

    //POSICION DE LA IMAGEN DE FONDO
    var positionSpan = document.querySelectorAll("span.hexagon-in2");
    x_position = [-300, -300]; //Posicion de la imagen de fondo (X)
    x_position.push(-(width_hexagon / 2) - (separation / 2) + x_position[0])
    y_position = -40; //Posicion de la imagen de fondo (Y)

    for (var i = 0; i < positionSpan.length; i++) {
        if (i >= espacio[2]) {
            espacio[2] = espacio[2] + espacio[0];
            y_position = y_position - (width_hexagon - (width_hexagon / 7)) - separation;
        }
        if (x_position[1] == (-(width_hexagon + separation) * espacio[0] + x_position[0])) {
            x_position[1] = x_position[2];
        } else if (x_position[1] == -(width_hexagon + separation) * espacio[0] + x_position[2]) {
            x_position[1] = x_position[0];
        }
        $(positionSpan[i]).css({
            "background-position-x": x_position[1],
            "background-position-y": y_position,
        });
        x_position[1] = x_position[1] - (width_hexagon + separation);
    }
}