<?php

use yii\db\Migration;

/**
 * Handles the creation of table `books_genre`.
 * Has foreign keys to the tables:
 *
 * - `books`
 * - `genre`
 */
class m180126_133556_create_junction_table_for_books_and_genre_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('books_genre', [
            'books_id' => $this->integer(),
            'genre_id' => $this->integer(),
            'PRIMARY KEY(books_id, genre_id)',
        ]);

        // creates index for column `books_id`
        $this->createIndex(
            'idx-books_genre-books_id',
            'books_genre',
            'books_id'
        );

        // add foreign key for table `books`
        $this->addForeignKey(
            'fk-books_genre-books_id',
            'books_genre',
            'books_id',
            'books',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            'idx-books_genre-genre_id',
            'books_genre',
            'genre_id'
        );

        // add foreign key for table `genre`
        $this->addForeignKey(
            'fk-books_genre-genre_id',
            'books_genre',
            'genre_id',
            'genre',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `books`
        $this->dropForeignKey(
            'fk-books_genre-books_id',
            'books_genre'
        );

        // drops index for column `books_id`
        $this->dropIndex(
            'idx-books_genre-books_id',
            'books_genre'
        );

        // drops foreign key for table `genre`
        $this->dropForeignKey(
            'fk-books_genre-genre_id',
            'books_genre'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            'idx-books_genre-genre_id',
            'books_genre'
        );

        $this->dropTable('books_genre');
    }
}
