<?php

namespace App\Services\Employee;

class Manager implements EmployeeInterface
{
    /**
     * @return bool
     */
    public function canWriteCode():bool { return false; }

    /**
     * @return bool
     */
    public function canTestCode():bool { return false; }

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
    public function canSetTasks():bool { return true; }
}
