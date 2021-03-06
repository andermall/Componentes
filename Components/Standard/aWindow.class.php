<?php
use Adianti\Control\TPage;
use Adianti\Widget\Container\TJQueryDialog;
use Mockery\Matcher\Any;

/**
 * Created by PhpStorm.
 * User: adm01
 * Date: 29/02/2016
 * Time: 15:28
 */
class aWindow extends TPage {
    private $wrapper;

    public function __construct() {
        parent::__construct();
        $this->wrapper = new TJQueryDialog;
        $this->wrapper->setUseOKButton(FALSE);
        $this->wrapper->setTitle('');
        $this->wrapper->setSize(1000, 500);
        $this->wrapper->setModal(TRUE);
        $this->wrapper->{'widget'} = 'T' . 'Window';
        parent::add($this->wrapper);
    }

    /**
     * Create a window
     */
    public static function create($title, $width, $height) {
        $inst = new self;
        $inst->setIsWrapped(TRUE);
        $inst->setTitle($title);
        $inst->setSize($width, $height);
        unset($inst->wrapper->{'widget'});
        return $inst;
    }

    /**
     * Define the stack order (zIndex)
     * @param $order Stack order
     */
    public function setStackOrder($order) {
        $this->wrapper->setStackOrder($order);
    }

    /**
     * Define the window's title
     * @param  $title Window's title
     */
    public function setTitle($title) {
        $this->wrapper->setTitle($title);
    }

    /**
     * Turn on/off modal
     * @param $modal Boolean
     */
    public function setModal($modal) {
        $this->wrapper->setModal($modal);
    }

    /**
     * Turn on/off resize
     * @param $resizable Boolean
     */
    public function setResizable($resizable) {
        $this->wrapper->setResizable($resizable);
    }

    /**
     * Define the window's size
     * @param  $width  Window's width
     * @param  $height Window's height
     */
    public function setSize($width, $height) {
        $this->wrapper->setSize($width, $height);
    }

    /**
     * Define the top corner positions
     * @param $x left coordinate
     * @param $y top  coordinate
     */
    public function setPosition($x, $y) {
        $this->wrapper->setPosition($x, $y);
    }

    /**
     * Add some content to the window
     * @param $content Any object that implements the show() method
     */
    public function add($content) {
        $this->wrapper->add($content);
    }

    /**
     * Close TJQueryDialog's
     */
    public static function closeWindow() {
        TJQueryDialog::closeAll();
    }
}
