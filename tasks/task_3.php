<?php
// Доработайте код из test_task_2.php так, чтобы он мог выполняться на сайте с возможностью выбора языка отображения
// Для простоты считаем, что имя животного может быть на любом языке, при этом порода собаки только на выбранном языке
// Пример псевдо-кода такого сайта:

require_once('./test_task_2.php');

class ConfigReader
{
    public const LOCALE_RU = 'ru';
    public const LOCALE_EN = 'en';
}

class Controller
{
    private string $locale;

    public function __construct(string $locale)
    {
        $this->locale = $locale;
    }

    public function index()
    {
        $rex = new Dog('Rex');
        $murka = new Cat('Мурка');

        $this->showLine($rex);
        $this->showLine($murka);
    }

    public function showLine(Animal $animal)
    {
        $breed = "";
        $sound = "";
        if ($animal instanceof Dog) {
            $breed = $this->getBreedDogTranslation($animal->getBreed());
            $sound = $this->getSoundDogTranslation();
        } elseif ($animal instanceof Cat) { // else if тк в случае добавления может быть не только кошка об
            $breed = $this->getBreedCatTranslation($animal->getBreed());
            $sound = $this->getSoundCatTranslation();
        }


        if ($this->locale === ConfigReader::LOCALE_RU) {
            echo $breed . " " . $animal->getName() . " говорит " . $sound . "\n";
        } else {
            echo $breed . " " . $animal->getName() . " says " . $sound . "\n";
        }
    }

    private function getBreedDogTranslation(string $breed): string
    {
        if ($this->locale === ConfigReader::LOCALE_RU) {
            return "Лабрадор";
        } else {
            return "Labrador";
        }
    }

    private function getBreedCatTranslation(string $breed): string
    {
        if ($this->locale === ConfigReader::LOCALE_RU) {
            return "Кот";
        } else {
            return "Cat";
        }
    }

    private function getSoundDogTranslation(): string
    {
        if ($this->locale === ConfigReader::LOCALE_RU) {
            return "Гав";
        } else {
            return "Woof";
        }
    }


    private function getSoundCatTranslation(): string
    {
        if ($this->locale === ConfigReader::LOCALE_RU) {
            return "Мяу";
        } else {
            return "Meow";
        }
    }
}

$controller = new Controller(ConfigReader::LOCALE_RU);
$controller->index();
$controller_en = new Controller(ConfigReader::LOCALE_EN);
$controller_en->index();

// Ожидаемый результат работы программы
// Лабрадор Rex говорит Гав
// Кошка Мурка говорит Мяу
// Labrador Rex says Woof
// Cat Мурка says Meow
?>