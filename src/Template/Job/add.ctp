<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Job'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="job form large-10 medium-9 columns">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Add Job') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('status', array('options' => $job->statuses()));
            echo $this->Form->input('comment');
            echo $this->Form->input('link');
            echo $this->Form->input('applied_date');
           // echo $this->Form->input('userid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
