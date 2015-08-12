<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity.
 */
class Job extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'status' => true,
        'comment' => true,
        'link' => true,
        'applied_date' => true,
        'userid' => true,
    ];
    /**
     * static enums
     * @access static
     */
    public static function enum($value, $options, $default = '') {
    	if ($value !== null) {
    		if (array_key_exists($value, $options)) {
    			return $options[$value];
    		}
    		return $default;
    	}
    	return $options;
    }
    
    /*
     * static enum: Model::function()
    * @access static
    */
    public static function statuses($value = null) {
    	$options = array(
    			self::STATUS_NOTAPPLIED => __('Not Applied',true),
    			self::STATUS_INPROCESS => __('In Process',true),
    			self::STATUS_APPLIED => __('Applied',true),
    			self::STATUS_REJECTED => __('Rejected',true),
    			self::STATUS_ONHOLD => __('OnHold',true),
    	);
    	return self::enum($value, $options);
    }
    
    const STATUS_NOTAPPLIED = 0; # causes sound, then marks itself as "unread"
    const STATUS_INPROCESS = 1;
    const STATUS_APPLIED = 2;
    const STATUS_REJECTED = 4;
    const STATUS_ONHOLD = 5;
    // add more - order them as you like
}
