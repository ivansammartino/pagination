<?php
$presenter = new Ivanhalen\Pagination\ScrollPresenter($paginator);
$trans = $environment->getTranslator();
?>

<?php if ($paginator->getLastPage() > 1): ?>
    <div class="text-right">
        <ul class="pagination">
            <?php echo $presenter->getNext($trans->trans('pagination.next')); ?>
        </ul>
    </div>
<?php endif; ?>
