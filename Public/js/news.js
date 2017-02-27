$(function(){
    $(".main ul li").each(function(i,n){
        var dtime=i*0.2;
        
        base.anClasAdd($(n),"scaleIn",".6s",dtime+"s","ease-in-out","both");
    }); 
})