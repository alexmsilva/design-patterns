<?php
interface Estado
{
    public function getName();

    public function aprovar();

    public function finalizar();

    public function reprovar();
}
