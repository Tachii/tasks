<?php
/**
 * Created by PhpStorm.
 * User: glebzaveruha
 * Date: 1/31/18
 * Time: 6:10 PM
 */

namespace B4u\TasksModule;

use App\Http\Vendor\Tasks\ViewComposers\TasksComposer;

class TaskComposerProvider
{
    private $currentComposer = null;

    /**
     * @return null
     */
    public function getCurrentComposer()
    {
        return $this->currentComposer;
    }

    /**
     * @param TasksComposer $currentComposer
     */
    public function setCurrentComposer(TasksComposer $currentComposer)
    {
        $this->currentComposer = $currentComposer;
    }
}