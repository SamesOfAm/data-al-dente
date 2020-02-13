<?php

class ModuleSlider extends Module
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_slider';
    /**
     * Compile the current element
     */
    protected function compile()
    {
        /** @var \Contao\Database\Result $rs */
        $rs = Database::getInstance()
            ->query('SELECT * FROM tl_slider ORDER BY title');

        $this->Template->sliderInfos = $rs->fetchAllAssoc();
    }
}