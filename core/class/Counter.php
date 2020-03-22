<?php
class Counter
{
    public function GetCounter($id)
    {
        return $GLOBALS['DB']->GetContent('counter', ['id' => $id])[0];
    }
}
?>