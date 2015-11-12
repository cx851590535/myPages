
/*
 * 初始化窗口尺寸
 */
function getBodySize(get) {
    var bodySize = [];
    bodySize['w']=($(document.body).width()>$(window).width())? $(document.body).width():$(window).width();
    bodySize['h']=$(window).height();
    return get?bodySize[get]:bodySize;
}
 function showSize(){
    var webBodyWidth=getBodySize("w");
    var webBodyHight=getBodySize("h");
	var headHeight=webBodyHight*0.2;
	var bodyHeight=webBodyHight*0.72;
	var hmheadHeight=webBodyHight*0.13;
	var hmbodyHeight=webBodyHight*0.75;
	var footHeight=webBodyHight*0.07;
	//alert(headHeight+"---"+footHeight);
	$('.body').css('height',webBodyHight+'px');
	$('.td_cont').css('height',bodyHeight+'px');
	$('.hm_head').css('height',hmheadHeight+'px');
	$('.hm_cont').css('height',hmbodyHeight+'px');
	$('#bodyCont').css('height',bodyHeight+'px');
	$('.td_foot').css('height',footHeight+'px');
	$('#head').css('height',headHeight+'px');
	$('#foot').css('height',footHeight+'px');
	$('#contloss').css('height',bodyHeight+'px');
	$('#contloss').css('width',webBodyWidth*0.96+'px');
	$('#contloss').css('margin-left',webBodyWidth*0.02+'px');
}
 
//获取日期时间
function requestTime(){
	var date=new Date();
			var year=date.getFullYear();
			var month=parseFloat(date.getMonth()+1);
			if (month<10){
				month='0'+month;
			}
			var day=parseFloat(date.getDate());
			if (day<10){
				day='0'+day;
			}
			var hour=parseFloat(date.getHours());
			if (hour<10){
				hour='0'+hour;
			}
			var min=parseFloat(date.getMinutes());
			if (min<10){
				min='0'+min;
			}
			var sec=parseFloat(date.getSeconds());
			if (sec<10){
				sec='0'+sec;
			}
			//alert(day);
			$('#time').html(year+'年'+month+'月'+day+'日'+'&nbsp;'+hour+':'+min+':'+sec+ '&nbsp;星期'+'日一二三四五六'.charAt(new Date().getDay()));
			//$('#time').html(month+'月'+day+'日'+'&nbsp;'+hour+':'+min+':'+sec+ '&nbsp;周'+'日一二三四五六'.charAt(new Date().getDay()));
			setTimeout("requestTime()",1000); 
}
function getAjaxSubmit(url){

    if(!url||url==''){
        var url=document.URL;
    }
    $.getJSON(url, null, function(data){
        if(data.status==1){
            popup.success(data.info);
            setTimeout(function(){
                popup.close("asyncbox_success");
            },2000);
        }else{
            popup.error(data.info);
            setTimeout(function(){
                popup.close("asyncbox_error");
            },2000);
        }
        if(data.url&&data.url!=''){
		    //alert('aaa');
            setTimeout(function(){
			//alert(data.url);
                top.window.location.href=data.url;
            },1000);
        }
        if(data.url==''){
            setTimeout(function(){
                top.window.location.reload();
            },100);
        }
    });
    return false;
}
//post提交表单
	
function commonAjaxSubmit(url,formObj){
	
    if(!formObj||formObj==''){
        var formObj="form";
    }
    if(!url||url==''){
        var url=document.URL;
    }
    $(formObj).ajaxSubmit({
        url:url,
        type:"POST",
		dataType:"json",
        success:function(data, st) {
            if(data.status==1){
                popup.success(data.info);
                setTimeout(function(){
                    popup.close("asyncbox_success");
                },2000);
            }else{
                popup.error(data.info);
                setTimeout(function(){
                    popup.close("asyncbox_error");
                },2000);
            }
            if(data.url&&data.url!=''){
                setTimeout(function(){
                    top.window.location.href=data.url;
                },100);
            }
            if(data.url==''){
                setTimeout(function(){
                    top.window.location.reload();
                },100);
            }
        },
			error:function (data,st){	
				alert(data.info);
			}
    });
    return false;
}