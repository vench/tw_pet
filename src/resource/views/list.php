<?php /* @var $list app\model\Page[] */ ?>
<?php /* @var $size int */ ?>
<?php /* @var $limit int */ ?>
<?php /* @var $page int */ ?>

<?php
self::renderPhp('header', [
    'active' => 'home',
]);
?>


<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Date modified</th>
        <th>Action</th>
    </tr>
<?php foreach ($list as $item): ?>
        <tr>
            <td><?php echo $item->getPageId(); ?> </td>
            <td><?php echo $item->getTitle(); ?> </td>
            <td> <?php echo $item->getModified()->format('Y-m-d H:i:s'); ?> </td>
            <td> <a href="/?a=page/edit&id=<?php echo $item->getPageId(); ?>">edit</a>
                <a href="/?a=page/view&id=<?php echo $item->getPageId(); ?>">view</a>
                <a onclick="return confirm('?');" href="/?a=page/delete&id=<?php echo $item->getPageId(); ?>">delete</a>
            </td>
        </tr> 
<?php endforeach; ?>
</table>    

<p>Total: <?php echo $size; ?></p>
    <?php if ($limit < $size): ?>
    <ul>
            <?php for ($i = 0, $l = 1; $i < $size; $i+=$limit, $l++): ?>
            <li>
                <?php if ($page == $i): ?>
                    <span>[<?php echo ($l); ?>]</span>
                <?php else: ?>
                    <a href="/?a=page/index&p=<?php echo $i; ?>"><?php echo ($l); ?></a>
            <?php endif; ?>
            </li>
    <?php endfor; ?>
    </ul>
<?php endif; ?>



<?php self::renderPhp('footer'); ?>