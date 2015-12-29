<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Job'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="job form large-10 medium-9 columns">
    
    <fieldset>
        <legend><?= __('View jobs from external sites') ?></legend>
       <ul><li><a href="http://stackoverflow.com/jobs">View Jobs from Stackoverflow</a></li>
       <li><a href="https://jobs.github.com/">View Jobs from Github</a></li>
       <li><a href="https://www.linkedin.com/job/home">View Jobs from LinkedIn</a></li>
       </ul>
    </fieldset>
    
</div>
