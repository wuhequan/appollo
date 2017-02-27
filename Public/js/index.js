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
		var dtime=i*0.2;
		
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
			element_name:['.banner','.product','.life','.about','.news','.shop','.programme']
		});
		clearInterval(timer);
	}
}, 50);

/*banner*/
var banner=new change();
	banner.position=function(){
		change().position.call(this);
		if(this.data["position_style"]=="banner"){
			var h=$(this.data["element"]+":eq("+this.data["index"]+")").height();
			$(this.data["element_move"]).css({"height":h+"px"});
			$(this.data["element"]).removeClass("in").css({"left":-this.data["position_width"]+"px"});
			$(this.data["element"]+":eq("+this.data["index"]+")").addClass("in").css({"left":"0px"});
		}
	}
	banner.todo=function(data){
		var bool=change().todo.call(this,data);
		if(!bool)return false;
		if(this.data["position_style"]=="banner"){
			
			var direc=-1;
			if(data["direc"]=="-")direc=1;
			
			var h=$(this.data["element"]+":eq("+this.data["index"]+")").height();
			$(this.data["element_move"]).css({"height":h+"px"});
			
			$(this.data["element"]+":eq("+this.data["lastindex"]+")").stop(false,true).removeClass("in").animate({"left":direc*this.data["position_width"]+"px"},500);
			$(this.data["element"]+":eq("+this.data["index"]+")").stop(false,true).addClass("in").css({"left":-direc*this.data["position_width"]+"px"}).animate({"left":"0px"},500,function(){banner.data["todo_bool"]=false;});
			
		}
	}
	banner.init({
		"parent_move_element":".banner",
		"element":".banner .content",
		"position_style":"banner",
		"autoplay":true,
		"autoplay_time":6000,
		"btn":'<div class="child"></div>',
		"btn_function":"banner",
		"btn_parent":".banner .banner-nav",
		"touch":true
	});
