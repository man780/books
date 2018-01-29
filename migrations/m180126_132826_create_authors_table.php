<?php

use yii\db\Migration;

/**
 * Handles the creation of table `authors`.
 */
class m180126_132826_create_authors_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('authors', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'fio' => $this->string(),
            'image' => $this->string(),
            'bdate' => $this->datetime(),
            'country' => $this->string(),
            'image' => $this->string(),
            'text' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('authors');
    }
}
