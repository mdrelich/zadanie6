<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

/** Kontroler kalkulatora kredytowego
 *
 */
class CalcCtrl
{

    private $form;
    private $result;

    /**
     * Konstruktor - inicjalizacja właściwości
     */
    public function __construct()
    {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    /**
     * Pobranie parametrów
     */
    public function getParams()
    {
        $this->form->creditValue = isset($_REQUEST ['creditValue']) ? $_REQUEST ['creditValue'] : null;
        $this->form->years = isset($_REQUEST ['years']) ? $_REQUEST ['years'] : null;

        $this->form->percent = isset($_REQUEST ['percent']) ? $_REQUEST ['percent'] : null;
    }

    /**
     * Walidacja parametrów
     * @return false|true
     */
    public function validate()
    {
        if (!(isset ($this->form->creditValue) && isset ($this->form->years) && isset ($this->form->percent))) {
            return false;
        }

        if ($this->form->creditValue == null) {
            getMessages()->addError('Nie podano kwoty');
        }

        if ($this->form->years == null) {
            getMessages()->addError('Nie określono czasu');
        }

        if ($this->form->percent == null) {
            getMessages()->addError('Nie podano oprocentowania.');
        }

        return !getMessages()->isError();
    }

    /**
     * Pobranie wartości, walidacja, obliczenie i wyświetlenie
     */
    public function process()
    {

        $this->getparams();

        if ($this->validate()) {
            $this->result->result = ($this->form->creditValue+($this->form->creditValue*($this->form->percent/100)))/($this->form->years*12);

            getMessages()->addInfo('Wykonano obliczenia');
        }

        $this->generateView();
    }


    /**
     * Wygenerowanie widoku
     */
    public function generateView()
    {
        getSmarty()->assign('page_title', 'Przykład 06');
        getSmarty()->assign('page_description', 'Kolejne rozszerzenia dla aplikacja z jednym "punktem wejścia". Do nowej struktury dołożono automatyczne ładowanie klas wykorzystując w strukturze przestrzenie nazw.');
        getSmarty()->assign('page_header', 'Przestrzenie nazw i automatyczne ładowanie klas');

        getSmarty()->assign('form', $this->form);
        getSmarty()->assign('res', $this->result);

        getSmarty()->display('CalcView.tpl');
    }
}
