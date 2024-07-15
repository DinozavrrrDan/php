<?php

// В этом задании вам нужно исправить ошибки в предоставленном коде. Код имеет несколько логических и синтаксических ошибок, которые необходимо найти и исправить.


abstract class Animal // сделал класс абстрактным
{
    protected $name;

    protected function __construct($name)
    {
        $this->name = $name; // исправил написание Name
    }

    abstract public function makeSound(): string; //  исправил написание string + сделал метода public
}

class Dog extends Animal // исправил написание Animal + заменил на extends т.к. у нас абстрактный класс, а не интерфейс
{
    protected string $breed;

    public function __construct(string $name, string $breed = "Dog") //int -> string т.к. поле breed string
    {
        parent::__construct($name);
        $this->breed = $breed; //исправил написание и обращение к breed
    }

    public function makeSound(): string
    {
        return "Woof";
    }
    //Добавил геттер для получения имени
    public function getName()
    {
        return $this->name;
    }

    public function getBreed()
    {
        return $this->breed;
    }

}

class Cat extends Animal // исправил написание Animal + заменил на extends т.к. у нас абстрактный класс, а не интерфейс
{
    protected string $breed;

    public function __construct(string $name, string $breed = "Cat")
    {
        parent::__construct($name);
        $this->breed = $breed;
    }

    public function makeSound(): string // добавил возвразаемое значение
    {
        return "Meow";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBreed()
    {
        return $this->breed;
    }
}

$rex = new Dog("Rex", "Labrador");
$stooped = new Dog("Stooped");
$murka = new Cat("Murka");

echo $rex->getBreed() ." ". $rex->getName() . " says " . $rex->makeSound() . "\n"; // изменил вызов метода на makeSound
// изменил вызов метода на makeSound + поменял Рекса на Ступту
echo $stooped->getBreed() ." ". $stooped->getName() . " says " . $stooped->makeSound() . "\n";
echo $murka->getName() . " " .$murka->getName() . " says " . $murka->makeSound() . "\n"; // изменил вызов метода на makeSound

// Ожидаемый результат работы программы
// Labrador Rex says Woof
// Dog Stooped says Woof
// Cat Murka says Meow
?>