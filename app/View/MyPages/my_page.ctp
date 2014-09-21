<!-- 
<html>
	<head>
	<head/>
	
	<body>
		<h1><?php echo 'MyPage'; ?></h1>
		<br/>
		<h2>Hello World!!<h2>
		<br/>
		<br/>
	<body/>
<html/>
-->

<h1>MyPage</h1>

<?php echo $this->Html->link( 'プロフィールを編集する' ,
    array('controller' => 'MyPages', 'action' => 'edit' , $mypages['0']['MyPage']['id']) 
); ?>

<table>
    <tr>
        <th>comments</th>
        <th>Qualification</th>
        <th>image</th>
    </tr>

    <tr>
        <td><?php echo $mypages['0']['MyPage']['comments']; ?></td>
        <td><?php echo $mypages['0']['MyPage']['Qualification'] ?></td>
        <td><?php echo $mypages['0']['MyPage']['image']; ?></td>
    </tr>
    <?php unset($data); ?>
</table>