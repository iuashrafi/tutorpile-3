<style type="text/css">

#preloader6{
    position:relative;
    width: 42px;
    height: 42px;
    animation: preloader_6 5s infinite linear;
}
#preloader6 span{
    width:20px;
    height:20px;
    position:absolute;
    background:red;
    display:block;
    animation: preloader_6_span 1s infinite linear;
}
#preloader6 span:nth-child(1){
background:#2ecc71;
 
}
#preloader6 span:nth-child(2){
left:22px;
background:#9b59b6;
    animation-delay: .2s;
 
}
#preloader6 span:nth-child(3){
top:22px;
background:#3498db;
    animation-delay: .4s;
}
#preloader6 span:nth-child(4){
top:22px;
left:22px;
background:#f1c40f;
    animation-delay: .6s;
}
@keyframes preloader_6_span {
   0% { transform:scale(1); }
   50% { transform:scale(0.5); }
   100% { transform:scale(1); }
}
</style>
	<div id="preloader6">
           <span></span>
           <span></span>
           <span></span>
           <span></span>
       </div>
<?php 
session_start();
unset($_SESSION['name']);
unset($_SESSION['emailid']);
unset($_SESSION['catogory']);
unset($_SESSION['teacher_id']);
unset($_SESSION['tooltip']);
unset($_SESSION['display']);
if(session_destroy())
	header("location:login.php"); 
?>