<?php

// Task #1

interface Observer {
    publick function handle();
}

abstract class Subject {
    protected $storage = [];

    public function attach(Observer $object) {
        $this->storage[] = $object;
    }

    public function detach() {
        $this->storage[] = null;
    }

    protected function notify() {
        foreach ($this->storage as $observer) {
            $observer->handle();
        }
    }
}


class UsersJobs extends Subject {
    public function jobAdd($user) {
        $this->notify();
    }
    public function jobSubscribe($user) {
        $this->attach();
    }
    public function jobUnSubscribe($user) {
        $this->detach();
    }
}

class Users implements Observer {

    /**
     * @var Observer
     */
    private $name;
    private $email;
    private $experience;

    public function __construct(Observer $name, $email, $experience)
    {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $experience;
    }

    public function handle() {
    }
}






// Task #2

interface PaymentInterface {
    public function request();
    public function response();
}

class Qiwi implements PaymentInterface {
    protected PaymentInterface $sender;

    public function __construct(PaymentInterface $sender)
    {
        $this->sender = $sender;
    }

    public function request(): string
    {
        $this->QiwiRequest();
        return $this->sender->request();
    }

    public function response()
    {
        $this->QiwiResponse();
        return $this->sender->response();
    }
}

class Yandex implements PaymentInterface {
    protected PaymentInterface $sender;

    public function __construct(PaymentInterface $sender)
    {
        $this->sender = $sender;
    }

    public function request(): string
    {
        $this->YandexRequest();
        return $this->sender->request();
    }

    public function response()
    {
        $this->YandexResponse();
        return $this->sender->response();
    }
}

class WebMoney implements PaymentInterface {
    protected PaymentInterface $sender;

    public function __construct(PaymentInterface $sender)
    {
        $this->sender = $sender;
    }

    public function request(): string
    {
        $this->WebMoneyRequest();
        return $this->sender->request();
    }

    public function response()
    {
        $this->WebMoneyResponse();
        return $this->sender->response();
    }
}

class PaymentFactory {
    public function createPayment($method) {
        $classname = $method.'Payment';
        if (class_exists($classname)) {
            return new $classname();
        }
        return null;
    }
}




