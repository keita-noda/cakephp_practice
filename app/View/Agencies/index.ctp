<h1>代理店一覧</h1>
<p><?php echo $this->Html->link(
    '登録',
    array('controller' => 'agencies', 'action' => 'add')); ?></p>
<table>
    <tr>
        <th>ID</th>
        <th>代理店名</th>
        <th>作成日</th>
        <th>更新日</th>
        <th>操作</th>
    </tr>

    <?php foreach ($agencies as $agency): ?>
    <tr>
        <td><?php echo $agency['Agency']['id']; ?></td>
        <td><?php echo $agency['Agency']['agency_name']; ?></td>
        <td><?php echo $agency['Agency']['created']; ?></td>
        <td><?php echo $agency['Agency']['modified']; ?></td>
        <td><?php echo $this->Html->link('編集', array('controller'=>'agencies', 'action'=>'edit', $agency['Agency']['id'])); ?></td>
        <td><?php echo $this->Html->link('削除', array('controller'=>'agencies', 'action'=>'delete',$agency['Agency']['id'])); ?></td>
    </tr>
<?php endforeach; ?>
<?php unset($agency); ?>
</table>