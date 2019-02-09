<?php

namespace mediabeastnz\laybuy;

use mediabeastnz\laybuy\gateways\Laybuy;
use craft\commerce\services\Gateways;
use craft\events\RegisterComponentTypesEvent;
use yii\base\Event;


/**
 * Plugin represents the Laybuy gateway integration plugin.
 *
 * @author Myles Derham. <myles.derham@gmail.com>
 */
class Plugin extends \craft\base\Plugin
{

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Event::on(Gateways::class, Gateways::EVENT_REGISTER_GATEWAY_TYPES,  function(RegisterComponentTypesEvent $event) {
            $event->types[] = Laybuy::class;
        });

    }

}
