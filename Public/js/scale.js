$(function(){
    $(".news ul li").each(function(i,n){
        var dtime=i*0.2;
        
        base.anClasAdd($(n),"scaleIn",".6s",dtime+"s","ease-in-out","both");
    }); 
    $(".shop ul li").each(function(i,n){
        var dtime=i*0.3;
        
        base.anClasAdd($(n),"scaleIn",".6s",dtime+"s","ease-in-out","both");
    }); 
    $(".product .list-box .list").each(function(i,n){
        var dtime=i*0.2;
        
        base.anClasAdd($(n),"scaleIn01",".6s",dtime+"s","ease-in-out","both");
    }); 
    $(".programme ul li").each(function(i,n){
        var dtime=i*0.6;
        
        base.anClasAdd($(n),"scaleIn01",".6s",dtime+"s","ease-in-out","both");
    });    
    $(".service ul li").each(function(i,n){
        var dtime=i*0.6;
        
        base.anClasAdd($(n),"scaleIn01",".6s",dtime+"s","ease-in-out","both");
    });
});
/*scroll*/
var imgBool=[],
    imgBool1=[],
    main_scroll=new keepScroll(),
    timer;
$("img").each(function(index, element) {
    var img=new Image();
    img.src=$(element).attr("src");
    imgBool[index]=false;
    imgBool1[index]=true;
    base.imgLoad(img, function() {
        imgBool[index]=true;
    });
});
timer = setInterval(function() {
    if (imgBool1.toString()==imgBool.toString()) {
        main_scroll.init({
            element_name:['.banner','.product','.life','.about','.news','.shop','.programme','.service']
        });
        clearInterval(timer);
    }
}, 50);