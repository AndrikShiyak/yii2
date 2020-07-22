<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subcategory}}`.
 */
class m200716_150203_create_subcategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subcategory}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-subcategory-category-id',
            '{{%subcategory}}',    // назва таблиці яку звязуєм
            'category_id',          // назва поля
            '{{%category}}',        // назва таблиці з якою звязуєм
            'id',                   // назва поля
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(                     // видаляємо фк 
            'fk-subcategory-category-id',
            '{{%subcategory}}'
        );
        $this->dropTable('{{%subcategory}}');
    }
}
