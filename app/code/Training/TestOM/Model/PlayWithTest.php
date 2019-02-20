<?php

namespace Training\TestOM\Model;

class PlayWithTest
{
    /** @var Test  */
    private $testObject;

    /** @var TestFactory  */
    private $testFactory;

    /** @var ManagerCustomImplementation  */
    private $manager;

    /**
     * PlayWithTest constructor.
     * @param Test $testObject
     * @param TestFactory $testFactory
     * @param ManagerCustomImplementation $manager
     */
    public function __construct(
        Test $testObject,
        TestFactory $testFactory,
        ManagerCustomImplementation $manager
    )
    {
        $this->testObject = $testObject;
        $this->testFactory = $testFactory;
        $this->manager = $manager;
    }

    /**
     *
     */
    public function run()
    {
        $this->testObject->log();

        $customArrayList = ['item1' => 'aaaaa', 'item2' => 'bbbbb'];

        $newTestObject = $this->testFactory->create(
            ['arrayList' => $customArrayList,
            'manager' => $this->manager
            ]);

        $newTestObject->log();
    }
}