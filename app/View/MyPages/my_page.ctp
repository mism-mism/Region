﻿<h1>MyPage</h1>
</br>
<?php echo $this->Html->link( 'プロフィールを編集する' ,
    array('controller' => 'MyPages', 'action' => 'edit' , $mypages['MyPage']['id']) 
); ?>
</br>
<?php echo $this->Html->link( '戻る' ,
    array( 'controller' => 'Searches', 'action' => 'index' ) 
); ?>
</br>
<table>
    <tr>
        <th>自己紹介文</th>
        <th>取得した主な資格</th>
        <th>画像</th>
    </tr>

    <tr>
        <td><?php echo $mypages['MyPage']['comments']; ?></td>
        <td><?php echo $mypages['MyPage']['Qualification'] ?></td>
        <td><?php echo $this->Html->image( $imgfilename , array( 'width' => '100' , 'height' => '100' ) ); ?></td><!-- <td><?php echo $mypages['0']['MyPage']['image']; ?></td> -->
    </tr>
    <?php unset($data); ?>
</table>