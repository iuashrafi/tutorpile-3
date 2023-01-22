<?php
echo "trying to send mail <br/>";
echo "receiver is cyberopenroot@gmail.com <br/>";
require_once("mail.php");
$send=new send_mail;
$to=$send->set_to('cyberopenroot@gmail.com');
$subject=$send->set_subject('thanks you for registering at www.tutorpile.tk');
$message=$send->set_message("
<html>
<head>
<title>tutorpile</title>
</head>
<body>
<p>This to inform you that you have registered at www.tutorpile.tk today</p>
<p>Your registration details are :</p>
<table>

<tr>
<th>Name : </th>
<th>Mack Stefan</th>
</tr>

<tr>
<td>email id : </td>
<td>cyberopenroot@gmail.com</td>
</tr>

<tr>
<td>password : </td>
<td>*********</td>
</tr>

<tr>
<td>mobile number : </td>
<td>9856321470</td>
</tr>

</table>
<p>Congrats, for a new tutorweb account.</p>
<p>Please, update your profile by going to settings section.</p>
<p>For further query please contact our customer care at - support@tutorpile.tk<br/><br/></p>
<p>Thank You,<br/>Tutor Pile<br/>(www.tutorpile.tk)</p>
</body>
</html>
");
echo "recever is :  $to <br/>";
echo "subject is :  $subject <br/>";
echo "message is :  $message <br/>";
echo $send->set_decide();
?>