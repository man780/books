<?php

use yii\db\Migration;

/**
 * Handles the creation of table `books`.
 * Has foreign keys to the tables:
 *
 * - `authors`
 */
class m180126_133540_create_books_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'text' => $this->text(),
            'image' => $this->string(),
            'cost' => $this->integer(),
            'status' => $this->integer(),
            'year' => $this->datetime(),
            'author_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-books-author_id',
            'books',
            'author_id'
        );

        // add foreign key for table `authors`
        $this->addForeignKey(
            'fk-books-author_id',
            'books',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `authors`
        $this->dropForeignKey(
            'fk-books-author_id',
            'books'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-books-author_id',
            'books'
        );

        $this->dropTable('books');
    }
}
