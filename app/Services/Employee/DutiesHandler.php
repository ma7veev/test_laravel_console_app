<?php

namespace App\Services\Employee;

class DutiesHandler
{
    /**
     * @var EmployeeInterface
     */
    private $employee;
    /**
     * @var array
     */
    private static $can_map = [
        'writeCode'   => 'canWriteCode',
        'testCode'    => 'canTestCode',
        'communicate' => 'canCommunicate',
        'draw'        => 'canDraw',
        'setTasks'    => 'canSetTasks',
    ];

    /**
     * DutiesHandler constructor.
     * @param EmployeeInterface $employee
     */
    public function __construct(EmployeeInterface $employee)
    {
        $this->employee = $employee;
    }

    /**
     * @param string $duty
     * @return bool
     */
    public function can(string $duty):bool
    {
        if (isset(self::$can_map[ $duty ]) && method_exists($this->employee, self::$can_map[ $duty ])) {
            return $this->employee->{self::$can_map[ $duty ]}();
        }

        return false;
    }

    /**
     * @return string
     */
    public function getDutiesList():string
    {
        $list = '';
        if ($this->employee->canWriteCode()) {
            $list .= "- code writing\n";
        }
        if ($this->employee->canTestCode()) {
            $list .= "- code testing\n";
        }
        if ($this->employee->canCommunicate()) {
            $list .= "- communication with manager\n";
        }
        if ($this->employee->canDraw()) {
            $list .= "- draw\n";
        }
        if ($this->employee->canSetTasks()) {
            $list .= "- set tasks\n";
        }

        return $list;
    }

    /**
     * @param string $duty
     * @return string
     */
    public function getCan(string $duty):string{
        if ($this->can($duty)){
            return 'true';
        } else {
            return 'false';
        }
    }
}
