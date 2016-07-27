<?php

use Phinx\Migration\AbstractMigration;

class AddAccesslevelToAdmin extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('access_level', 'integer', ['default' => '1'])
        ->save();
    }
}
