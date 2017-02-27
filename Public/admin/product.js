/*多上传图片*/
function imagesProductMore(timestamp1,token1,swf1,uploader1,showEle1,ele1,fuc){
	var obj=new Object;
	obj.timestamp=timestamp1;
	obj.token=token1;
	obj.swf=swf1;
	obj.uploader=uploader1;
	obj.showEle=showEle1;
	obj.ele=ele1;
	obj.upload=function(){
		$('#'+this.ele).uploadify({
			'formData'     : {
				'timestamp' : this.timestamp,
				'token'     : this.token
			},
			'buttonText' : '上传',
			'swf'      : this.swf,
			'uploader' : this.uploader,
			'onUploadSuccess' : function(file, data, response) {
				if(data==0){
					error();
				}else{
					if(fuc=="product"){
						productResult(data,obj.showEle);
					}else if(fuc=="parameter"){
						parameterResult(data,obj.showEle);
					}
					
				}
	        },
		});
	}
	return obj;
}


function productResult(data,showEle){
	var timestamp="child"+Date.parse(new Date());
	var color=$("#color").val();
	if(!data.indexOf[0])data=data.substr(1);
	$("#"+showEle).append('<div class="'+timestamp+'" style="position:relative;display: inline-block;margin-right:6px;">'+
			'<img class="closeImg" style="position:absolute;top:-8px;right:-8px;cursor:pointer;" onclick="imagesClose(\'.'+timestamp+'\')" src="/Public/uploadify/uploadify-cancel.png" />'+
			'<img class="childImg" style="width:100px;" src="/'+data+'">'+
			'<div style="text-align: center;font-size: 18px;line-height: 40px;color: #656565;">'+color+'</div>'+
			'<input class="saveImg" name="imageUrl[]" type="hidden" value="/'+data+'" />'+
			'<input class="saveColor" name="colors[]" type="hidden" value="'+color+'" />'+
			'</div>');
	$("#color").val("");
}
function parameterResult(data,showEle){
	var timestamp="child"+Date.parse(new Date());
	var parameterTitle=$("#parameterTitle").val();
	var parameterMun=$("#parameterMun").val();
	if(!data.indexOf[0])data=data.substr(1);
	$("#"+showEle).append('<div class="'+timestamp+'" style="position:relative;display: inline-block;margin-right:6px;text-align:center;">'+
			'<img class="closeImg" style="position:absolute;top:-8px;right:-8px;cursor:pointer;" onclick="imagesClose(\'.'+timestamp+'\')" src="/Public/uploadify/uploadify-cancel.png" />'+
			'<img class="childImg" style="width:40px;" src="'+data+'">'+
			'<div style="text-align: center;font-size: 12px;line-height: 20px;color: #656565;">'+parameterTitle+'</div>'+
			'<div style="text-align: center;font-size: 12px;line-height: 20px;color: #656565;">'+parameterMun+'</div>'+
			'<input class="saveParameterUrl" name="parameterUrl[]" type="hidden" value="/'+data+'" />'+
			'<input class="saveParameterTitle" name="parameterTitle[]" type="hidden" value="'+parameterTitle+'" />'+
			'<input class="saveParameterMun" name="parameterMun[]" type="hidden" value="'+parameterMun+'" />'+
			'</div>');
	$("#parameterTitle").val("");
	$("#parameterMun").val("");
}

/*多上传图片之项目小图*/
function minImg(timestamp1,token1,swf1,uploader1,showEle1,ele1){
	var obj=new Object;
	obj.timestamp=timestamp1;
	obj.token=token1;
	obj.swf=swf1;
	obj.uploader=uploader1;
	obj.showEle=showEle1;
	obj.ele=ele1;
	obj.upload=function(){
		$('#'+this.ele).uploadify({
			'formData'     : {
				'timestamp' : this.timestamp,
				'token'     : this.token
			},
			'buttonText' : '上传',
			'swf'      : this.swf,
			'uploader' : this.uploader,
			'onUploadSuccess' : function(file, data, response) {
				if(data==0){
					error();
				}else{
					var timestamp="child"+Date.parse(new Date())+parseInt(Math.random()*1000);
					$("#"+obj.showEle).append('<div class="'+timestamp+'" style="position:relative;display: inline-block;  margin: 0 10px;">'+
							'<img class="closeImg" style="position:absolute;top:-8px;right:-8px;cursor:pointer;" onclick="imagesClose(\'.'+timestamp+'\')" src="/Public/uploadify/uploadify-cancel.png" />'+
							'<img class="childImg" style="width:100px;" src="'+data+'">'+
							'<input class="saveImg" name="minUrls[]" type="hidden" value="'+data+'" />'+
							'</div>');
					/*$("#"+obj.showEle).attr(attrValue,data);
					$("#"+obj.showEle).html(data);
	           		$("#"+obj.saveEle).val(data);*/

				}
	        },
		});
	}
	return obj;
}
/*多上传图片之项目大图*/
function maxImg(timestamp1,token1,swf1,uploader1,showEle1,ele1){
	var obj=new Object;
	obj.timestamp=timestamp1;
	obj.token=token1;
	obj.swf=swf1;
	obj.uploader=uploader1;
	obj.showEle=showEle1;
	obj.ele=ele1;
	obj.upload=function(){
		$('#'+this.ele).uploadify({
			'formData'     : {
				'timestamp' : this.timestamp,
				'token'     : this.token
			},
			'buttonText' : '上传',
			'swf'      : this.swf,
			'uploader' : this.uploader,
			'onUploadSuccess' : function(file, data, response) {
				//alert(data);
				if(data==0){
					error();
				}else{
					var timestamp="child"+Date.parse(new Date())+parseInt(Math.random()*1000);
					$("#"+obj.showEle).append('<div class="'+timestamp+'" style="position:relative;display: inline-block;  margin: 0 10px;">'+
							'<img class="closeImg" style="position:absolute;top:-8px;right:-8px;cursor:pointer;" onclick="imagesClose(\'.'+timestamp+'\')" src="/Public/uploadify/uploadify-cancel.png" />'+
							'<img class="childImg" style="width:100px;" src="'+data+'">'+
							'<input class="saveImg" name="maxUrls[]" type="hidden" value="'+data+'" />'+
							'</div>');
					/*$("#"+obj.showEle).attr(attrValue,data);
					$("#"+obj.showEle).html(data);
	           		$("#"+obj.saveEle).val(data);*/

				}
	        },
		});
	}
	return obj;
}
/*多上传图片之在售户型*/
function sellImg(timestamp1,token1,swf1,uploader1,showEle1,ele1){
	var obj=new Object;
	obj.timestamp=timestamp1;
	obj.token=token1;
	obj.swf=swf1;
	obj.uploader=uploader1;
	obj.showEle=showEle1;
	obj.ele=ele1;
	obj.upload=function(){
		$('#'+this.ele).uploadify({
			'formData'     : {
				'timestamp' : this.timestamp,
				'token'     : this.token
			},
			'buttonText' : '上传',
			'swf'      : this.swf,
			'uploader' : this.uploader,
			'onUploadSuccess' : function(file, data, response) {
				if(data==0){
					error();
				}else{
					var timestamp="child"+Date.parse(new Date())+parseInt(Math.random()*1000);
					$("#"+obj.showEle).append('<div class="'+timestamp+'" style="position:relative;display: inline-block;  margin: 0 10px;">'+
							'<img class="closeImg" style="position:absolute;top:-8px;right:-8px;cursor:pointer;" onclick="imagesClose(\'.'+timestamp+'\')" src="/Public/uploadify/uploadify-cancel.png" />'+
							'<img class="childImg" style="width:100px;" src="'+data+'">'+
							'<input class="saveImg" name="sellUrls[]" type="hidden" value="'+data+'" />'+
							'</div>');
					/*$("#"+obj.showEle).attr(attrValue,data);
					$("#"+obj.showEle).html(data);
	           		$("#"+obj.saveEle).val(data);*/

				}
	        },
		});
	}
	return obj;
}
