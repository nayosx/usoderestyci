/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery.fn.dataTableExt.oApi.fnFilterClear=function(e){var a,r;if(e.oPreviousSearch.sSearch="","undefined"!=typeof e.aanFeatures.f){var n=e.aanFeatures.f;for(a=0,r=n.length;r>a;a++)$("input",n[a]).val("")}for(a=0,r=e.aoPreSearchCols.length;r>a;a++)e.aoPreSearchCols[a].sSearch="";e.oApi._fnReDraw(e)};

