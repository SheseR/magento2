<?php

namespace Training\TestOM\Model;

class Test
{
    /** @var ManagerInterface  */
    private $manager;

    /** @var array  */
    private $arrayList;

    /** @var   */
    private $name;

    /** @var int  */
    private $number;

    /**
     * Test constructor.
     *
     * @param ManagerInterface $manager
     * @param $name
     * @param int $number
     * @param array $arrayList
     */
    public function __construct(
        ManagerInterface $manager,
        $name,
        int $number,
        array $arrayList
    )
    {
        $this->manager = $manager;
        $this->name = $name;
        $this->number = $number;
        $this->arrayList = $arrayList;
    }

    /**
     *
     */
    public function log()
    {
        print_r(get_class($this->manager));
        echo '<br/>';
        print_r($this->name);
        echo '<br/>';
        print_r($this->number);
        echo '<br/>';
        print_r($this->arrayList);
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
    }
}