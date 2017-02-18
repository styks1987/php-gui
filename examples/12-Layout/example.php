<?php

require __DIR__ . '/../../vendor/autoload.php';

use Gui\Application;
use Gui\Components\Label;
use Gui\Components\InputText;
use Gui\Components\Button;
use Gui\Components\Shape;
use Gui\Components\Window;
use Gui\Components\Checkbox;
use Gui\Components\Radio;
use Gui\Components\Select;
use Gui\Components\TextArea;
use Gui\Components\Option;


class Layout
{

    public function fit($container, $objects, $padding)
    {
        $top = $padding;
        foreach($objects as $object){
            $object->setTop($top + $container->getTop());
            $object->setLeft($padding + $container->getLeft());
            $object->setWidth($container->getWidth() - $padding * 2);
            $top += $object->getHeight() + 10;
        }
        $container->setHeight($top + 10);
    }
}

$width = 500;
$app = new Application([
    'title' => 'Can We Layout?',
    'left' => 100,
    'top' => 100,
    'width' => $width,
    'height' => 500
]);


$app->on('start', function () use ($app, $width) {
    $fields = [];
    $fields2 = [];

    $fields[] = new Label([
        'left' => 0,
        'top' => 0,
        'width' => 0,
        'height' => 0
    ]);

    $fields[] = new InputText([
        'value' => 'Two',
        'top' => 10,
        'left' => 10,
        'width' => $width,
        'height' => 90
    ]);

    $fields[] = new InputText([
        'value' => 'Three',
        'top' => 0,
        'left' => 0,
        'width' => $width,
        'height' => 90
    ]);

    $fields[] = new InputText([
        'value' => 'Four',
        'top' => 0,
        'left' => 0,
        'width' => $width,
        'height' => 90
    ]);

    $fields2[] = new Label([
        'left' => 0,
        'top' => 0,
        'width' => 0,
        'height' => 0
    ]);

    $fields2[] = new InputText([
        'value' => 'Five',
        'top' => 0,
        'left' => 0,
        'width' => $width,
        'height' => 90
    ]);

    $fields2[] = new InputText([
        'value' => 'Six',
        'top' => 0,
        'left' => 0,
        'width' => $width,
        'height' => 90
    ]);

    $div = new \Gui\Components\Shape([
        'borderColor' => '#000',
        'top' => 30,
        'left' => 10,
        'width' => $width / 2 - 20
    ]);

    $div2 = new \Gui\Components\Shape([
        'borderColor' => '#000',
        'top' => 30,
        'left' => $width / 2 + 5,
        'width' => $width / 2 - 20
    ]);
    (new Layout())->fit($div, $fields, 10);
    (new Layout())->fit($div2, $fields2, 10);
});

$app->run();