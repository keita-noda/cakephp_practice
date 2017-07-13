<h1>管理ユーザー一覧</h1>
<p><?php echo $this->Html->link(
    '登録',
    array('controller' => 'users', 'action' => 'add')); ?></p>
<table>
    <tr>
        <th>ID</th>
        <th>ユーザー名</th>
        <th>パスワード</th>
        <th>権限</th>
        <th>作成日</th>
        <th>更新日</th>
        <th>操作</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['password']; ?></td>
        <td><?php echo $user['User']['role']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
        <td><?php echo $user['User']['modified']; ?></td>
        <td><?php echo $this->Html->link('編集',array('controller' => 'users', 'action' => 'edit', $user['User']['id'])); ?>
        <?php echo $this->Html->link('削除',array('controller' => 'users', 'action' => 'delete', $user['User']['id'])); ?>
        </td>

    </tr>
<?php endforeach; ?>
<?php unset($user); ?>
</table>