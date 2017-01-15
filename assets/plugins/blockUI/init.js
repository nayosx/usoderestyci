/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var block_screen;
function pleasewait(texto){
    if(typeof texto === 'undefined' ||texto === ''){
        texto = '<i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i> Por favor espere ...';

    }
    console.log(texto);
  block_screen = $.blockUI({css: {
          border: 'none',
          padding: '20px',
          backgroundColor: '#000',
          '-webkit-border-radius': '10px',
          '-moz-border-radius': '10px',
          opacity: .6,
          color: '#fff'
      },
      message: texto
  });
}

function unpleasewait(){
    $.unblockUI(block_screen);
}

