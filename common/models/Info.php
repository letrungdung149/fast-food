<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property int $id
 * @property int|null $invoice_id
 * @property string $full_name
 * @property string|null $address
 * @property string|null $phone
 * @property string $email
 * @property int $created_at
 * @property int $updated_at
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoice_id', 'created_at', 'updated_at'], 'integer'],
            [['full_name', 'email', 'created_at', 'updated_at'], 'required'],
            [['full_name', 'address', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_id' => 'Invoice ID',
            'full_name' => 'Full Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
