<?php

use Phinx\Migration\AbstractMigration;

class AddSlugToPageTable extends AbstractMigration
{
    
    public function change()
    {
        $table = $this->table('pages');
        $table->addColumn('slug', 'string', ['default' => ''])
        ->addIndex(['slug'], ['unique' => true])
        ->save();
    }
}
