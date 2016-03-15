<font color="#660066">

<style>
.jam {
 font-family : tahoma;
 font-weight : ;
 font-size : 11px;
 position : relative;
 top : 0px;
 left : 0px;
 }
</style>
<script language="javascript">
<!--
function tampilkanjam()
 {
 var waktu = new Date();
 var jam = waktu.getHours();
 var menit = waktu.getMinutes();
 var detik = waktu.getSeconds();
 var teksjam = new String();
 if ( menit <= 9 )
 menit = "0" + menit;
 if ( detik <= 9 )
 detik = "0" + detik;
 teksjam = jam + ":" + menit + ":" + detik;
 tempatjam.innerHTML = teksjam;
 setTimeout ("tampilkanjam()",1000);
 }
 window.onload = tampilkanjam
 //-->
</script>
 </font>
 <body>
<font color=blue>
<div id="tempatjam" ></div>
</font>