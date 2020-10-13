<?php


class Note
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        print('引数:' . $name . 'でNoteクラスのインスタンスが作成されました。');
    }
}