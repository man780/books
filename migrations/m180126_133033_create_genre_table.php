<?php

use yii\db\Migration;

/**
 * Handles the creation of table `genre`.
 */
class m180126_133033_create_genre_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('genre', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'text' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('genre');
    }
}
