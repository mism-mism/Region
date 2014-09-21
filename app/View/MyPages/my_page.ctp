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
<?php echo $this->Html->link(
    'プロフィールを編集する',
    array('controller' => 'MyPages', 'action' => 'edit')
); ?>
<table>
    <tr>
        <th>comments</th>
        <th>Qualification</th>
        <th>image</th>
    </tr>

    <!-- ここからmypagedata配列をループし、各種情報を表示 -->

    <?php foreach ($mypagedata as $mypage): ?>
    <tr>
        <td><?php echo $mypagedata['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($mypagedata['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $mypagedata['Post']['id'])); ?>
        </td>
        <td><?php echo $mypagedata['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($mypagedata); ?>
</table>