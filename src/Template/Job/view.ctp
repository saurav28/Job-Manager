<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Job'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="job view large-10 medium-9 columns">
    <h2><?= h($job->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($job->name) ?></p>
            <h6 class="subheader"><?= __('Link') ?></h6>
            <p><?= $this->Html->link(h($job->link)) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= h($job->statuses($job->status)) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Applied Date') ?></h6>
            <p><?= h($job->applied_date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Comment') ?></h6>
            <?= $this->Text->autoParagraph(h($job->comment)); ?>

        </div>
    </div>
</div>
