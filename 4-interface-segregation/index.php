<?
// jeffery way: "A client should not be forced to implement an interface that it does not use.";

interface WorkerInterface {
    public function work();
    public function sleep();
}

interface ManageableInterface {
    public function beManaged();
}

// 分开为2个接口, 人类可以工作,睡觉; 而机器只会工作
interface WorkerableInterface {
    public function work();
}

interface SleepableInterface {
    public function sleep();
}

class HumanWorker implements WorkerableInterface, SleepableInterface, ManageableInterface {
    public function beManaged()
    {
        $this->work();
        $this->sleep();
    }

    public function work()
    {
        return 'human working';
    }

    public function sleep()
    {
        return 'human sleeping';
    }
}

class AndroidWorker implements WorkerableInterface, ManageableInterface {
    public function work()
    {
        return 'android working';
    }

    public function beManaged()
    {
        $this->work();
    }
}



class Captain {
    public function manage(ManageableInterface $worker)
    {
        $worker->beManaged();

        /*
            $worker->work();
            if (!$worker instanceOf WorkerableInterface) return;
            $worker->sleep();
        */
    }
}
