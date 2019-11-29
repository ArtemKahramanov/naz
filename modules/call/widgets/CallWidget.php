<?php

namespace app\modules\call\widgets;

use app\modules\call\entities\Call;
use yii\base\Widget;

class CallWidget extends Widget
{
    public $product_id;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $call = new Call();

        return $this->render('call', [
            'call' => $call,
            'product_id' => $this->product_id,
        ]);
    }
}
