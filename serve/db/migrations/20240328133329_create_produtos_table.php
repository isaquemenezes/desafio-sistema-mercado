<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProdutosTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('produtos');
        $table->addColumn('preco', 'integer', ['null' => true])
              ->addColumn('descricao', 'string', ['limit' => 255, 'null' => true])
              ->addColumn('tipo', 'string', ['limit' => 10, 'null' => true])
              ->addColumn('percentual', 'integer', ['null' => true])
           
              ->addIndex('id', ['unique' => true])
              ->create();

    }
}
