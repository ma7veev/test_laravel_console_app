<?php

namespace App\Services\Employee;

interface EmployeeInterface
{
    /**
     * @return bool
     */
    public function canWriteCode():bool;

    /**
     * @return bool
     */
    public function canTestCode():bool;

    /**
     * @return bool
     */
    public function canCommunicate():bool;

    /**
     * @return bool
     */
    public function canDraw():bool;

    /**
     * @return bool
     */
    public function canSetTasks():bool;
}
