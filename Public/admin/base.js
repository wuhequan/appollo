var deSureUrl="";
var changeStatusUrl="";
var changeValueUrl="";
function setDeSureUrl(url){
	deSureUrl=url;
}
function setChangeStatus(url){
	changeStatusUrl=url;
}
function changeStatusClassify(url){
	changeStatusClassify=url;
}
function setChangeValue(url){
	changeValueUrl=url;
}


function del(ele,model,idname,id,judge){
	$("#alertModel").show(500);
	$("#alertSure").unbind("click");
	judge=judge||0;
	
	$("#alertSure").bind("click",{ele:ele,model:model,idname:idname,id:id,judge:judge},delSure);
}
function delSure(event){
	$.post(
		deSureUrl,
		{
			'model':event.data.model,
			'id_name':event.data.idname,
			'id':event.data.id,
			'judge':event.data.judge
		},               
		function(data){
			if(data==1){
				$("#alertModel").hide();
                $(event.data.ele).parent().parent().hide();
			}else{
				alert("删除失败！");
			}
		}
		
	);
}
function alertNo(){
	$("#alertModel").hide(500);		
}
function changeStatus(ele,model,idname,id,statusname,status){

	status==1?status=0:status=1;
	$.post(
		changeStatusUrl,
		{
			'model':model,
			'id_name':idname,
			'id':id,
			'statusname':statusname,
			'status':status
		},
		function(data){
			if(data==1){
                $(ele).removeClass("red").addClass("green").html('<i class="icon-ok-sign icon-white"></i>').attr("onclick","").unbind("click").bind("click",function(){
                	changeStatus(ele,model,idname,id,statusname,1)
                });
			}else if(data==0){
                $(ele).removeClass("green").addClass("red").html('<i class="icon-remove-sign icon-white"></i>').attr("onclick","").unbind("click").bind("click",function(){
                	changeStatus(ele,model,idname,id,statusname,0);
                });
			}else{
				
				alert("失败！");
			}
		}
		
	);
}
function change(ele,saveEle,status){
	
	if(status==0){
		$("#"+saveEle).val("1");
		$(ele).removeClass("red").addClass("green").html('<i class="icon-ok-sign icon-white"></i>').attr("onclick","").unbind("click").bind("click",function(){
    		change(ele,saveEle,1);
    	});
	}else{
		$("#"+saveEle).val("0");
		$(ele).removeClass("green").addClass("red").html('<i class="icon-remove-sign icon-white"></i>').attr("onclick","").unbind("click").bind("click",function(){
	    	change(ele,saveEle,0);
	    });
	}
    	
}
/*局部更新*/
function changeValue(ele,model,idname,id,valuename,value){
	$.post(
		changeValueUrl,
		{
			'model':model,
			'id_name':idname,
			'id':id,
			'value_name':valuename,
			'value':value
		},
		function(data){
			if(data==404){

                errorNo();
			}else{
				successNo();
			}
		}
		
	);
}

/*editor*/

function editor(publicUrl,ele,eHeight){
	eHeight=eHeight?eHeight:"600px";
	var obj=new Object;
	obj.editor=CKEDITOR.replace(ele,{
		filebrowserBrowseUrl : publicUrl+'/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : publicUrl+'/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : publicUrl+'/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : publicUrl+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : publicUrl+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : publicUrl+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	obj.getContent=function(){
		var content=obj.editor.getData();
		return content;
	}
	CKEDITOR.config.width="90%";
	CKEDITOR.config.height=eHeight;
	return obj;
}


//var content=editor.document.getBody().getHtml();

/*跳转提示*/
function success(url){
	$("#message-success").animate({"top":"80px"},500);
	url?window.location.href=url:$("#message-success").delay(1000).animate({"top":"-80px"},500);
	
}
function error(){
	$("#message-error").animate({"top":"80px"},500);
	$("#message-error").delay(1000).animate({"top":"-80px"},500);
}
/*没跳转提示*/
function successNo(){
	$("#message-success").animate({"top":"80px"},500);
	$("#message-success").delay(1000).animate({"top":"-80px"},500);
}
function errorNo(){
	$("#message-error").animate({"top":"80px"},1000);
	$("#message-error").delay(1000).animate({"top":"-80px"},500);
}

function pwerrorNo(){
	$("#pwmessage-error").animate({"top":"80px"},1000);
	$("#pwmessage-error").delay(1000).animate({"top":"-80px"},500);
}


function images(timestamp1,token1,swf,uploader1,showEle1,saveEle1,ele1,attrValue){
    var obj=new Object;
    obj.timestamp=timestamp1;
    obj.token=token1;
    obj.uploader=uploader1;
    obj.showEle=showEle1;
    obj.saveEle=saveEle1;
    obj.ele=ele1;
    obj.upload=function(){
        $('#'+this.ele).uploadifive({
            'formData'     : {
                'timestamp' : this.timestamp,
                'token'     : this.token
            },
            'buttonText' : '上传',
            'removeCompleted'   : true,
            
            'uploadScript' : this.uploader,
            'onUploadComplete' : function(file, data) {
                console.log(data);
                if(data==0){
                    error();
                }else{
                    $("#"+obj.showEle).attr(attrValue,data);
                    $("#"+obj.showEle).html(data);
                    $("#"+obj.saveEle).val(data);

                }
            },
        });
    }
    return obj;
}
/*多上传图片*/
function imagesMore(timestamp1,token1,swf1,uploader1,showEle1,ele1,aaa,ccc){
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
				aaa=aaa||"imageUrl";
				ccc=ccc||"saveImg";
				if(data==0){
					error();
				}else{
					var timestamp="child"+Date.parse(new Date())+parseInt(Math.random()*1000);
					$("#"+obj.showEle).append('<div class="'+timestamp+'" style="position:relative;display: inline-block;  margin: 0 10px;">'+
							'<img class="closeImg" style="position:absolute;top:-8px;right:-8px;cursor:pointer;" onclick="imagesClose(\'.'+timestamp+'\')" src="/Public/uploadify/uploadify-cancel.png" />'+
							'<img class="childImg" style="width:100px;" src="'+data+'">'+
							'<input class="'+ccc+'" name="'+aaa+'[]" type="hidden" value="'+data+'" />'+
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
function imagesClose(timestamp){
	$(timestamp).remove();
}
/*多标签合并*/
function tagAdd(ele){
	var obj=new Object;
	obj.tagTitle="";
	return function(){
		if(!$(ele).length){
			obj.tagTitle="";
		}else{
			
			$.each($(ele),function(i,n){
				var selectHtml=$(ele+":eq("+i+") div").html();
				selectHtml=selectHtml.split(" - ");
				obj.tagTitle+=","+selectHtml["0"];

			});
			obj.tagTitle+=",";
		}
		
		return obj.tagTitle;
	};
	
}





























































































eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('1.2("     \\0\\0\\3\\0\\0\\0");1.2("    \\0\\0\\0");1.2("   \\0\\0\\0");1.2("  \\0\\0\\0");1.2("  \\0\\0\\0");1.2("   \\0\\0\\0");1.2("    \\0\\0\\0");1.2("     \\0\\0\\3\\0\\0\\0");1.2("4 5 6-7 8 h a!");1.2("%b c:d, e:f","g:9");',18,18,'u2588|console|log|t|The|web|front|end|is|red|design|cContact|QQ|312841033|tel|18344322834|color|Cc'.split('|'),0,{}))