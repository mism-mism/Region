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
        <th>自己紹介文</th>
        <th>取得した主な資格</th>
        <th>画像</th>
    </tr>

    <tr>
        <td><?php echo $mypages['0']['MyPage']['comments']; ?></td>
        <td><?php echo $mypages['0']['MyPage']['Qualification'] ?></td>
        <td><?php echo $this->Html->image( $imgfilename , array( 'width' => '100' , 'height' => '100' ) ); ?></td><!-- <td><?php echo $mypages['0']['MyPage']['image']; ?></td> -->
    </tr>
    <?php unset($data); ?>
</table>