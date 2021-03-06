<?php

namespace App\Services\Employee;

class Programmer implements EmployeeInterface
{
    /**
     * @return bool
     */
    public function canWriteCode():bool { return true; }

    /**
     * @return bool
     */
    public function canTestCode():bool { return true; }

    /**
     * @return bool
     */
    public function canCommunicate():bool { return true; }

    /**
     * @return bool
     */
    public function canDraw():bool { return false; }

    /**
     * @return bool
     */
    public function canSetTasks():bool { return false; }
}
