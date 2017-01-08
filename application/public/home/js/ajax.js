var $$ = {
	request:function(obj){
		//创建xmlhttprequest对象
		var xhr;
		try{
			xhr = new XMLHttpRequest();
		}catch(e){
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}

		//建立连接
		if(obj.method=='get'){
			xhr.open(obj.method,obj.url+'?'+obj.data+'&'+Math.random(),true);
			xhr.send();
		}else if(obj.method=='post'){
			xhr.open(obj.method,obj.url,true);
			xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			xhr.send(obj.data);
		}
		//监视请求的状态
		xhr.onreadystatechange = function(){
			if(xhr.readyState==4 && xhr.status==200){
				if(obj.dataType=='xml'){
					obj.callback(xhr.responseXML);
				}else if(obj.dataType=='text'){
					eval("var res = "+xhr.responseText);
					obj.callback(res);
				}
			}
		}
	}
}
