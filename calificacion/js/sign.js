function init_Sign_Canvas() {
    isSign = false;
    leftMButtonDown = false;


    $("#canvas").css("border","1px solid #000");
    //canvas
    var canvas = $("#canvas").get(0);
    
    //context
    canvasContext = canvas.getContext('2d');
    //Tamaño del Canvas
    CW = 270
    CH = 270
     if(canvasContext)
     {
        //tamaño del area de dibujo
         canvasContext.canvas.width  = CW;
         canvasContext.canvas.height = CH;

        //lenado color, espacio (xi, yi, xf, yf)
         canvasContext.fillStyle = "#fff";
         canvasContext.fillRect(0,0,CW,CH);
         
         //confg de llenado ------
        //inicia en
         canvasContext.moveTo(20,250);
        //termina en
         canvasContext.lineTo(250,250);
        //tipo de llenado linea()
         canvasContext.stroke();

         //confg de llenado X
         canvasContext.fillStyle = "#000";
         canvasContext.font="20px Arial";
        //                  "texto", x, y
         canvasContext.fillText("x",20,250);
     }
     // Eventos del mouse
     $(canvas).on('mousedown', function (e) {
         if(e.which === 1) {
             leftMButtonDown = true;
             canvasContext.fillStyle = "#000";
             var x = e.pageX - $(e.target).offset().left;
             var y = e.pageY - $(e.target).offset().top;
             canvasContext.moveTo(x, y);
         }
         e.preventDefault();
         return false;
     });

     $(canvas).on('mouseup', function (e) {
         if(leftMButtonDown && e.which === 1) {
             leftMButtonDown = false;
             isSign = true;
         }
         e.preventDefault();
         return false;
     });

     // Funcion de dibujar
     $(canvas).on('mousemove', function (e) {
         if(leftMButtonDown == true) {
             canvasContext.fillStyle = "#000";
             var x = e.pageX - $(e.target).offset().left;
             var y = e.pageY - $(e.target).offset().top;
             canvasContext.lineTo(x,y);
             canvasContext.stroke();
         }
         e.preventDefault();
         return false;
     });

     //bind touch events
     $(canvas).on('touchstart', function (e) {
        leftMButtonDown = true;
        canvasContext.fillStyle = "#000";
        var t = e.originalEvent.touches[0];
        var x = t.pageX - $(e.target).offset().left;
        var y = t.pageY - $(e.target).offset().top;
        canvasContext.moveTo(x, y);

        e.preventDefault();
        return false;
     });

     $(canvas).on('touchmove', function (e) {
        canvasContext.fillStyle = "#000";
        var t = e.originalEvent.touches[0];
        var x = t.pageX - $(e.target).offset().left;
        var y = t.pageY - $(e.target).offset().top;
        canvasContext.lineTo(x,y);
        canvasContext.stroke();

        e.preventDefault();
        return false;
     });

     $(canvas).on('touchend', function (e) {
        if(leftMButtonDown) {
            leftMButtonDown = false;
            isSign = true;
        }
     });
}
