<head>
    <?php echo $this->Html->charset(); ?>
    <title>顧客一覧</title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('customer_index');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<div class = information>
    <h2>各種情報</h2>
    <h3>回線タイプ</h3>
        <?php foreach ($line_type as $value) : ?>
    <ul>
        <li><?php echo $value ?></li>
    </ul>
        <?php endforeach ?>
    <h3>契約タイプ</h3>
        <?php foreach ($contract_type as $value) : ?>
    <ul>
        <li><?php echo $value ?></li>
    </ul>
        <?php endforeach ?>
    <h3>代理店</h3>
        <?php foreach ($agency as $value) : ?>
    <ul>
        <li><?php echo $value ?></li>
    </ul>
        <?php endforeach ?>
    <h3>ステータス</h3>
        <?php foreach ($status as $value) : ?>
    <ul>
        <li><?php echo $value ?></li>
    </ul>
        <?php endforeach ?>
</div>

<div class = main>
    <h1>顧客一覧</h1>
    <p><?php echo $this->Html->link(
        '登録',
        array('controller' => 'customers', 'action' => 'add')); ?></p>
        <table>
            <tr>
                <th>会員ID</th>
                <th>契約者氏名</th>
                <th>回線タイプ</th>
                <th>契約タイプ</th>
                <th>代理店</th>
                <th>ステータス</th>
                <th>契約日</th>
                <th></th>
            </tr>

            <h3>該当件数：<?php echo count($customers); ?>件</h3>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo $customer['Customer']['id'] ?></td>
                <td><?php echo $customer['Customer']['name'] ?></td>
                <td><?php echo strtr($customer['Customer']['line_type'], $line_type) ?></td>
                <td><?php echo strtr($customer['Customer']['contract_type'], $contract_type) ?></td>
                <td><?php echo strtr($customer['Customer']['agency_id'], $agency) ?></td>
                <td><?php echo strtr($customer['Customer']['status'], $status) ?></td>
                <td><?php echo $customer['Customer']['contract_day'] ?></td>
                <td><?php echo $this->Html->link('編集',array('controller' => 'customers', 'action'=>'edit', $customer['Customer']['id'])); ?></td>
            </tr>
        <?php endforeach; ?>
        <?php unset($customer); ?>
        </table>

        <?php echo $this->Paginator->prev('前へ'); ?>
        <?php echo $this->Paginator->numbers(); ?>
        <?php echo $this->Paginator->next('次へ'); ?><br/>
</div>

<div class = reserch>
    <h2>検索フォーム</h2>
    <p><?php 
    echo $this->Form->create('Customer');
    echo $this->Form->input('name');

    echo $this->Form->radio('contract_type', $contract_type);
    echo $this->Form->select('agency', $agency);
    echo $this->Form->radio('status', $status);
    echo $this->Form->end('検索');
    ?></p>
</div>